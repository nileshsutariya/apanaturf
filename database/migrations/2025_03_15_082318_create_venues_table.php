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
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('users');
            $table->unsignedBigInteger('turf_id');
            $table->foreign('turf_id')->references('id')->on('turf');
            $table->string('phone');
            $table->text('balance');
            $table->string('city');
            $table->string('area');
            $table->string('pincode');
            $table->string('location_link');
            $table->string('vendor_image');
            $table->json('turf_image');
            
            $table->boolean('status')->comment('0 is Deactive, 1 is Active')->default(1);
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
