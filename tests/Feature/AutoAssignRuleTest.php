<?php

namespace Tests\Feature;

use App\Models\AutoAssignRule;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutoAssignRuleTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_list_update_and_delete_auto_assign_rules(): void
    {
        $admin = User::create([
            'full_name' => 'Rule Admin',
            'email' => 'rule-admin@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'admin',
            'points' => 0,
        ]);
        User::create([
            'full_name' => 'Rule Team Member',
            'email' => 'rule-team@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'maintenance',
            'team_name' => 'Road Team',
            'points' => 0,
        ]);

        $created = $this->actingAs($admin)->postJson('/api/auto-assign-rules', [
            'category_pattern' => '  pothole  ',
            'team_name' => 'Road Team',
            'is_active' => true,
        ])->assertOk()->assertJsonPath('rule.category_pattern', 'pothole');
        $ruleId = $created->json('rule.id');

        $this->getJson('/api/auto-assign-rules')
            ->assertOk()
            ->assertJsonPath('rules.0.id', $ruleId);

        $this->postJson('/api/auto-assign-rules/' . $ruleId, [
            'category_pattern' => 'road damage',
            'team_name' => 'Road Team',
            'is_active' => false,
        ])->assertOk()->assertJsonPath('rule.is_active', false);

        $this->deleteJson('/api/auto-assign-rules/' . $ruleId)
            ->assertOk()
            ->assertJsonPath('success', true);

        $this->assertDatabaseMissing('auto_assign_rules', ['id' => $ruleId]);
    }

    public function test_non_admin_cannot_manage_auto_assign_rules(): void
    {
        $citizen = User::create([
            'full_name' => 'Rule Citizen',
            'email' => 'rule-citizen@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'points' => 0,
        ]);

        $this->actingAs($citizen)->getJson('/api/auto-assign-rules')->assertForbidden();
        $this->assertSame(0, AutoAssignRule::count());
    }

    public function test_matching_active_rule_assigns_new_citizen_report_to_team(): void
    {
        $citizen = User::create([
            'full_name' => 'Auto Assign Citizen',
            'email' => 'auto-citizen@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'points' => 0,
        ]);
        $maintenance = User::create([
            'full_name' => 'Auto Assign Team Member',
            'email' => 'auto-team@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'maintenance',
            'team_name' => 'Road Team',
            'points' => 0,
        ]);
        AutoAssignRule::create([
            'category_pattern' => 'pothole',
            'team_name' => 'Road Team',
            'is_active' => true,
        ]);

        $response = $this->actingAs($citizen)->postJson('/api/reports', [
            'category' => 'Large pothole',
            'description' => 'A large pothole is blocking the road near the school.',
            'location' => 'North road',
        ])->assertOk()
            ->assertJsonPath('assigned_team', 'Road Team');

        $reportId = $response->json('report_id');
        $this->assertSame('Assigned', Report::findOrFail($reportId)->status);
        $this->assertDatabaseHas('tasks', [
            'report_id' => $reportId,
            'team_name' => 'Road Team',
        ]);
        $this->assertDatabaseHas('report_status_histories', [
            'report_id' => $reportId,
            'status' => 'Assigned',
            'user_id' => null,
        ]);
        $this->assertDatabaseHas('user_notifications', [
            'user_id' => $maintenance->id,
            'report_id' => $reportId,
            'title' => 'New task assigned',
        ]);
    }
}