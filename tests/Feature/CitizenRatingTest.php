<?php

namespace Tests\Feature;

use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitizenRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_citizens_can_rate_completed_tasks_from_zero_to_five_stars(): void
    {
        $citizen = User::create([
            'full_name' => 'Rating Citizen',
            'email' => 'rating-citizen@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'points' => 0,
        ]);
        $maintenance = User::create([
            'full_name' => 'Rating Team Member',
            'email' => 'rating-team@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'maintenance',
            'team_name' => 'Rating Team',
            'points' => 0,
        ]);

        $zeroTask = $this->createCompletedTask($citizen, 'Zero-star report');
        $fiveTask = $this->createCompletedTask($citizen, 'Five-star report');
        $invalidTask = $this->createCompletedTask($citizen, 'Out-of-range report');

        $this->actingAs($citizen)->postJson('/api/tasks/' . $zeroTask->id . '/rate', [
            'rating' => 0,
        ])->assertOk()->assertJsonPath('success', true);

        $this->postJson('/api/tasks/' . $fiveTask->id . '/rate', [
            'rating' => 5,
        ])->assertOk()->assertJsonPath('success', true);

        $this->postJson('/api/tasks/' . $invalidTask->id . '/rate', [
            'rating' => 6,
        ])->assertUnprocessable()->assertJsonValidationErrors('rating');

        $this->assertDatabaseHas('ratings', ['task_id' => $zeroTask->id, 'rating' => 0]);
        $this->assertDatabaseHas('ratings', ['task_id' => $fiveTask->id, 'rating' => 5]);
        $this->assertDatabaseMissing('ratings', ['task_id' => $invalidTask->id]);

        $this->actingAs($citizen)->getJson('/api/reports')
            ->assertOk()
            ->assertJsonFragment(['before_photo' => 'storage/uploads/before.jpg'])
            ->assertJsonFragment(['after_photo' => 'storage/uploads/after.jpg']);

        $this->actingAs($maintenance)->getJson('/api/stats')
            ->assertOk()
            ->assertJsonPath('avg_rating', 2.5);
    }

    private function createCompletedTask(User $citizen, string $category): Task
    {
        $report = Report::create([
            'citizen_id' => $citizen->id,
            'category' => $category,
            'description' => 'Completed maintenance work for rating test.',
            'location' => 'Test location',
            'status' => 'Completed',
            'assigned_team' => 'Rating Team',
        ]);

        return Task::create([
            'report_id' => $report->id,
            'team_name' => 'Rating Team',
            'status' => 'Completed',
            'title' => $category,
            'location' => 'Test location',
            'before_photo' => 'storage/uploads/before.jpg',
            'after_photo' => 'storage/uploads/after.jpg',
        ]);
    }
}