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
            $table->string('password')->after('id');
            $table->string('owner_name')->after('id');
            $table->string('owner_email')->after('id');
            $table->string('owner_phone')->after('id');
            $table->string('vendor_id')->after('id');
            $table->unsignedBigInteger('pancard')->after('location_text')->nullable();
            $table->unsignedBigInteger('Aadhaar_card')->after('pancard')->nullable();
            $table->unsignedBigInteger('vendor_image')->after('Aadhaar_card')->nullable();
            $table->unsignedBigInteger('area_id')->after('city_id')->nullable();
            $table->foreign('pancard')->references('id')->on('images');
            $table->foreign('Aadhaar_card')->references('id')->on('images');
            $table->foreign('vendor_image')->references('id')->on('images');
            $table->foreign('area_id')->references('id')->on('area_code');
            $table->timestamp('password_update')->after('password')->nullable();
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
