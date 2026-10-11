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
    public function unread()
    {
        $count = ChatMessage::where('recipient_id', Auth::id())
            ->where('is_read', false)
            ->count();

        return response()->json(['success' => true, 'unread_count' => $count]);
    }

    public function contacts(Request $request)
    {
        $user = Auth::user();

        $contacts = User::where('id', '!=', $user->id)
            ->orderBy('full_name')
            ->get()
            ->map(function ($contact) use ($user) {
                $conversation = $this->getConversationForUsers($user->id, $contact->id);
                $lastMessage = $conversation ? $conversation->messages()->latest()->first() : null;
                $unreadCount = $conversation
                    ? $conversation->messages()->where('recipient_id', $user->id)->where('is_read', false)->count()
                    : 0;

                return [
                    'id' => $contact->id,
                    'full_name' => $contact->full_name,
                    'email' => $contact->email,
                    'role' => $contact->role,
                    'team_name' => $contact->team_name,
                    'photo_url' => $contact->photo_url,
                    'conversation_id' => $conversation?->id,
                    'last_message' => $lastMessage?->message,
                    'last_message_image' => $this->imageUrl($lastMessage),
                    'last_message_time' => $lastMessage?->created_at?->toIso8601String(),
                    'unread_count' => $unreadCount,
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
                        'photo_url' => $otherUser?->photo_url,
                    ],
                    'last_message' => $lastMessage?->message,
                    'last_message_image' => $this->imageUrl($lastMessage),
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
        if (!((int) $conversation->user_one_id === (int) $user->id || (int) $conversation->user_two_id === (int) $user->id)) {
            abort(403, 'Not authorized.');
        }

        $conversation->messages()
            ->where('recipient_id', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $messages = $conversation->messages()->with(['sender', 'recipient'])->orderBy('created_at')->get()->map(function ($message) {
            return [
                'id' => $message->id,
                'sender_id' => $message->sender_id,
                'recipient_id' => $message->recipient_id,
                'message' => $message->message,
                'image_url' => $this->imageUrl($message),
                'created_at' => $message->created_at->toIso8601String(),
                'sender_name' => $message->sender?->full_name,
                'sender_photo' => $message->sender?->photo_url,
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
        $data = $request->validate([
            'recipient_id' => 'required|integer|exists:users,id',
            'message' => 'nullable|string|max:5000',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ]);
        $recipientId = (int) $data['recipient_id'];
        $message = trim((string) ($data['message'] ?? ''));
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
                'image_url' => $this->imageUrl($chatMessage),
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

    public function delete(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'recipient_id' => 'required|integer|exists:users,id',
        ]);
        $recipientId = (int) $data['recipient_id'];

        if ($recipientId === $user->id) {
            return response()->json(['success' => false, 'message' => 'You cannot delete a conversation with yourself.'], 422);
        }

        $ids = [$user->id, $recipientId];
        sort($ids);

        $conversation = ChatConversation::where('user_one_id', $ids[0])
            ->where('user_two_id', $ids[1])
            ->first();

        if (!$conversation) {
            return response()->json(['success' => false, 'message' => 'Conversation not found.'], 404);
        }

        // Delete all messages in the conversation
        $conversation->messages()->delete();

        // Delete the conversation
        $conversation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Conversation deleted.',
        ]);
    }

    private function imageUrl(?ChatMessage $message): ?string
    {
        if (!$message?->image_path) {
            return null;
        }

        return url('/storage/' . ltrim($message->image_path, '/'));
    }
}
