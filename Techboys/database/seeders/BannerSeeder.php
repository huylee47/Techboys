<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/banners.json'));
        $banners = json_decode($json, true);

        // Chèn dữ liệu vào bảng banners
        foreach ($banners as $banner) {
            DB::table('banners')->insert([
                'title' => $banner['title'],
                'banners' => $banner['banners'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
