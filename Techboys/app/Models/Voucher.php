<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'voucher';
    protected $fillable = ['code','name', 'discount_percent','discount_amount', 'min_price','max_price','quantity'];
    
    public function bill(){
        return $this->hasMany(Bill::class);
    }
}
