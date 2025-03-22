<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_variants';
    protected $appends = ['discounted_price'];

    protected $fillable = ['product_id', 'attribute_values', 'price', 'stock',];
    protected $casts = [
        'attribute_values' => 'array',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function billDetails(){
        return $this->hasMany(BillDetails::class);
    }  
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function getDiscountedPriceAttribute()
    {
        if ($this->exists) {
            $promotion = $this->product->promotion ?? null;
            if ($promotion && now()->lt(Carbon::parse($promotion->end_date))) {
                return round($this->price * (1 - $promotion->discount_percent / 100), 2);
            }
            return $this->price;
        }
    
        return $this->product ? $this->product->discounted_price : null;
    }
    
    


}
