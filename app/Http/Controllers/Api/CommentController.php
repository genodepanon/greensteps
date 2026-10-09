<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportComment;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request, Report $report)
    {
        $this->authorizeAccess($report);

        $comments = ReportComment::where('report_id', $report->id)
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
                    'full_name'  => $c->user->full_name ?? 'User',
                    'team_name'  => $c->user->team_name ?? null,
                ];
            });

        return response()->json(['success' => true, 'comments' => $comments]);
    }

    public function store(Request $request, Report $report)
    {
        $this->authorizeAccess($report);

        $data = $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $u = Auth::user();

        $comment = ReportComment::create([
            'report_id' => $report->id,
            'user_id'   => $u->id,
            'role'      => $u->role,
            'message'   => $data['message'],
        ]);

        $snippet = mb_strlen($data['message']) > 80
            ? mb_substr($data['message'], 0, 80) . '…'
            : $data['message'];

        $this->notifyParties($report, $u, $snippet);

        return response()->json([
            'success' => true,
            'message' => 'Comment posted.',
            'comment' => [
                'id'         => $comment->id,
                'report_id'  => $comment->report_id,
                'user_id'    => $comment->user_id,
                'role'       => $comment->role,
                'message'    => $comment->message,
                'created_at' => $comment->created_at,
                'full_name'  => $u->full_name,
                'team_name'  => $u->team_name,
            ],
        ]);
    }

    private function authorizeAccess(Report $report): void
    {
        $u = Auth::user();
        if ($u->role === 'admin') return;
        if ($u->role === 'citizen' && $report->citizen_id === $u->id) return;
        if ($u->role === 'maintenance') {
            $teamName = $u->team_name ?? $u->full_name;
            if ($report->assigned_team === $teamName) return;
            if (\App\Models\Task::where('report_id', $report->id)->where('team_name', $teamName)->exists()) return;
        }
        abort(response()->json(['success' => false, 'message' => 'Not authorized.'], 403));
    }

    private function notifyParties(Report $report, $author, string $snippet): void
    {
        $title = 'New comment on report';
        $message = "{$report->category} — {$author->full_name}: {$snippet}";

        $recipients = [];

        if ($author->role !== 'citizen') {
            $recipients[] = $report->citizen_id;
        }
        if ($author->role !== 'admin') {
            foreach (User::where('role', 'admin')->pluck('id') as $id) {
                $recipients[] = $id;
            }
        }
        if ($author->role !== 'maintenance' && $report->assigned_team) {
            foreach (User::where('role', 'maintenance')->where('team_name', $report->assigned_team)->pluck('id') as $id) {
                $recipients[] = $id;
            }
        }

        $recipients = array_values(array_unique(array_filter($recipients, fn($id) => $id !== $author->id)));
        if (!$recipients) return;

        foreach ($recipients as $uid) {
            UserNotification::create([
                'user_id'   => $uid,
                'report_id' => $report->id,
                'title'     => $title,
                'message'   => $message,
            ]);
        }
    }
}