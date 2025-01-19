<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/products.json'));
        $products = json_decode($json, true);

        // Thêm dữ liệu vào bảng
        foreach ($products as $product) {
            DB::table('products')->insert([
                'brand_id' => $product['brand_id'],
                'category_id' => $product['category_id'],
                'purchases' => $product['purchases'],
                'name' => $product['name'],
                'img' => $product['img'],
                'slug' => $product['slug'],
                'rate_average' => $product['rate_average'],
                'description' => $product['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
