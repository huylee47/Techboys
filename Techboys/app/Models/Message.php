<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table ='messages';
    protected $fillable = ['chat_id', 'sender_id','guest_id','message'];

    public function User(){
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function chat(){
        return $this->belongsTo(Chats::class, 'chat_id');
    }
}
