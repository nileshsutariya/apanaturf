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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->after('profile_image')->nullable();
            $table->foreign('city_id')->references('id')->on('city');
            
            $table->unsignedBigInteger('area_id')->after('city_id')->nullable();
            $table->foreign('area_id')->references('id')->on('area_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
