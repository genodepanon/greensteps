<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityLogger
{
    public static function log(string $action, ?string $details = null): void
    {
        $user = Auth::user();

        DB::table('activity_log')->insert([
            'user_id'    => $user?->id,
            'user_name'  => $user?->full_name,
            'user_role'  => $user?->role,
            'action'     => $action,
            'details'    => $details,
            'ip_address' => request()->ip(),
            'user_agent' => substr((string) request()->userAgent(), 0, 250),
            'created_at' => now(),
        ]);
    }
}