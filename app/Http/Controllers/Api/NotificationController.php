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