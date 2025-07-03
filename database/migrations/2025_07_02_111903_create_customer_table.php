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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->text('unique_id')->nullable();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->float('balance')->nullable();
            $table->unsignedBigInteger('otp')->nullable();
            $table->timestamp('otp_send_at')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->unsignedBigInteger('profile_image')->nullable();
            $table->foreign('profile_image')->references('id')->on('images');
            $table->unsignedBigInteger('location_history')->nullable();
            $table->foreign('location_history')->references('id')->on('location_history');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('city');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
