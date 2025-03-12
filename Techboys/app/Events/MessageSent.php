<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
        Log::info('📡 MessageSent event fired!', ['message' => $message]);
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
        return [
            'chat_id'    => $this->message->chat_id,
            'sender_id'  => $this->message->sender_id,
            'guest_id'   => $this->message->guest_id,
            'message'    => $this->message->message,
            'created_at' => $this->message->created_at->toDateTimeString(),
        ];
    }
    
}

