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
        Schema::create('rep_comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('comment_id');
            $table->foreignId('product_id');
            $table->decimal('rate', 10, 2)->default(0);
            $table->text('content'); // Ensure content is not nullable
            $table->foreignId('file_id')->nullable();
            $table->text('rep_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rep_comment');
    }
};
