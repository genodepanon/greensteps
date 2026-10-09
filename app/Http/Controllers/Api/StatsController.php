<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index()
    {
        $u = Auth::user();

        if ($u->role === 'citizen') {
            $stats = Report::where('citizen_id', $u->id)
                ->selectRaw("COUNT(*) as total, SUM(status='Completed') as completed, SUM(status='Pending') as pending")
                ->first();
            return response()->json([
                'success'   => true,
                'total'     => (int) $stats->total,
                'completed' => (int) $stats->completed,
                'pending'   => (int) $stats->pending,
                'points'    => (int) $u->points,
            ]);
        }

        if ($u->role === 'maintenance') {
            $teamName = $u->team_name ?? $u->full_name;
            $stats = Task::where('team_name', $teamName)
                ->selectRaw("COUNT(*) as total, SUM(status='Assigned') as assigned, SUM(status='In Progress') as in_progress, SUM(status='Completed') as completed")
                ->first();
            $avg = Rating::where('team_name', $teamName)->avg('rating');
            return response()->json([
                'success'     => true,
                'total'       => (int) $stats->total,
                'assigned'    => (int) $stats->assigned,
                'in_progress' => (int) $stats->in_progress,
                'completed'   => (int) $stats->completed,
                'avg_rating'  => $avg ? round($avg, 1) : '—',
            ]);
        }

        $stats = Report::selectRaw("COUNT(*) as total, SUM(status='Pending') as pending, SUM(status='Assigned') as assigned, SUM(status='Completed') as completed")->first();
        return response()->json([
            'success'   => true,
            'total'     => (int) $stats->total,
            'pending'   => (int) $stats->pending,
            'assigned'  => (int) $stats->assigned,
            'completed' => (int) $stats->completed,
        ]);
    }

    public function leaderboard()
    {
        $citizens = User::where('role', 'citizen')
            ->select('id', 'full_name', 'points')
            ->withCount(['reports'])
            ->orderByDesc('points')
            ->orderByDesc('reports_count')
            ->orderBy('full_name')
            ->limit(10)
            ->get()
            ->map(fn($c) => [
                'id'        => $c->id,
                'full_name' => $c->full_name,
                'points'    => (int) $c->points,
                'reports'   => $c->reports_count,
            ]);

        $teams = User::where('role', 'maintenance')
            ->whereNotNull('team_name')
            ->where('team_name', '!=', '')
            ->select('team_name')
            ->groupBy('team_name')
            ->get()
            ->map(function ($t) {
                $jobs = Rating::where('team_name', $t->team_name)->count();
                $avg = Rating::where('team_name', $t->team_name)->avg('rating');
                $points = (int) Rating::where('team_name', $t->team_name)->sum('points_awarded');
                return [
                    'team_name'    => $t->team_name,
                    'jobs'         => $jobs,
                    'avg_rating'   => $avg ? round($avg, 1) : 0,
                    'total_points' => $points,
                ];
            })
            ->sortByDesc('total_points')
            ->values()
            ->take(10);

        return response()->json(['success' => true, 'citizens' => $citizens, 'teams' => $teams]);
    }

    public function poll(Request $request)
    {
        $u = Auth::user();
        $lastReportId       = (int) $request->query('last_report_id', 0);
        $lastNotificationId = (int) $request->query('last_notification_id', 0);
        $lastCommentId      = (int) $request->query('last_comment_id', 0);

        $response = [
            'success'       => true,
            'reports'       => [],
            'notifications' => [],
            'comments'      => [],
            'stats'         => null,
        ];

        if ($u->role === 'citizen') {
            $response['reports'] = Report::where('citizen_id', $u->id)->where('id', '>', $lastReportId)->latest()->get();
        } else {
            $response['reports'] = Report::with('citizen')->where('id', '>', $lastReportId)->latest()->get()
                ->map(function ($r) {
                    $r->citizen_name = $r->citizen->full_name ?? null;
                    return $r;
                });
        }

        $response['notifications'] = UserNotification::where('user_id', $u->id)
            ->where('id', '>', $lastNotificationId)
            ->latest()
            ->get();

        if ($lastCommentId > 0) {
            $response['comments'] = \App\Models\ReportComment::where('id', '>', $lastCommentId)
                ->with('user')
                ->orderBy('created_at')
                ->get()
                ->map(function ($c) {
                    return [
                        'id'         => $c->id,
                        'report_id'  => $c->report_id,
                        'user_id'    => $c->user_id,
                        'role'       => $c->role,
                        'message'    => $c->message,
                        'created_at' => $c->created_at,
                        'full_name'  => $c->user->full_name ?? null,
                        'team_name'  => $c->user->team_name ?? null,
                    ];
                });
        }

        $response['stats'] = $this->index()->getData(true);
        unset($response['stats']['success']);

        return response()->json($response);
    }
}