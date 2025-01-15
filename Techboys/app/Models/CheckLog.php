<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklog extends Model
{
    use HasFactory;
    protected $table = 'checklogs';
    protected $fillable = ['user_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
