<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table ='messages';
    protected $fillable = ['chat_id', 'sender_id','message'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
