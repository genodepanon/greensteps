<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PointsLog;
use App\Models\Rating;
use App\Models\Report;
use App\Models\ReportStatusHistory;
use App\Models\Task;
use App\Models\TeamLocation;
use App\Models\UserNotification;
use App\Services\ActivityLogger;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $u = Auth::user();
        if ($u->role !== 'maintenance') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $teamName = $u->team_name ?? $u->full_name;

        $tasks = Task::where('team_name', $teamName)
            ->with(['report.citizen'])
            ->latest()
            ->get()
            ->map(function ($t) {
                $t->citizen_id          = $t->report->citizen_id ?? null;
                $t->report_description  = $t->report->description ?? null;
                $t->report_photo        = $t->report->photo_url ?? null;
                $t->citizen_name        = $t->report->citizen->full_name ?? null;
                $t->citizen_phone       = $t->report->citizen->phone ?? null;
                $t->rating              = Rating::where('task_id', $t->id)->first();
                return $t;
            });

        return response()->json(['success' => true, 'tasks' => $tasks, 'team_name' => $teamName]);
    }

    public function start(Request $request, Task $task)
    {
        $u = Auth::user();
        if ($u->role !== 'maintenance') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $teamName = $u->team_name ?? $u->full_name;
        if ($task->team_name !== $teamName) {
            return response()->json(['success' => false, 'message' => 'Not your task.']);
        }

        $task->update(['status' => 'In Progress']);
        $report = Report::find($task->report_id);
        if ($report) {
            $report->update(['status' => 'In Progress']);
            ReportStatusHistory::create([
                'report_id' => $report->id,
                'user_id' => $u->id,
                'status' => $report->status,
                'note' => 'Maintenance started the task',
            ]);
            UserNotification::create([
                'user_id' => $report->citizen_id,
                'report_id' => $report->id,
                'title' => 'Report in progress',
                'message' => "{$report->category} — {$teamName} started work",
            ]);
        }

        ActivityLogger::log('START_TASK', "Task #{$task->id} ({$task->title})");

        return response()->json(['success' => true, 'message' => 'Task started.']);
    }

    public function complete(Request $request, Task $task, ImageService $images)
    {
        $u = Auth::user();
        if ($u->role !== 'maintenance') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $teamName = $u->team_name ?? $u->full_name;
        if ($task->team_name !== $teamName) {
            return response()->json(['success' => false, 'message' => 'Not your task.']);
        }

        $data = $request->validate([
            'before_photo_data' => 'nullable|string|max:7000000',
            'after_photo_data'  => 'required|string|max:7000000',
            'notes'             => 'nullable|string',
        ]);

        $beforePath = $images->saveBase64($data['before_photo_data'] ?? null, 'before');
        $afterPath  = $images->saveBase64($data['after_photo_data'], 'after');

        $task->update([
            'status'       => 'Completed',
            'before_photo' => $beforePath,
            'after_photo'  => $afterPath,
            'notes'        => $data['notes'] ?? null,
            'completed_at' => now(),
        ]);

        $report = Report::find($task->report_id);
        if ($report) {
            $report->update(['status' => 'Completed']);
            ReportStatusHistory::create([
                'report_id' => $report->id,
                'user_id' => $u->id,
                'status' => $report->status,
                'note' => 'Maintenance marked the task complete',
            ]);
            UserNotification::create([
                'user_id'   => $report->citizen_id,
                'report_id' => $report->id,
                'title'     => 'Report completed',
                'message'   => "{$report->category} — Photos available",
            ]);
        }

        ActivityLogger::log('COMPLETE_TASK', "Task #{$task->id} ({$task->title})");

        return response()->json(['success' => true, 'message' => 'Task completed!']);
    }

    public function reject(Request $request, Task $task)
    {
        $u = Auth::user();
        if ($u->role !== 'maintenance') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $teamName = $u->team_name ?? $u->full_name;
        if ($task->team_name !== $teamName) {
            return response()->json(['success' => false, 'message' => 'Not your task.']);
        }

        $data = $request->validate(['reason' => 'required|string']);

        $task->update([
            'status'           => 'Rejected',
            'rejection_reason' => $data['reason'],
            'rejected_by'      => $u->full_name . ' (Maintenance)',
            'rejected_at'      => now(),
        ]);

        $report = Report::find($task->report_id);
        if ($report) {
            $report->update([
                'status'           => 'Rejected',
                'rejection_reason' => $data['reason'],
                'rejected_by'      => $u->full_name . ' (Maintenance)',
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
                'title'     => 'Report rejected by maintenance',
                'message'   => "{$report->category} — Reason: {$data['reason']}",
            ]);
        }

        ActivityLogger::log('REJECT_TASK', "Task #{$task->id} ({$task->title}) — {$data['reason']}");

        return response()->json(['success' => true, 'message' => 'Task rejected.']);
    }

    public function gpsPing(Request $request, Task $task)
    {
        $u = Auth::user();
        if ($u->role !== 'maintenance') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $teamName = $u->team_name ?? $u->full_name;
        if ($task->team_name !== $teamName) {
            return response()->json(['success' => false, 'message' => 'Not your task.']);
        }
        if (!in_array($task->status, ['Assigned', 'In Progress'], true)) {
            return response()->json(['success' => false, 'message' => 'Task is not active.']);
        }

        $data = $request->validate([
            'latitude'  => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'accuracy'  => 'nullable|numeric',
        ]);

        TeamLocation::updateOrCreate(
            ['task_id' => $task->id],
            [
                'user_id'     => $u->id,
                'team_name'   => $teamName,
                'latitude'    => $data['latitude'],
                'longitude'   => $data['longitude'],
                'accuracy'    => $data['accuracy'] ?? null,
                'recorded_at' => now(),
            ]
        );

        return response()->json(['success' => true, 'message' => 'Location updated.']);
    }

    public function rate(Request $request, Task $task)
    {
        $u = Auth::user();
        if ($u->role !== 'citizen') {
            return response()->json(['success' => false, 'message' => 'Only citizens can rate maintenance teams.']);
        }

        $data = $request->validate([
            'rating'  => 'required|integer|between:0,5',
            'comment' => 'nullable|string',
        ]);

        $report = Report::find($task->report_id);
        if (!$report || (int) $report->citizen_id !== (int) $u->id) {
            return response()->json(['success' => false, 'message' => 'You can only rate your own reports.']);
        }
        if ($report->status !== 'Completed') {
            return response()->json(['success' => false, 'message' => 'You can only rate completed reports.']);
        }

        $exists = Rating::where('task_id', $task->id)->where('admin_id', $u->id)->exists();
        if ($exists) {
            return response()->json(['success' => false, 'message' => 'You already rated this report.']);
        }

        $points = $data['rating'] * 2;

        Rating::create([
            'task_id'        => $task->id,
            'admin_id'       => $u->id,
            'team_name'      => $task->team_name,
            'rating'         => $data['rating'],
            'points_awarded' => $points,
            'comment'        => $data['comment'] ?? null,
        ]);

        \App\Models\User::where('team_name', $task->team_name)->increment('points', $points);

        PointsLog::create([
            'user_id'    => $u->id,
            'points'     => $points,
            'reason'     => "Citizen rating: {$data['rating']}/5 for {$report->category}",
            'awarded_by' => $u->id,
        ]);

        $members = \App\Models\User::where('team_name', $task->team_name)->get();
        foreach ($members as $member) {
            UserNotification::create([
                'user_id'   => $member->id,
                'report_id' => $report->id,
                'title'     => '⭐ Rating received!',
                'message'   => "{$report->category} — {$data['rating']}/5 stars from citizen, +{$points} points",
            ]);
        }

        ActivityLogger::log('RATE_TEAM', "Task #{$task->id} → {$task->team_name} got {$data['rating']}/5");

        return response()->json(['success' => true, 'message' => 'Thanks! Your rating was submitted.']);
    }
}