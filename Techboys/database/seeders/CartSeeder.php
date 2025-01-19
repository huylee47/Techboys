<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/carts.json'));
        $carts = json_decode($json, true);

        // Chèn dữ liệu vào bảng carts
        foreach ($carts as $cart) {
            DB::table('carts')->insert([
                'user_id' => $cart['user_id'],
                'guest_id' => $cart['guest_id'],
                'cart_id' => $cart['cart_id'],
                'variant_id' => $cart['variant_id'],
                'quantity' => $cart['quantity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
