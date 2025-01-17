<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['brand_id' => 1, 'category_id' => 1, 'purchases' => 100, 'name' => 'iPhone 13', 'img' => 'iphone13.jpg', 'slug' => Str::slug('iPhone 13'), 'rate_average' => 4.5, 'description' => 'iPhone 13, màn hình 6.1 inch, chip A15 Bionic, camera 12MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 1, 'category_id' => 1, 'purchases' => 150, 'name' => 'iPhone 12', 'img' => 'iphone12.jpg', 'slug' => Str::slug('iPhone 12'), 'rate_average' => 4.4, 'description' => 'iPhone 12, màn hình 6.1 inch, chip A14 Bionic, camera 12MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 2, 'category_id' => 2, 'purchases' => 120, 'name' => 'Samsung Galaxy S21', 'img' => 'galaxy_s21.jpg', 'slug' => Str::slug('Samsung Galaxy S21'), 'rate_average' => 4.3, 'description' => 'Samsung Galaxy S21, màn hình 6.2 inch, Exynos 2100, camera 64MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 2, 'category_id' => 2, 'purchases' => 110, 'name' => 'Samsung Galaxy S20', 'img' => 'galaxy_s20.jpg', 'slug' => Str::slug('Samsung Galaxy S20'), 'rate_average' => 4.2, 'description' => 'Samsung Galaxy S20, màn hình 6.2 inch, Exynos 990, camera 64MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 3, 'category_id' => 3, 'purchases' => 95, 'name' => 'Google Pixel 5', 'img' => 'pixel5.jpg', 'slug' => Str::slug('Google Pixel 5'), 'rate_average' => 4.6, 'description' => 'Google Pixel 5, màn hình 6.0 inch, Snapdragon 765G, camera 16MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 3, 'category_id' => 3, 'purchases' => 100, 'name' => 'Google Pixel 4', 'img' => 'pixel4.jpg', 'slug' => Str::slug('Google Pixel 4'), 'rate_average' => 4.1, 'description' => 'Google Pixel 4, màn hình 5.7 inch, Snapdragon 855, camera 12MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 4, 'category_id' => 4, 'purchases' => 150, 'name' => 'OnePlus 9 Pro', 'img' => 'oneplus9pro.jpg', 'slug' => Str::slug('OnePlus 9 Pro'), 'rate_average' => 4.7, 'description' => 'OnePlus 9 Pro, màn hình 6.7 inch, Snapdragon 888, camera 48MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 4, 'category_id' => 4, 'purchases' => 130, 'name' => 'OnePlus 8T', 'img' => 'oneplus8t.jpg', 'slug' => Str::slug('OnePlus 8T'), 'rate_average' => 4.5, 'description' => 'OnePlus 8T, màn hình 6.55 inch, Snapdragon 865, camera 48MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 5, 'category_id' => 5, 'purchases' => 140, 'name' => 'Xiaomi Mi 11', 'img' => 'xiaomi_mi11.jpg', 'slug' => Str::slug('Xiaomi Mi 11'), 'rate_average' => 4.4, 'description' => 'Xiaomi Mi 11, màn hình 6.81 inch, Snapdragon 888, camera 108MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 5, 'category_id' => 5, 'purchases' => 115, 'name' => 'Xiaomi Redmi Note 10', 'img' => 'redmi_note10.jpg', 'slug' => Str::slug('Xiaomi Redmi Note 10'), 'rate_average' => 4.2, 'description' => 'Xiaomi Redmi Note 10, màn hình 6.43 inch, Snapdragon 678, camera 48MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 6, 'category_id' => 6, 'purchases' => 125, 'name' => 'Oppo Find X3 Pro', 'img' => 'oppo_find_x3_pro.jpg', 'slug' => Str::slug('Oppo Find X3 Pro'), 'rate_average' => 4.8, 'description' => 'Oppo Find X3 Pro, màn hình 6.7 inch, Snapdragon 888, camera 50MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 6, 'category_id' => 6, 'purchases' => 105, 'name' => 'Oppo Reno 5', 'img' => 'reno5.jpg', 'slug' => Str::slug('Oppo Reno 5'), 'rate_average' => 4.0, 'description' => 'Oppo Reno 5, màn hình 6.43 inch, Snapdragon 720G, camera 64MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 7, 'category_id' => 7, 'purchases' => 120, 'name' => 'Realme GT', 'img' => 'realme_gt.jpg', 'slug' => Str::slug('Realme GT'), 'rate_average' => 4.6, 'description' => 'Realme GT, màn hình 6.43 inch, Snapdragon 870, camera 64MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 7, 'category_id' => 7, 'purchases' => 110, 'name' => 'Realme Narzo 30 Pro', 'img' => 'narzo30pro.jpg', 'slug' => Str::slug('Realme Narzo 30 Pro'), 'rate_average' => 4.2, 'description' => 'Realme Narzo 30 Pro, màn hình 6.5 inch, MediaTek Dimensity 800U, camera 48MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 8, 'category_id' => 8, 'purchases' => 105, 'name' => 'Vivo V21e', 'img' => 'vivo_v21e.jpg', 'slug' => Str::slug('Vivo V21e'), 'rate_average' => 4.1, 'description' => 'Vivo V21e, màn hình 6.44 inch, MediaTek Dimensity 700, camera 64MP.', 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => 8, 'category_id' => 8, 'purchases' => 125, 'name' => 'Vivo Y73', 'img' => 'vivo_y73.jpg', 'slug' => Str::slug('Vivo Y73'), 'rate_average' => 4.3, 'description' => 'Vivo Y73, màn hình 6.44 inch, MediaTek Helio G95, camera 64MP.', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('products')->insert($products);
    }
}
