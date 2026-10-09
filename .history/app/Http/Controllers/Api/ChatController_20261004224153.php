<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatConversation;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function contacts(Request $request)
    {
        $user = Auth::user();

        $contacts = User::where('id', '!=', $user->id)
            ->orderBy('full_name')
            ->get()
            ->map(function ($contact) use ($user) {
                $conversation = $this->getConversationForUsers($user->id, $contact->id);
                $lastMessage = $conversation ? $conversation->messages()->latest()->first() : null;

                return [
                    'id' => $contact->id,
                    'full_name' => $contact->full_name,
                    'email' => $contact->email,
                    'role' => $contact->role,
                    'team_name' => $contact->team_name,
                    'conversation_id' => $conversation?->id,
                    'last_message' => $lastMessage?->message,
                    'last_message_image' => $lastMessage?->image_path ? Storage::disk('public')->url($lastMessage->image_path) : null,
                    'last_message_time' => $lastMessage?->created_at?->toIso8601String(),
                ];
            });

        return response()->json([
            'success' => true,
            'users' => $contacts,
        ]);
    }

    public function conversations(Request $request)
    {
        $user = Auth::user();

        $conversations = ChatConversation::where('user_one_id', $user->id)
            ->orWhere('user_two_id', $user->id)
            ->with(['userOne', 'userTwo'])
            ->orderByDesc('last_message_at')
            ->get()
            ->map(function ($conversation) use ($user) {
                $otherUser = $conversation->user_one_id === $user->id ? $conversation->userTwo : $conversation->userOne;
                $lastMessage = $conversation->messages()->latest()->first();

                return [
                    'id' => $conversation->id,
                    'other_user' => [
                        'id' => $otherUser?->id,
                        'full_name' => $otherUser?->full_name,
                        'email' => $otherUser?->email,
                        'role' => $otherUser?->role,
                        'team_name' => $otherUser?->team_name,
                    ],
                    'last_message' => $lastMessage?->message,
                    'last_message_image' => $lastMessage?->image_path ? Storage::disk('public')->url($lastMessage->image_path) : null,
                    'last_message_time' => $lastMessage?->created_at?->toIso8601String(),
                ];
            });

        return response()->json([
            'success' => true,
            'conversations' => $conversations,
        ]);
    }

    public function messages(Request $request, ChatConversation $conversation)
    {
        $user = Auth::user();
        if (!($conversation->user_one_id === $user->id || $conversation->user_two_id === $user->id)) {
            abort(403, 'Not authorized.');
        }

        $messages = $conversation->messages()->with(['sender', 'recipient'])->orderBy('created_at')->get()->map(function ($message) {
            return [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'recipient_id' => $message->recipient_id,
                'message' => $message->message,
                'image_url' => $message->image_path ? Storage::disk('public')->url($message->image_path) : null,
                'created_at' => $message->created_at->toIso8601String(),
                'sender_name' => $message->sender?->full_name,
            ];
        });

        return response()->json([
            'success' => true,
            'conversation' => [
                'id' => $conversation->id,
                'user_one_id' => $conversation->user_one_id,
                'user_two_id' => $conversation->user_two_id,
            ],
            'messages' => $messages,
        ]);
    }

    public function send(Request $request)
    {
        $user = Auth::user();
        $recipientId = (int) $request->input('recipient_id');
        $message = trim((string) $request->input('message', ''));
        $photo = $request->file('photo');

        if ($recipientId === $user->id) {
            return response()->json(['success' => false, 'message' => 'You cannot chat with yourself.'], 422);
        }

        if ($message === '' && !$photo) {
            return response()->json(['success' => false, 'message' => 'Please add a message or photo.'], 422);
        }

        $recipient = User::find($recipientId);
        if (!$recipient) {
            return response()->json(['success' => false, 'message' => 'Recipient not found.'], 404);
        }

        $ids = [$user->id, $recipient->id];
        sort($ids);

        $conversation = ChatConversation::firstOrCreate([
            'user_one_id' => $ids[0],
            'user_two_id' => $ids[1],
        ]);

        $imagePath = null;
        if ($photo) {
            $imagePath = $photo->store('chat', 'public');
        }

        $chatMessage = ChatMessage::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $user->id,
            'recipient_id' => $recipient->id,
            'message' => $message !== '' ? $message : null,
            'image_path' => $imagePath,
            'is_read' => false,
        ]);

        $conversation->update([
            'last_message_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent.',
            'conversation_id' => $conversation->id,
            'chat_message' => [
                'id' => $chatMessage->id,
                'sender_id' => $chatMessage->sender_id,
                'recipient_id' => $chatMessage->recipient_id,
                'message' => $chatMessage->message,
                'image_url' => $chatMessage->image_path ? Storage::disk('public')->url($chatMessage->image_path) : null,
                'created_at' => $chatMessage->created_at->toIso8601String(),
            ],
        ]);
    }

    private function getConversationForUsers(int $userId, int $otherUserId): ?ChatConversation
    {
        $ids = [$userId, $otherUserId];
        sort($ids);

        return ChatConversation::where('user_one_id', $ids[0])
            ->where('user_two_id', $ids[1])
            ->first();
    }
}
