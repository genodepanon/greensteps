<?php

namespace App\Services;

use App\Mail\UserNotificationMail;
use App\Models\UserNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EmailNotificationService
{
    private const STATUS_TITLES = [
        'Report submitted',
        'Report in progress',
        'Team assigned',
        'Report completed',
        'Report rejected',
        'Report rejected by maintenance',
    ];

    public function send(UserNotification $notification): void
    {
        $notification->loadMissing(['user', 'report']);
        $user = $notification->user;
        if (!$user || !$user->email) return;

        $isStatusUpdate = in_array($notification->title, self::STATUS_TITLES, true);
        $isEnabled = $isStatusUpdate
            ? $user->email_on_status
            : $user->email_on_notifications;
        if (!$isEnabled) return;

        try {
            Mail::to($user->email)->send(new UserNotificationMail($notification));
        } catch (Throwable $exception) {
            Log::warning('GreenSteps notification email could not be sent.', [
                'notification_id' => $notification->id,
                'user_id' => $user->id,
                'exception' => $exception->getMessage(),
            ]);
        }
    }
}