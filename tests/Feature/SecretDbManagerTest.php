<?php

namespace Tests\Feature;

use App\Models\User;
use App\Http\Controllers\SecretDbController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SecretDbManagerTest extends TestCase
{
    use RefreshDatabase;

    public function test_table_browser_searches_all_columns_and_reports_filtered_rows(): void
    {
        User::create([
            'full_name' => 'Search Match User',
            'email' => 'match@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'points' => 0,
        ]);
        User::create([
            'full_name' => 'Other User',
            'email' => 'other@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'points' => 0,
        ]);
        for ($index = 1; $index <= 51; $index++) {
            User::create([
                'full_name' => 'Page User ' . $index,
                'email' => 'page-user-' . $index . '@example.com',
                'password' => bcrypt('secret123'),
                'role' => 'citizen',
                'points' => 0,
            ]);
        }

        $this->post('/axel/login', ['password' => SecretDbController::PASSWORD])->assertRedirect('/axel');

        $this->get('/axel?table=users&q=Search+Match')
            ->assertOk()
            ->assertSee('Search Match User')
            ->assertDontSee('Other User')
            ->assertSee('Results 1 to 1 of 1 matching rows');

        $this->get('/axel?table=users&page=2')
            ->assertOk()
            ->assertSee('Page 2 of 2')
            ->assertSee('Results 51 to 53 of 53 matching rows');
    }

    public function test_database_manager_creates_all_account_roles_with_hashed_passwords(): void
    {
        $this->post('/axel/login', ['password' => SecretDbController::PASSWORD])->assertRedirect('/axel');

        foreach (['citizen', 'maintenance', 'admin'] as $role) {
            $email = $role . '@manager-test.example';
            $teamName = $role === 'maintenance' ? 'Green Team' : null;

            $this->post('/axel/accounts', [
                'full_name' => ucfirst($role) . ' Account',
                'email' => $email,
                'password' => 'secret123',
                'password_confirmation' => 'secret123',
                'role' => $role,
                'team_name' => $teamName,
            ])->assertRedirect('/axel?table=users&flash=account+created');

            $user = User::where('email', $email)->firstOrFail();
            $this->assertSame($role, $user->role);
            $this->assertSame($teamName, $user->team_name);
            $this->assertTrue(Hash::check('secret123', $user->password));
        }
    }
}