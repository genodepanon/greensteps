<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserProvisioningTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_an_admin_can_create_a_maintenance_account(): void
    {
        $citizen = User::create([
            'full_name' => 'Regular Citizen',
            'email' => 'regular@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'points' => 0,
        ]);
        $data = [
            'full_name' => 'Team Member',
            'email' => 'member@example.com',
            'password' => 'temporary-pass-123',
            'password_confirmation' => 'temporary-pass-123',
            'team_name' => 'Team North',
        ];

        $this->actingAs($citizen)->postJson('/api/users/maintenance', $data)
            ->assertOk()
            ->assertJsonPath('success', false);
        $this->assertDatabaseMissing('users', ['email' => 'member@example.com']);

        $admin = User::create([
            'full_name' => 'System Admin',
            'email' => 'system-admin@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'admin',
            'points' => 0,
        ]);

        $this->actingAs($admin)->postJson('/api/users/maintenance', $data)
            ->assertOk()
            ->assertJsonPath('success', true);
        $this->assertDatabaseHas('users', [
            'email' => 'member@example.com',
            'role' => 'maintenance',
            'team_name' => 'Team North',
        ]);
    }
}