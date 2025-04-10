<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserBlocked implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
        Log::info("Đăng xuất do bị khoá: {$this->userId}");
    }

    public function broadcastOn()
    {
        Log::info("Lắng nghe sự kiện đăng xuất đến kênh: admin.blocked.{$this->userId}");
        return new Channel('admin.blocked.' . $this->userId);
    }
    
    public function broadcastWith()
    {
        Log::info("Phát sự kiện đăng xuất: ", ['userId' => $this->userId]);
        return [
            'userId' => $this->userId,
            'message' => 'Tài khoản của bạn đã bị khóa, vui lòng đăng nhập lại.'
        ];
    }
    
}
