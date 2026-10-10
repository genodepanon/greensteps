<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NotificationPreferenceController;
use Illuminate\Support\Facades\Route;

// Main page (Blade view we'll create later)
Route::get('/', function () {
    return view('app');
});

Route::prefix('api')->group(function () {

    // ---- Public auth ----
    Route::post('login',    [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('admin/register', [AuthController::class, 'adminRegister']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    Route::get ('session',  [AuthController::class, 'session']);
    Route::get ('logout',   [AuthController::class, 'logout']);

    // ---- Authenticated ----
    Route::middleware('auth')->group(function () {

        // Profile
        Route::post('profile', [AuthController::class, 'updateProfile']);

        // Reports
        Route::get ('reports',                     [ReportController::class, 'index']);
        Route::post('reports',                     [ReportController::class, 'store']);
        Route::get ('reports/{report}',            [ReportController::class, 'show']);
        Route::post('reports/{report}/reject',     [ReportController::class, 'reject']);
        Route::post('reports/{report}/assign',     [ReportController::class, 'assign']);
        Route::get ('reports/{report}/comments',   [CommentController::class, 'index']);
        Route::post('reports/{report}/comments',   [CommentController::class, 'store']);

        // Tracking helpers
        Route::get ('tracking',           [ReportController::class, 'tracking']);
        Route::get ('completion-info',    [ReportController::class, 'completionInfo']);
        Route::get ('team-location',      [ReportController::class, 'teamLocation']);
        Route::get ('task-by-report',     [ReportController::class, 'getTaskByReport']);

        // Tasks (maintenance)
        Route::get ('tasks',                  [TaskController::class, 'index']);
        Route::post('tasks/{task}/start',     [TaskController::class, 'start']);
        Route::post('tasks/{task}/complete',  [TaskController::class, 'complete']);
        Route::post('tasks/{task}/reject',    [TaskController::class, 'reject']);
        Route::post('tasks/{task}/gps',       [TaskController::class, 'gpsPing']);
        Route::post('tasks/{task}/rate',      [TaskController::class, 'rate']);

        // Notifications
        Route::get ('notifications',      [NotificationController::class, 'index']);
        Route::post('notifications/read', [NotificationController::class, 'markRead']);
        Route::get ('notification-preferences', [NotificationPreferenceController::class, 'show']);
        Route::post('notification-preferences', [NotificationPreferenceController::class, 'update']);

        // Chat
        Route::get ('chat/unread',             [ChatController::class, 'unread']);
        Route::get ('chat/contacts',           [ChatController::class, 'contacts']);
        Route::get ('chat/conversations',      [ChatController::class, 'conversations']);
        Route::get ('chat/conversations/{conversation}/messages', [ChatController::class, 'messages']);
        Route::post('chat/send',                [ChatController::class, 'send']);

        // Stats + leaderboard
        Route::get('stats',       [StatsController::class, 'index']);
        Route::get('leaderboard', [StatsController::class, 'leaderboard']);
        Route::get('poll',        [StatsController::class, 'poll']);

        // Teams
        Route::get('teams',           [TeamController::class, 'index']);
        Route::get('team-locations',  [TeamController::class, 'locations']);

        // Admin: users
        Route::get ('users',        [UserController::class, 'index']);
        Route::post('users/maintenance', [UserController::class, 'createMaintenance']);
        Route::post('users/points', [UserController::class, 'givePoints']);
        Route::post('users/{id}/approve', [UserController::class, 'approve']);
        Route::post('users/{id}/reject', [UserController::class, 'reject']);
    });
});

// ===== PRIVATE DB MANAGER (do not link anywhere) =====
Route::get('/axel',          [\App\Http\Controllers\SecretDbController::class, 'index']);
Route::post('/axel/login',   [\App\Http\Controllers\SecretDbController::class, 'login']);
Route::get('/axel/logout',   [\App\Http\Controllers\SecretDbController::class, 'logout']);
Route::get('/axel/row',      [\App\Http\Controllers\SecretDbController::class, 'row']);
Route::post('/axel/update',  [\App\Http\Controllers\SecretDbController::class, 'update']);
Route::post('/axel/delete',  [\App\Http\Controllers\SecretDbController::class, 'delete']);
Route::get('/axel/create',   [\App\Http\Controllers\SecretDbController::class, 'createForm']);
Route::post('/axel/store',   [\App\Http\Controllers\SecretDbController::class, 'store']);
Route::get('/axel/accounts/create', [\App\Http\Controllers\SecretDbController::class, 'accountForm']);
Route::post('/axel/accounts', [\App\Http\Controllers\SecretDbController::class, 'createAccount']);

Route::get('/axel/logs',       [\App\Http\Controllers\SecretDbController::class, 'logs']);
Route::post('/axel/logs/clear',[\App\Http\Controllers\SecretDbController::class, 'logsClear']);