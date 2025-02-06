<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Chats;
use App\Models\Checklog;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Images;
use App\Models\Message;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductModel;
use App\Models\ProductVariant;
use App\Models\Promotion;
use App\Models\Refund;
use App\Models\Status;
use App\Models\Storage;
use App\Models\User;
use App\Models\Role;
use App\Models\Voucher;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $jsonFilePath = "./database/seeders/data.json";
        $jsonContent = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonContent, true);

        foreach ($dataArray['user'] as $data) {
            // Check if email already exists
            if (!User::where('email', $data['email'])->exists()) {
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'email_verified_at' => $data['email_verified_at'],
                    'username' => $data['username'],
                    'password' => Hash::make('password123'),
                    'phone' => $data['phone'],
                    'wallet' => $data['wallet'],
                    'address' => $data['address'],
                    'gender' => $data['gender'],
                    'dob' => $data['dob'],
                    'status' => $data['status'],
                    'role_id' => $data['role_id'],
                    'remember_token' => isset($data['remember_token']) ? Hash::make($data['remember_token']) : null,
                    'created_at' => $data['created_at'] ?? now(),
                    'updated_at' => $data['updated_at'] ?? now(),
                ]);
            }
        }
        foreach ($dataArray['banners'] as $data) {
            Banner::create($data);
        }
        foreach ($dataArray['bills'] as $data) {
            Bill::create($data);
        }
        foreach ($dataArray['bill_details'] as $data) {
            BillDetails::create($data);
        }
        foreach ($dataArray['brand'] as $data) {
            Brand::create($data);
        }
        foreach ($dataArray['cart'] as $data) {
            Cart::create($data);
        }
        foreach ($dataArray['chats'] as $data) {
            Chats::create($data);
        }
        foreach ($dataArray['checklog'] as $data) {
            Checklog::create($data);
        }
        foreach ($dataArray['config'] as $data) {
            Config::create($data);
        }
        foreach ($dataArray['comments'] as $data) {
            Comment::create($data);
        }
        foreach ($dataArray['contacts'] as $data) {
            Contact::create($data);
        }
        foreach ($dataArray['images'] as $data) {
            Images::create($data);
        }
        foreach ($dataArray['message'] as $data) {
            Message::create($data);
        }
        foreach ($dataArray['products'] as $data) {
            Product::create($data);
        }
        foreach ($dataArray['product_categories'] as $data) {
            ProductCategory::create($data);
        }
        foreach ($dataArray['product_variants'] as $data) {
            ProductVariant::create($data);
        }
        foreach ($dataArray['promotion'] as $data) {
            Promotion::create($data);
        }
        foreach ($dataArray['refund'] as $data) {
            Refund::create($data);
        }
        foreach ($dataArray['storage'] as $data) {
            Storage::create($data);
        }
        foreach ($dataArray['status'] as $data) {
            Status::create($data);
        }
        foreach ($dataArray['vouchers'] as $data) {
            Voucher::create($data);
        }
        foreach ($dataArray['blogs'] as $data) {
            Blog::create($data);
        }
        foreach ($dataArray['role'] as $data) {
            Role::create($data);
        }
        foreach ($dataArray['product_models'] as $data) {
            ProductModel::create($data);
        }
        foreach ($dataArray['colors'] as $data) {
            Color::create($data);
        }
        
    }
}
