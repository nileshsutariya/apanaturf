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
        Schema::table('venues', function (Blueprint $table) {
            $table->dropForeign(['turf_image']); 
            // $table->dropColumn('turf_image');

            $table->json('turf_image')->change()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->dropColumn('turf_image');

            $table->unsignedBigInteger('turf_image')->nullable();
            $table->foreign('turf_image')->references('id')->on('images');
        });
    }
};
