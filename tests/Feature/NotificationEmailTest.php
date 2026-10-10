<?php

namespace Tests\Feature;

use App\Mail\UserNotificationMail;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NotificationEmailTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_email_notification_preferences(): void
    {
        $user = User::create([
            'full_name' => 'Mail Preferences',
            'email' => 'mail-preferences@example.com',
            'password' => bcrypt('safe-password-123'),
            'role' => 'citizen',
            'points' => 0,
        ]);

        $this->actingAs($user)->getJson('/api/notification-preferences')
            ->assertOk()
            ->assertJsonPath('preferences.email_on_notifications', true)
            ->assertJsonPath('preferences.email_on_status', true);

        $this->actingAs($user)->postJson('/api/notification-preferences', [
            'email_on_notifications' => false,
            'email_on_status' => true,
        ])->assertOk()
            ->assertJsonPath('preferences.email_on_notifications', false)
            ->assertJsonPath('preferences.email_on_status', true);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email_on_notifications' => false,
            'email_on_status' => true,
        ]);
    }

    public function test_status_emails_respect_the_status_preference(): void
    {
        Mail::fake();
        $user = User::create([
            'full_name' => 'No Status Email',
            'email' => 'no-status-email@example.com',
            'password' => bcrypt('safe-password-123'),
            'role' => 'citizen',
            'points' => 0,
            'email_on_status' => false,
            'email_on_notifications' => true,
        ]);

        UserNotification::create([
            'user_id' => $user->id,
            'title' => 'Team assigned',
            'message' => 'A team was assigned to your report.',
        ]);

        Mail::assertNotSent(UserNotificationMail::class);
    }

    public function test_other_in_app_notifications_are_emailed_when_enabled(): void
    {
        Mail::fake();
        $user = User::create([
            'full_name' => 'Notification Email',
            'email' => 'notification-email@example.com',
            'password' => bcrypt('safe-password-123'),
            'role' => 'citizen',
            'points' => 0,
            'email_on_notifications' => true,
            'email_on_status' => false,
        ]);

        $notification = UserNotification::create([
            'user_id' => $user->id,
            'title' => 'New comment on report',
            'message' => 'An admin commented on your report.',
        ]);

        Mail::assertSent(UserNotificationMail::class, function (UserNotificationMail $mail) use ($notification, $user) {
            return $mail->notification->id === $notification->id && $mail->hasTo($user->email);
        });

        $html = view('emails.notification', [
            'userName' => $user->full_name,
            'notification' => $notification,
            'report' => null,
            'homeUrl' => url('/'),
        ])->render();
        $this->assertStringContainsString('GreenSteps', $html);
        $this->assertStringContainsString('Open GreenSteps', $html);
    }
}