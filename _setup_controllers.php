<?php

$files = [

'app/Http/Controllers/Api/AuthController.php' => <<<'PHP'
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid credentials.']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'user' => [
                'id'        => $user->id,
                'full_name' => $user->full_name,
                'email'     => $user->email,
                'role'      => $user->role,
                'team_name' => $user->team_name,
                'points'    => $user->points,
            ],
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:150',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6',
            'role'      => 'nullable|in:citizen,maintenance,admin',
            'team_name' => 'nullable|string|max:150',
            'phone'     => 'nullable|string|max:50',
        ]);

        $role = $data['role'] ?? 'citizen';
        $teamName = $role === 'maintenance' ? ($data['team_name'] ?? null) : null;

        if ($role === 'maintenance' && !$teamName) {
            return response()->json(['success' => false, 'message' => 'Please select a team.']);
        }

        $user = User::create([
            'full_name' => $data['full_name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'role'      => $role,
            'team_name' => $teamName,
            'phone'     => $data['phone'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Account created! You can now login.',
            'user_id' => $user->id,
        ]);
    }

    public function session(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false]);
        }
        $u = Auth::user();
        return response()->json([
            'success' => true,
            'user' => [
                'id'        => $u->id,
                'full_name' => $u->full_name,
                'email'     => $u->email,
                'role'      => $u->role,
                'team_name' => $u->team_name,
                'points'    => $u->points,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['success' => true]);
    }

    public function updateProfile(Request $request)
    {
        $u = Auth::user();
        $data = $request->validate([
            'full_name'        => 'required|string|max:150',
            'email'            => 'required|email|unique:users,email,' . $u->id,
            'current_password' => 'required',
            'new_password'     => 'nullable|string|min:6',
        ]);

        if (!Hash::check($data['current_password'], $u->password)) {
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.']);
        }

        $u->full_name = $data['full_name'];
        $u->email = $data['email'];
        if (!empty($data['new_password'])) {
            $u->password = Hash::make($data['new_password']);
        }
        $u->save();

        return response()->json(['success' => true, 'message' => 'Profile updated!']);
    }
}
PHP,

'app/Http/Controllers/Api/ReportController.php' => <<<'PHP'
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PointsLog;
use App\Models\Rating;
use App\Models\Report;
use App\Models\Task;
use App\Models\UserNotification;
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
        if ($u->role === 'citizen' && $report->citizen_id !== $u->id) {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }

        $report->load('citizen');
        $data = $report->toArray();
        $data['citizen_name']  = $report->citizen->full_name ?? null;
        $data['citizen_email'] = $report->citizen->email ?? null;
        $data['citizen_phone'] = $report->citizen->phone ?? null;

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
            'photo_data'  => 'nullable|string',
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
        ]);

        UserNotification::create([
            'user_id'   => $u->id,
            'report_id' => $report->id,
            'title'     => 'Report submitted',
            'message'   => "{$report->category} — Waiting for review",
        ]);

        $u->increment('points', 5);
        PointsLog::create([
            'user_id' => $u->id,
            'points'  => 5,
            'reason'  => "Report submitted: {$report->category}",
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Report submitted! +5 points.',
            'report_id' => $report->id,
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

        UserNotification::create([
            'user_id'   => $report->citizen_id,
            'report_id' => $report->id,
            'title'     => 'Report rejected',
            'message'   => "{$report->category} — Reason: {$data['reason']}",
        ]);

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
        if ($u->role === 'citizen' && $report->citizen_id !== $u->id) {
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
PHP,

'app/Http/Controllers/Api/TaskController.php' => <<<'PHP'
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PointsLog;
use App\Models\Rating;
use App\Models\Report;
use App\Models\Task;
use App\Models\TeamLocation;
use App\Models\UserNotification;
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
        Report::where('id', $task->report_id)->update(['status' => 'In Progress']);

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
            'before_photo_data' => 'nullable|string',
            'after_photo_data'  => 'required|string',
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
            UserNotification::create([
                'user_id'   => $report->citizen_id,
                'report_id' => $report->id,
                'title'     => 'Report completed',
                'message'   => "{$report->category} — Photos available",
            ]);
        }

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
            UserNotification::create([
                'user_id'   => $report->citizen_id,
                'report_id' => $report->id,
                'title'     => 'Report rejected by maintenance',
                'message'   => "{$report->category} — Reason: {$data['reason']}",
            ]);
        }

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
            'rating'  => 'required|integer|between:1,5',
            'comment' => 'nullable|string',
        ]);

        $report = Report::find($task->report_id);
        if (!$report || $report->citizen_id !== $u->id) {
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

        return response()->json(['success' => true, 'message' => 'Thanks! Your rating was submitted.']);
    }
}
PHP,

