<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_categories')->insert([
            ['name' => 'Điện thoại', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laptop', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Máy tính bảng', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Phụ kiện', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tai nghe', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Smartwatch', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tivi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Máy ảnh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Giới thiệu', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
