<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Đọc dữ liệu từ file JSON
        $json = File::get(database_path('seeders/json/comments.json'));
        $comments = json_decode($json, true);

        // Chèn dữ liệu vào bảng comments
        foreach ($comments as $comment) {
            DB::table('comments')->insert([
                'user_id' => $comment['user_id'],
                'product_id' => $comment['product_id'],
                'content' => $comment['content'],
                'rate' => $comment['rate'],
                'file_id' => $comment['file_id'],
                'status_id' => $comment['status_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
