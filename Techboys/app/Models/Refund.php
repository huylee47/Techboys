<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $table = 'refunds';
    protected $fillable = ['bill_id', 'file_id', 'reason', 'status_id'];

    public function bill(){
        return $this->belongsTo(Bill::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function storage(){
        return $this->belongsTo(Storage::class);
    }
}
