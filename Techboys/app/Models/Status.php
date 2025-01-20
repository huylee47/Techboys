<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table ='status';
    protected $fillable = ['name'];

    public function bill(){
        return $this->hasMany(Bill::class);
    }
    public function refund(){
        return $this->hasMany(Refund::class);
    }
    public function chats(){
        return $this->hasMany(Chats::class);
    }
    public function promotion(){
        return $this->hasMany(Promotion::class);
    }
}
