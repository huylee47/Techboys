<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status_id', 'discount_percent', 'product_id', 'start_date','end_date'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
