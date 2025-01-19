<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/brands.json'));
        $brands = json_decode($json, true);

        // Chèn dữ liệu vào bảng brands
        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
