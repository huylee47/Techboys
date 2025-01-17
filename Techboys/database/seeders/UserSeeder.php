<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Vũ Ngọc Minh Vương',
                'email' => 'vuongvu@gmail.com',
                'email_verified_at' => now(),
                'username' => 'vungocminhvuong',
                'password' => bcrypt('password123'),
                'phone' => '0901234567',
                'wallet' => 1000,
                'address' => '123 Đường ABC, TP.Hải Phòng',
                'gender' => true,
                'dob' => '1990-05-10',
                'status' => 1,
                'role_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lê Khánh Huy',
                'email' => 'khanhhuy@gmail.com',
                'email_verified_at' => now(),
                'username' => 'lekhanhhuy',
                'password' => bcrypt('password123'),
                'phone' => '0901234567',
                'wallet' => 1000,
                'address' => '123 Đường ABC, TP.Hải Phòng',
                'gender' => true,
                'dob' => '1990-05-10',
                'status' => 1,
                'role_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vũ Đình Minh',
                'email' => 'dinhminh@gmail.com',
                'email_verified_at' => now(),
                'username' => 'vudinhminh',
                'password' => bcrypt('password123'),
                'phone' => '0901234567',
                'wallet' => 1000,
                'address' => '123 Đường ABC, TP.Hải Phòng',
                'gender' => true,
                'dob' => '1990-05-10',
                'status' => 1,
                'role_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Trần Văn Tài',
                'email' => 'vantai@gmail.com',
                'email_verified_at' => now(),
                'username' => 'tranvantai',
                'password' => bcrypt('password123'),
                'phone' => '0901234567',
                'wallet' => 1000,
                'address' => '123 Đường ABC, TP.Hải Phòng',
                'gender' => true,
                'dob' => '1990-05-10',
                'status' => 1,
                'role_id' => 1,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
