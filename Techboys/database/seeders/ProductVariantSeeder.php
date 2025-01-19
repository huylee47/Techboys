<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/product_variants.json'));
        $variants = json_decode($json, true);

        // Thêm dữ liệu vào bảng
        foreach ($variants as $variant) {
            DB::table('product_variants')->insert([
                'product_id' => $variant['product_id'],
                'color' => $variant['color'],
                'model' => $variant['model'],
                'price' => $variant['price'],
                'stock' => $variant['stock'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
