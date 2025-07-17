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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id');
            $table->string('owner_name');
            $table->string('owner_email')->nullable();
            $table->string('owner_phone');
            $table->string('password');
            $table->timestamp('password_update')->nullable();
            $table->unsignedBigInteger('otp')->nullable();
            $table->timestamp('otp_send_at')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('balance')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('city');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('area');
            $table->string('pincode')->nullable();
            $table->string('location_link')->nullable();
            $table->string('location_text')->nullable();
            $table->unsignedBigInteger('pancard')->nullable();
            $table->foreign('pancard')->references('id')->on('images');
            $table->unsignedBigInteger('Aadhaar_card')->nullable();
            $table->foreign('Aadhaar_card')->references('id')->on('images');
            $table->unsignedBigInteger('vendor_image')->nullable();
            $table->foreign('vendor_image')->references('id')->on('images');
            // $table->json('turf_image')->nullable();
            $table->unsignedBigInteger('turf_image')->nullable();
            $table->foreign('turf_image')->references('id')->on('images');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->boolean('status')->comment('0 is Disapprove, 1 is Pending, 2 is Approve')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
