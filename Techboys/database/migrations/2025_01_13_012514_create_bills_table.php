<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('full_name');
            $table->string('phone');
            $table->decimal('total', 20, 2);
            $table->text('address');
            $table->foreignId('province_id');
            $table->foreignId('district_id');
            $table->foreignId('ward_id');
            $table->string('email');
            $table->tinyInteger('payment_method');
            $table->tinyInteger('payment_status')->default(0);
            $table->tinyInteger('status_id')->default(1);
            $table->text('note')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
