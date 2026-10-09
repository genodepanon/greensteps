<?php

namespace Tests\Feature;

use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReportHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_report_history_tracks_submission_assignment_and_task_start(): void
    {
        $citizen = User::create([
            'full_name' => 'History Citizen',
            'email' => 'history-citizen@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'points' => 0,
        ]);
        $admin = User::create([
            'full_name' => 'History Admin',
            'email' => 'history-admin@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'admin',
            'points' => 0,
        ]);
        $maintenance = User::create([
            'full_name' => 'History Team',
            'email' => 'history-team@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'maintenance',
            'team_name' => 'History Team',
            'points' => 0,
        ]);

        $response = $this->actingAs($citizen)->postJson('/api/reports', [
            'category' => 'Illegal dumping',
            'description' => 'A large amount of trash is blocking the drain.',
            'location' => 'North road',
        ])->assertOk();
        $reportId = $response->json('report_id');

        $this->actingAs($admin)->postJson('/api/reports/' . $reportId . '/assign', [
            'team_name' => 'History Team',
        ])->assertOk();
        $task = Task::where('report_id', $reportId)->firstOrFail();

        $this->actingAs($maintenance)->postJson('/api/tasks/' . $task->id . '/start')->assertOk();

        $this->actingAs($citizen)->getJson('/api/reports/' . $reportId)
            ->assertOk()
            ->assertJsonPath('report.status_history.0.status', 'Pending')
            ->assertJsonPath('report.status_history.1.status', 'Assigned')
            ->assertJsonPath('report.status_history.2.status', 'In Progress')
            ->assertJsonPath('report.status_history.2.actor', 'History Team');

        $this->assertSame(3, Report::findOrFail($reportId)->statusHistory()->count());
    }
}