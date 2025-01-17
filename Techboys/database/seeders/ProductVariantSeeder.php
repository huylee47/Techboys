<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Các sản phẩm điện thoại mẫu
        $products = [
            'iPhone 13',
            'Samsung Galaxy S21',
            'Xiaomi Mi 11',
            'Oppo F19',
            'Vivo V21',
            'Huawei P40',
            'Realme 8',
            'OnePlus 9',
            'Sony Xperia 5',
            'Nokia 8.3 5G',
            'iPhone 12',
            'Samsung Galaxy Note 20',
            'Xiaomi Redmi Note 10',
            'Oppo Reno 5',
            'Vivo Y20',
            'Huawei Mate 40',
            'Realme Narzo 30',
            'OnePlus Nord',
            'Sony Xperia 1',
            'Nokia 7.2',
            'iPhone SE',
            'Samsung Galaxy A52',
            'Xiaomi Redmi 9',
            'Oppo A54',
            'Vivo Y51',
            'Huawei P30',
            'Realme X7',
            'OnePlus 8T',
            'Sony Xperia 10',
            'Nokia 5.4',
            'iPhone 11',
            'Samsung Galaxy Z Flip',
            'Xiaomi Mi 10',
            'Oppo Find X3',
            'Vivo V19',
            'Huawei Nova 7',
            'Realme 7 Pro',
            'OnePlus 8 Pro',
            'Sony Xperia L4',
            'Nokia 6.2',
            'iPhone XR',
            'Samsung Galaxy A72',
            'Xiaomi Poco F3',
            'Oppo A94',
            'Vivo V17',
            'Huawei Mate 30',
            'Realme 6',
            'OnePlus 7T',
            'Sony Xperia XA2',
            'Nokia 4.2'
        ];

        $colors = ['Đen', 'Trắng', 'Xanh', 'Đỏ', 'Xanh lá cây', 'Vàng', 'Tím', 'Hồng'];
        $prices = [10000, 15000, 20000, 25000, 30000, 35000, 40000, 45000];
        $stocks = [10, 20, 50, 100, 200];

        // Duyệt qua từng sản phẩm và tạo product variants
        foreach ($products as $productName) {
            foreach ($colors as $color) {
                foreach ($prices as $price) {
                    foreach ($stocks as $stock) {
                        DB::table('product_variants')->insert([
                            'product_id' => rand(1, 10), // Giả sử bạn đã có 10 sản phẩm trong bảng products
                            'color' => $color,
                            'model' => $productName,
                            'price' => $price,
                            'stock' => $stock,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}
