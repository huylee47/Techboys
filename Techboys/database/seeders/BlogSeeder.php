<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/blogs.json'));
        $blogs = json_decode($json, true);

        // Chèn dữ liệu vào bảng blogs
        foreach ($blogs as $blog) {
            DB::table('blogs')->insert([
                'title' => $blog['title'],
                'content' => $blog['content'],
                'slug' => $blog['slug'],
                'user_id' => $blog['user_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
