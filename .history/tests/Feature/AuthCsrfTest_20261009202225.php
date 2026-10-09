<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;
use Tests\TestCase;

class AuthCsrfTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_works_without_a_matching_csrf_token_for_same_origin_auth(): void
    {
        $user = User::create([
            'full_name' => 'Jane Citizen',
            'email' => 'jane@example.com',
            'password' => bcrypt('password123'),
            'role' => 'citizen',
            'team_name' => null,
            'points' => 0,
        ]);

        $response = $this->withSession(['_token' => 'stale-token'])
            ->post('/api/login', [
                'email' => $user->email,
                'password' => 'password123',
            ]);

        $response->assertOk();
        $response->assertJsonPath('success', true);
        $response->assertJsonPath('user.email', $user->email);
    }

    public function test_public_registration_can_create_a_maintenance_account_with_a_team(): void
    {
        $response = $this->postJson('/api/register', [
            'full_name' => 'Maintenance Applicant',
            'email' => 'maintenance-applicant@example.com',
            'password' => 'safe-password-123',
            'role' => 'maintenance',
            'team_name' => 'North Team',
        ]);

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonPath('message', 'Maintenance application submitted. You can now login.');
        $this->assertDatabaseHas('users', [
            'email' => 'maintenance-applicant@example.com',
            'role' => 'maintenance',
            'team_name' => 'North Team',
        ]);

        $this->postJson('/api/login', [
            'email' => 'maintenance-applicant@example.com',
            'password' => 'safe-password-123',
        ])->assertOk()
            ->assertJsonPath('user.role', 'maintenance')
            ->assertJsonPath('user.team_name', 'North Team');
    }

    public function test_public_registration_rejects_admin_role_assignment(): void
    {
        $response = $this->postJson('/api/register', [
            'full_name' => 'New Admin',
            'email' => 'new-admin@example.com',
            'password' => 'safe-password-123',
            'role' => 'admin',
            'team_name' => 'Injected Team',
        ]);

        $response->assertUnprocessable();
        $this->assertDatabaseMissing('users', [
            'email' => 'new-admin@example.com',
        ]);
    }

    public function test_login_is_limited_after_five_failed_attempts(): void
    {
        RateLimiter::clear('missing@example.com|127.0.0.1');
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->postJson('/api/login', [
                'email' => 'missing@example.com',
                'password' => 'wrong-password',
            ])->assertOk();
        }

        $this->postJson('/api/login', [
            'email' => 'missing@example.com',
            'password' => 'wrong-password',
        ])->assertStatus(429);
    }

    public function test_password_reset_link_can_reset_the_account_password(): void
    {
        Notification::fake();
        $user = User::create([
            'full_name' => 'Reset User',
            'email' => 'reset@example.com',
            'password' => bcrypt('old-password-123'),
            'role' => 'citizen',
            'points' => 0,
        ]);

        $this->postJson('/api/forgot-password', ['email' => $user->email])
            ->assertOk()
            ->assertJsonPath('success', true);

        $token = null;
        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use (&$token) {
            $token = $notification->token;
            return true;
        });

        $this->postJson('/api/reset-password', [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-password-123',
            'password_confirmation' => 'new-password-123',
        ])->assertOk()->assertJsonPath('success', true);

        $this->assertTrue(password_verify('new-password-123', $user->fresh()->password));
    }
}
