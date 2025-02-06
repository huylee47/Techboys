<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'product_variants';
    protected $fillable = ['product_id', 'color_id', 'price', 'stock','model_id','ram_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function billDetails(){
        return $this->hasMany(BillDetails::class);
    }  
    public function cartDetails(){
        return $this->hasMany(CartDetail::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function model(){
        return $this->belongsTo(ProductModel::class);
    }
}
