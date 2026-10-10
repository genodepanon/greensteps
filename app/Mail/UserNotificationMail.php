<?php

namespace App\Mail;

use App\Models\UserNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public UserNotification $notification)
    {
    }

    public function build()
    {
        $this->notification->loadMissing(['user', 'report']);

        $data = [
            'userName' => $this->notification->user->full_name,
            'notification' => $this->notification,
            'report' => $this->notification->report,
            'homeUrl' => url('/'),
        ];

        return $this->subject('GreenSteps: ' . $this->notification->title)
            ->view('emails.notification', $data)
            ->text('emails.notification-text', $data);
    }
}