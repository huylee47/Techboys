<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BillDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/bill_details.json'));
        $billDetails = json_decode($json, true);

        // Chèn dữ liệu vào bảng bill_details
        foreach ($billDetails as $billDetail) {
            DB::table('bill_details')->insert([
                'bill_id' => $billDetail['bill_id'],
                'product_id' => $billDetail['product_id'],
                'variant_id' => $billDetail['variant_id'],
                'quantity' => $billDetail['quantity'],
                'price' => $billDetail['price'],
                'slug' => $billDetail['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
