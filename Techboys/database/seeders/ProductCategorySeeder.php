<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/product_categories.json'));
        $categories = json_decode($json, true);

        // Thêm dữ liệu vào bảng
        foreach ($categories as $category) {
            DB::table('product_categories')->insert([
                'name' => $category['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
