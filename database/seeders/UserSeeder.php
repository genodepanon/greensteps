<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'full_name' => 'Admin User',
                'email' => 'admin@greensteps.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'team_name' => null,
                'points' => 0,
            ],
            [
                'full_name' => 'Team Alpha',
                'email' => 'team@greensteps.com',
                'password' => Hash::make('team123'),
                'role' => 'maintenance',
                'team_name' => 'Team Alpha',
                'points' => 0,
                'is_approved' => true,
            ],
            [
                'full_name' => 'Team Beta',
                'email' => 'beta@greensteps.com',
                'password' => Hash::make('team123'),
                'role' => 'maintenance',
                'team_name' => 'Team Beta',
                'points' => 0,
                'is_approved' => true,
            ],
            [
                'full_name' => 'Team Gamma',
                'email' => 'gamma@greensteps.com',
                'password' => Hash::make('team123'),
                'role' => 'maintenance',
                'team_name' => 'Team Gamma',
                'points' => 0,
                'is_approved' => true,
            ],
            [
                'full_name' => 'Sarah K.',
                'email' => 'citizen@greensteps.com',
                'password' => Hash::make('password123'),
                'role' => 'citizen',
                'team_name' => null,
                'points' => 0,
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(['email' => $data['email']], $data);
        }

        $this->command->info('Seeded ' . count($users) . ' default users.');
    }
}