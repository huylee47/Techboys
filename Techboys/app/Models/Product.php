<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'brand_id', 'description', 'category_id','purchases','img','slug','rate_average'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function variant(){
        return $this->hasMany(ProductVariant::class);
    }
    
}
