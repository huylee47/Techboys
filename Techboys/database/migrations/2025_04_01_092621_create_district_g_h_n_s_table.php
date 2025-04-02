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
        Schema::create('district_ghns', function (Blueprint $table) {
            $table->unsignedBigInteger('district_id')->primary();
            $table->string('name');          
            $table->string('code')->nullable(); 
            $table->unsignedBigInteger('province_id');
        

            $table->timestamps();
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (!env('KEEP_GHN_DATA', false)) {
            Schema::dropIfExists('district_ghns');
        }
    }
    
};
