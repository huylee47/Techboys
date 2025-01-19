<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/users.json'));
        $users = json_decode($json, true);

        // Thêm dữ liệu vào bảng 'users'
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => $user['email_verified_at'],
                'username' => $user['username'],
                'password' => $user['password'],
                'phone' => $user['phone'],
                'wallet' => $user['wallet'],
                'address' => $user['address'],
                'gender' => $user['gender'],
                'dob' => $user['dob'],
                'status' => $user['status'],
                'role_id' => $user['role_id'],
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
