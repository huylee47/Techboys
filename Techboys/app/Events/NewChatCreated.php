<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatCreated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $chat;

    public function __construct($chat)
    {
        $this->chat = $chat;
    }

    public function broadcastOn()
    {
        return new Channel('admin.chats');
    }

    public function broadcastWith()
    {
    $this->chat->load('User');

        return [
            'chat_id' => $this->chat->id,
            'customer_id' => $this->chat->customer_id,
            'guest_id' => $this->chat->guest_id,
            'status_id' => $this->chat->status_id,
            'role_id' => $this->chat->customer?->role_id ?? null,
            'customer_name' => $this->chat->customer?->name ?? null,
            'gender' => $this->chat->customer?->gender ?? null,
        ];
    }
}