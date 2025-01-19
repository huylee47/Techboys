<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/vouchers.json'));
        $vouchers = json_decode($json, true);

        // Chèn dữ liệu vào bảng vouchers
        foreach ($vouchers as $voucher) {
            DB::table('vouchers')->insert([
                'name' => $voucher['name'],
                'code' => $voucher['code'],
                'discount_percent' => $voucher['discount_percent'],
                'discount_amount' => $voucher['discount_amount'],
                'quantity' => $voucher['quantity'],
                'min_price' => $voucher['min_price'],
                'max_price' => $voucher['max_price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
