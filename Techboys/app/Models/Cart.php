<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['user_id','cart_id','variant_id', 'quantity','voucher_code'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function cartDetails(){
    //     return $this->hasMany(CartDetail::class);
    // }
    public function variant(){
        return $this->belongsTo(ProductVariant::class);
    }
    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }
}
