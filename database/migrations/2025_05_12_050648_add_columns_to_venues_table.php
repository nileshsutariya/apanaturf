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
            $table->string('owner_name')->after('turf_id');
            $table->string('owner_email')->after('turf_id');
            $table->string('owner_phone')->after('turf_id');
            $table->string('vendor_ID')->after('turf_id');
            $table->unsignedBigInteger('pancard')->after('location_text')->nullable();
            $table->unsignedBigInteger('Aadhaar_card')->after('location_text')->nullable();
            $table->unsignedBigInteger('vendor_image')->after('location_text')->nullable();
            $table->unsignedBigInteger('area_id')->after('city_id')->nullable();
            $table->foreign('pancard')->references('id')->on('images');
            $table->foreign('Aadhaar_card')->references('id')->on('images');
            $table->foreign('vendor_image')->references('id')->on('images');
            $table->foreign('area_id')->references('id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            //
        });
    }
};
