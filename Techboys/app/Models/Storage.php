<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $table ='storages';
    protected $fillable = ['file'];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
    public function refund(){
        return $this->hasMany(Refund::class);
    }
}
