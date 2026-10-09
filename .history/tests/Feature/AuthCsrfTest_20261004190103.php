<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
