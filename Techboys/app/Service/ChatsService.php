<?php

namespace App\Service;

use App\Events\MessageSent;
use App\Models\Chats;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatsService
{


    public function sendMessage($request)
{
    $message = $request->input('message');

    if (!$message) {
        return response()->json(['error' => 'Tin nhắn không được để trống'], 400);
    }

    if (Auth::check()) {
        $senderId = Auth::id();
        $guestId = null;
    } else {
        $senderId = null;
        $guestId = session()->getId();
    }

    $chat = Chats::where(function ($query) use ($senderId, $guestId) {
            if ($senderId) {
                $query->where('customer_id', $senderId);
            } else {
                $query->where('guest_id', $guestId);
            }
        })->first();

    if (!$chat) {
        $chat = Chats::create([
            'customer_id' => $senderId,
            'guest_id' => $guestId,
            'status_id' => 1
        ]);
    }

    $newMessage = Message::create([
        'chat_id' => $chat->id,
        'sender_id' => $senderId,
        'guest_id' => $guestId,
        'message' => $message
    ]);

    broadcast(new MessageSent($newMessage))->toOthers();

    return response()->json([
        'success' => true,
        'chat_id' => $chat->id,
        'message' => $newMessage,
    ]);
}
public function loadMessage()
{
    $user = Auth::user();
    $guestId = session()->getId();

    $chat = Chats::where(function ($query) use ($user, $guestId) {
            if ($user) {
                $query->where('customer_id', $user->id);
            } else {
                $query->where('guest_id', $guestId);
            }
        })->first();

    if (!$chat) {
        return response()->json([]);
    }

    $messages = Message::where('chat_id', $chat->id)
        ->orderBy('created_at', 'asc')
        ->get();

    return response()->json([
        'chat_id' => $chat->id,
        'messages' => $messages
    ]);
}

}
