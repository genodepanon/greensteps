<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationPreferenceController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'preferences' => [
                'email_on_notifications' => (bool) ($user->email_on_notifications ?? true),
                'email_on_status' => (bool) ($user->email_on_status ?? true),
            ],
        ]);
    }

    public function update(Request $request)
    {
        $preferences = $request->validate([
            'email_on_notifications' => 'required|boolean',
            'email_on_status' => 'required|boolean',
        ]);

        Auth::user()->forceFill($preferences)->save();

        return response()->json([
            'success' => true,
            'preferences' => $preferences,
        ]);
    }
}