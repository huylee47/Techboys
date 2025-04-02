<?php

namespace App\Events;

use App\Models\Bill;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NewBillCreated implements ShouldBroadcast
{
    use SerializesModels;

    public $bill;

    /**
     * Create a new event instance.
     *
     * @param  Bill  $bill
     * @return void
     */
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        // Channel cho admin, có thể là private hoặc public channel
        return new Channel('admin.newbill');
    }

    /**
     * Tên sự kiện khi broadcast.
     */

    /**
     * Dữ liệu sẽ được truyền khi sự kiện broadcast.
     */
    public function broadcastWith()
    {
        return [
            'bill_id' => $this->bill->id,
            'order_id' => $this->bill->order_id,
            'total' => $this->bill->total,
            'full_name' => $this->bill->full_name,
        ];
    }
}
