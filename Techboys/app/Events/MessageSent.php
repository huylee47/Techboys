<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Support\Facades\Log;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $role_id;

    /**
     * Create a new event instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
        Log::info('MessageSent event fired!', ['message' => $message]);
        Log::info('User loaded for message:', ['user' => $message->User]);

    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn()
    {
        // return new Channel('chat.' . $this->message->chat_id);
        return ['chat.' . $this->message->chat_id]; 
    }

    /**
     * Get the data to broadcast.
     */
public function broadcastWith()
{
    $this->message->load('User');
    
    Log::info(' message data:', [
        'chat_id' => $this->message->chat_id,
        'sender_id' => $this->message->sender_id,
        'guest_id' => $this->message->guest_id,
        'message' => $this->message->message,
        'created_at' => $this->message->created_at,
        'role_id' => $this->message->User?->role_id ?? null,
        'customer_name' => $this->message->User?->name ?? null
    ]);

    return [
        'chat_id' => $this->message->chat_id,
        'sender_id' => $this->message->sender_id,
        'guest_id' => $this->message->guest_id,
        'message' => $this->message->message,
        'created_at' => $this->message->created_at,
        'role_id' => $this->message->User?->role_id ?? null,
        'customer_name' => $this->message->User?->name ?? null,
        'debug' => 'debug'
    ];
}

    
}

