<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthCsrfTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_keeps_the_existing_csrf_token_valid_after_successful_auth(): void
    {
        $user = User::create([
            'full_name' => 'Jane Citizen',
            'email' => 'jane@example.com',
            'password' => bcrypt('password123'),
            'role' => 'citizen',
            'team_name' => null,
            'points' => 0,
        ]);

        $response = $this->withSession(['_token' => 'test-csrf-token'])
            ->post('/api/login', [
                '_token' => 'test-csrf-token',
                'email' => $user->email,
                'password' => 'password123',
            ]);

        $response->assertOk();
        $response->assertJsonPath('success', true);
        $this->assertSame('test-csrf-token', session('_token'));
    }
}
