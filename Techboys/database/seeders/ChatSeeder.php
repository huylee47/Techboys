<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/chats.json'));
        $chats = json_decode($json, true);

        // Thêm dữ liệu vào bảng `chats`
        foreach ($chats as $chat) {
            DB::table('chats')->insert([
                'customer_id' => $chat['customer_id'],
                'staff_id' => $chat['staff_id'],
                'guest_id' => $chat['guest_id'],
                'status_id' => $chat['status_id'],
                'created_at' => Carbon::parse($chat['created_at']),
                'updated_at' => Carbon::parse($chat['updated_at']),
            ]);
        }
    }
}