'app/Http/Controllers/Api/NotificationController.php' => <<<'PHP'
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifs = UserNotification::where('user_id', Auth::id())
            ->latest()
            ->limit(20)
            ->get();
        return response()->json(['success' => true, 'notifications' => $notifs]);
    }

    public function markRead(Request $request)
    {
        $data = $request->validate([
            'notification_id' => 'nullable|integer',
            'all'             => 'nullable|boolean',
        ]);

        if (!empty($data['all'])) {
            UserNotification::where('user_id', Auth::id())->update(['is_read' => true]);
        } else {
            UserNotification::where('id', $data['notification_id'] ?? 0)
                ->where('user_id', Auth::id())
                ->update(['is_read' => true]);
        }

        return response()->json(['success' => true]);
    }
}
PHP,

'app/Http/Controllers/Api/CommentController.php' => <<<'PHP'
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
PHP,

'app/Http/Controllers/Api/StatsController.php' => <<<'PHP'
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
PHP,

'app/Http/Controllers/Api/TeamController.php' => <<<'PHP'
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeamLocation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Not authenticated']);
        }

        $teams = User::where('role', 'maintenance')
            ->whereNotNull('team_name')
            ->where('team_name', '!=', '')
            ->selectRaw('team_name, COUNT(*) as members')
            ->groupBy('team_name')
            ->orderBy('team_name')
            ->get();

        return response()->json(['success' => true, 'teams' => $teams]);
    }

    public function locations()
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Not authenticated']);
        }

        $locations = TeamLocation::join('tasks', 'team_locations.task_id', '=', 'tasks.id')
            ->join('reports', 'tasks.report_id', '=', 'reports.id')
            ->whereIn('tasks.status', ['Assigned', 'In Progress'])
            ->select('team_locations.*', 'reports.category', 'reports.location', 'reports.id as report_id')
            ->orderByDesc('team_locations.recorded_at')
            ->get();

        return response()->json(['success' => true, 'locations' => $locations]);
    }
}
PHP,

'app/Http/Controllers/Api/UserController.php' => <<<'PHP'
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PointsLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $u = Auth::user();
        if ($u->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $users = User::orderBy('role')->orderBy('full_name')
            ->get(['id', 'full_name', 'email', 'role', 'team_name', 'points']);
        return response()->json(['success' => true, 'users' => $users]);
    }

    public function givePoints(Request $request)
    {
        $u = Auth::user();
        if ($u->role !== 'admin') {
            return response()->json(['success' => false, 'message' => 'Not authorized.']);
        }
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'points'  => 'required|integer|min:1',
        ]);
        $target = User::find($data['user_id']);
        $target->increment('points', $data['points']);
        PointsLog::create([
            'user_id'    => $target->id,
            'points'     => $data['points'],
            'reason'     => 'Admin award',
            'awarded_by' => $u->id,
        ]);
        return response()->json(['success' => true, 'message' => 'Points awarded!']);
    }
}
PHP,

];

$written = 0;
$missing = 0;
foreach ($files as $path => $content) {
    $full = __DIR__ . '/' . $path;
    if (file_exists($full)) {
        file_put_contents($full, $content);
        echo "OK: {$path}" . PHP_EOL;
        $written++;
    } else {
        echo "MISSING: {$path}" . PHP_EOL;
        $missing++;
    }
}

echo PHP_EOL . "Files written: {$written}, Missing: {$missing}" . PHP_EOL;