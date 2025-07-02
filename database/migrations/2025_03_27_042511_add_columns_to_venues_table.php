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
            $table->unsignedBigInteger('city_id')->after('balance')->nullable();
            $table->foreign('city_id')->references('id')->on('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->dropForeign(['city_id']);  // Drops the foreign key constraint
            $table->dropColumn('city_id');    // Drops the city_id column
        });
    }

};
