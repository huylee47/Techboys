<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ward_ghns', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('name');          
            $table->unsignedBigInteger('district_id');
        
            $table->timestamps();
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!env('KEEP_GHN_DATA', false)) {
            Schema::dropIfExists('ward_ghns');
        }
    }
};
