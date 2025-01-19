<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/bills.json'));
        $bills = json_decode($json, true);

        // Chèn dữ liệu vào bảng bills
        foreach ($bills as $bill) {
            DB::table('bills')->insert([
                'user_id' => $bill['user_id'],
                'guest_id' => $bill['guest_id'],
                'full_name' => $bill['full_name'],
                'phone' => $bill['phone'],
                'total' => $bill['total'],
                'address' => $bill['address'],
                'email' => $bill['email'],
                'payment_method' => $bill['payment_method'],
                'status_id' => $bill['status_id'],
                'voucher_code' => $bill['voucher_code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
