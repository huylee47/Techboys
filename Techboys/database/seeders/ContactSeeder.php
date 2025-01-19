<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/contacts.json'));
        $contacts = json_decode($json, true);

        // Chèn dữ liệu vào bảng contacts
        foreach ($contacts as $contact) {
            DB::table('contacts')->insert([
                'name' => $contact['name'],
                'email' => $contact['email'],
                'phone' => $contact['phone'],
                'message' => $contact['message'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
