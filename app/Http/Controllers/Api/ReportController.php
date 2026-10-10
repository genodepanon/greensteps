<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PointsLog;
use App\Models\Rating;
use App\Models\Report;
use App\Models\AutoAssignRule;
use App\Models\ReportStatusHistory;
use App\Models\Task;
use App\Models\UserNotification;
use App\Services\ActivityLogger;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $u = Auth::user();

        if ($u->role === 'citizen') {
            $reports = Report::where('citizen_id', $u->id)
                ->with('latestTask')
                ->latest()
                ->get()
                ->map(function ($r) {
                    $r->task_id = $r->latestTask?->id;
                    $r->before_photo = $r->latestTask?->before_photo;
                    $r->after_photo = $r->latestTask?->after_photo;
                    $r->my_rating = $r->latestTask
                        ? Rating::where('task_id', $r->latestTask->id)->value('rating')
                        : null;
                    return $r;
                });
        } else {
            $reports = Report::with('citizen')->latest()->get()
                ->map(function ($r) {
                    $r->citizen_name = $r->citizen->full_name ?? null;
                    return $r;
                });
        }

        return response()->json(['success' => true, 'reports' => $reports]);
    }

    public function show(Request $request, Report $report)
    {
        $u = Auth::user();
        if ($u->role === 'citizen' && (int) $report->citizen_id !== (int) $u->id) {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $report->load(['citizen', 'statusHistory.user']);
        $data = $report->toArray();
        $data['citizen_name']  = $report->citizen->full_name ?? null;
        $data['citizen_email'] = $report->citizen->email ?? null;
        $data['citizen_phone'] = $report->citizen->phone ?? null;
        $data['status_history'] = $report->statusHistory->map(function ($entry) {
            return [
                'status' => $entry->status,
                'note' => $entry->note,
                'actor' => $entry->user?->full_name ?? 'System',
                'created_at' => $entry->created_at?->toIso8601String(),
            ];
        })->values();

        return response()->json(['success' => true, 'report' => $data]);
    }

    public function store(Request $request, ImageService $images)
    {
        $u = Auth::user();
        if ($u->role !== 'citizen') {
            return response()->json(['success' => false, 'message' => 'Only citizens can submit reports.']);
        }

        $data = $request->validate([
            'category'    => 'required|string|max:200',
            'description' => 'required|string|min:10',
            'location'    => 'required|string|max:300',
            'latitude'    => 'nullable|numeric',
            'longitude'   => 'nullable|numeric',
            'photo_data'  => 'nullable|string|max:7000000',
        ]);

        $photoPath = $images->saveBase64($data['photo_data'] ?? null, 'report');

        $report = Report::create([
            'citizen_id'  => $u->id,
            'category'    => $data['category'],
            'description' => $data['description'],
            'location'    => $data['location'],
            'latitude'    => $data['latitude'] ?? null,
            'longitude'   => $data['longitude'] ?? null,
            'photo_url'   => $photoPath,
            'status'      => 'Pending',
        ]);

        ReportStatusHistory::create([
            'report_id' => $report->id,
            'user_id' => $u->id,
            'status' => $report->status,
            'note' => 'Report submitted',
        ]);

        $normalizedCategory = mb_strtolower($report->category);
        $matchingRule = AutoAssignRule::where('is_active', true)
            ->orderBy('id')
            ->get()
            ->first(fn (AutoAssignRule $rule) => str_contains($normalizedCategory, mb_strtolower($rule->category_pattern)));

        if ($matchingRule) {
            $report->update([
                'status' => 'Assigned',
                'assigned_team' => $matchingRule->team_name,
            ]);

            $task = Task::create([
                'report_id' => $report->id,
                'team_name' => $matchingRule->team_name,
                'title' => $report->category,
                'location' => $report->location,
                'latitude' => $report->latitude,
                'longitude' => $report->longitude,
                'priority' => $report->priority ?: 'Medium',
                'reporter' => $u->full_name,
            ]);

            ReportStatusHistory::create([
                'report_id' => $report->id,
                'user_id' => null,
                'status' => $report->status,
                'note' => 'Automatically assigned to ' . $matchingRule->team_name,
            ]);

            UserNotification::create([
                'user_id' => $u->id,
                'report_id' => $report->id,
                'title' => 'Team assigned',
                'message' => "{$report->category} — {$matchingRule->team_name} will handle your report",
            ]);

            \App\Models\User::where('role', 'maintenance')
                ->where('team_name', $matchingRule->team_name)
                ->get()
                ->each(fn ($member) => UserNotification::create([
                    'user_id' => $member->id,
                    'report_id' => $report->id,
                    'title' => 'New task assigned',
                    'message' => "{$report->category} — {$report->location}",
                ]));

            ActivityLogger::log('AUTO_ASSIGN_REPORT', "#{$report->id} {$report->category} → {$matchingRule->team_name} (task #{$task->id})");
        } else {
            UserNotification::create([
                'user_id' => $u->id,
                'report_id' => $report->id,
                'title' => 'Report submitted',
                'message' => "{$report->category} — Waiting for review",
            ]);
        }

        $u->increment('points', 5);
        PointsLog::create([
            'user_id' => $u->id,
            'points'  => 5,
            'reason'  => "Report submitted: {$report->category}",
        ]);

        ActivityLogger::log('SUBMIT_REPORT', "#{$report->id} {$report->category} @ {$report->location}");

        return response()->json([
            'success'   => true,
            'message'   => $matchingRule
                ? "Report submitted and assigned to {$matchingRule->team_name}! +5 points."
                : 'Report submitted! +5 points.',
            'report_id' => $report->id,
            'assigned_team' => $matchingRule?->team_name,
        ]);
    }

    public function reject(Request $request, Report $report)
    {
        $u = Auth::user();
        if ($u->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $data = $request->validate(['reason' => 'required|string']);

        $report->update([
            'status'           => 'Rejected',
            'rejection_reason' => $data['reason'],
            'rejected_by'      => $u->full_name . ' (Admin)',
            'rejected_at'      => now(),
        ]);
        ReportStatusHistory::create([
            'report_id' => $report->id,
            'user_id' => $u->id,
            'status' => $report->status,
            'note' => $data['reason'],
        ]);

        UserNotification::create([
            'user_id'   => $report->citizen_id,
            'report_id' => $report->id,
            'title'     => 'Report rejected',
            'message'   => "{$report->category} — Reason: {$data['reason']}",
        ]);

        ActivityLogger::log('REJECT_REPORT', "#{$report->id} {$report->category} — {$data['reason']}");

        return response()->json(['success' => true, 'message' => 'Report rejected.']);
    }

    public function assign(Request $request, Report $report)
    {
        $u = Auth::user();
        if ($u->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $data = $request->validate(['team_name' => 'required|string|max:150']);

        $report->update([
            'status'        => 'Assigned',
            'assigned_team' => $data['team_name'],
        ]);
        ReportStatusHistory::create([
            'report_id' => $report->id,
            'user_id' => $u->id,
            'status' => $report->status,
            'note' => 'Assigned to ' . $data['team_name'],
        ]);

        Task::create([
            'report_id' => $report->id,
            'team_name' => $data['team_name'],
            'title'     => $report->category,
            'location'  => $report->location,
            'latitude'  => $report->latitude,
            'longitude' => $report->longitude,
            'priority'  => $report->priority,
            'reporter'  => 'Citizen',
        ]);

        UserNotification::create([
            'user_id'   => $report->citizen_id,
            'report_id' => $report->id,
            'title'     => 'Team assigned',
            'message'   => "{$report->category} — {$data['team_name']} en route",
        ]);

        ActivityLogger::log('ASSIGN_TEAM', "#{$report->id} {$report->category} → {$data['team_name']}");

        return response()->json(['success' => true, 'message' => 'Team assigned successfully.']);
    }

    public function tracking(Request $request)
    {
        $u = Auth::user();
        $reportId = (int) $request->query('report_id');
        $report = Report::where('id', $reportId)->where('citizen_id', $u->id)->first();
        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Report not found.']);
        }
        $task = Task::where('report_id', $reportId)->first();
        return response()->json(['success' => true, 'report' => $report, 'task' => $task]);
    }

    public function completionInfo(Request $request)
    {
        $u = Auth::user();
        $reportId = (int) $request->query('report_id');
        $report = Report::where('id', $reportId)->where('citizen_id', $u->id)->first();
        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Report not found.']);
        }
        $task = Task::where('report_id', $reportId)->first();
        $data = $report->toArray();
        $data['team_name']    = $task->team_name ?? $report->assigned_team;
        $data['notes']        = $task->notes ?? null;
        $data['completed_at'] = $task->completed_at ?? null;
        $data['before_photo'] = $task->before_photo ?? null;
        $data['after_photo']  = $task->after_photo ?? null;
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function teamLocation(Request $request)
    {
        $u = Auth::user();
        $reportId = (int) $request->query('report_id');
        $report = Report::find($reportId);
        if (!$report) {
            return response()->json(['success' => false, 'message' => 'Report not found.']);
        }
        if ($u->role === 'citizen' && (int) $report->citizen_id !== (int) $u->id) {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $task = Task::where('report_id', $reportId)->latest()->first();
        $live = in_array($report->status, ['Assigned', 'In Progress'], true);
        $location = null;
        if ($task && $live) {
            $tl = \App\Models\TeamLocation::where('task_id', $task->id)->first();
            if ($tl) {
                $location = [
                    'latitude'    => $tl->latitude,
                    'longitude'   => $tl->longitude,
                    'accuracy'    => $tl->accuracy,
                    'recorded_at' => $tl->recorded_at,
                    'team_name'   => $tl->team_name,
                ];
            }
        }

        return response()->json([
            'success'       => true,
            'live'          => $live,
            'team_name'     => $report->assigned_team ?? ($task->team_name ?? null),
            'destination'   => [
                'latitude'  => $report->latitude,
                'longitude' => $report->longitude,
                'location'  => $report->location,
                'category'  => $report->category,
                'status'    => $report->status,
            ],
            'team_location' => $location,
        ]);
    }

    public function getTaskByReport(Request $request)
    {
        $u = Auth::user();
        if ($u->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $reportId = (int) $request->query('report_id');
        $task = Task::where('report_id', $reportId)->first();
        if (!$task) {
            return response()->json(['success' => false, 'message' => 'Task not found.']);
        }
        return response()->json(['success' => true, 'task' => $task]);
    }
}