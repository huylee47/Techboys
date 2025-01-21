<?php

namespace App\Service;
use App\Models\Product;

class ProductService{
    public function getAllProducts(){
        return Product::all();
    }
    public function createProduct(){

    }

}