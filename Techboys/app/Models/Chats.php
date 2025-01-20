<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chats extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $fillable = ['staff_id', 'customer_id', 'status_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Status(){
        return $this->belongsTo(Status::class);
    }
}
