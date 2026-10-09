<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ChatFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_citizen_can_send_a_message_to_another_user(): void
    {
        $citizen = User::create([
            'full_name' => 'Alice Citizen',
            'email' => 'alice@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'team_name' => null,
            'points' => 0,
        ]);

        $maintenance = User::create([
            'full_name' => 'Maintenance One',
            'email' => 'team@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'maintenance',
            'team_name' => 'Team One',
            'points' => 0,
        ]);

        $this->actingAs($citizen);

        $response = $this->postJson('/api/chat/send', [
            'recipient_id' => $maintenance->id,
            'message' => 'Hello team!',
        ]);

        $response->assertOk();
        $response->assertJsonPath('success', true);
        $this->assertDatabaseHas('chat_messages', [
            'sender_id' => $citizen->id,
            'recipient_id' => $maintenance->id,
            'message' => 'Hello team!',
        ]);
    }

    public function test_citizen_can_send_a_photo_message(): void
    {
        $citizen = User::create([
            'full_name' => 'Alice Citizen',
            'email' => 'alice2@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'citizen',
            'team_name' => null,
            'points' => 0,
        ]);

        $maintenance = User::create([
            'full_name' => 'Maintenance Two',
            'email' => 'team2@example.com',
            'password' => bcrypt('secret123'),
            'role' => 'maintenance',
            'team_name' => 'Team Two',
            'points' => 0,
        ]);

        $this->actingAs($citizen);

        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAF' . 'c0vSAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJ0UkG' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQ' . 'AAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAAAAAAgI0sQAAAAJ0UkGAA' . 'AAA=' );
        $path = tempnam(sys_get_temp_dir(), 'chat');
        file_put_contents($path, $png);

        $response = $this->post('/api/chat/send', [
            'recipient_id' => $maintenance->id,
            'message' => 'Photo update',
            'photo' => new UploadedFile($path, 'report.png', 'image/png', null, true),
        ]);

        $response->assertOk();
        $response->assertJsonPath('success', true);
        $this->assertDatabaseHas('chat_messages', [
            'sender_id' => $citizen->id,
            'recipient_id' => $maintenance->id,
            'message' => 'Photo update',
        ]);
    }
}
