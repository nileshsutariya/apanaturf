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
        Schema::create('turf', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('sports_ids');
            $table->json('amenities_ids');
            $table->string('location_link');
            $table->string('location_text');
            $table->unsignedBigInteger('turf_image');
            $table->foreign('turf_image')->references('id')->on('images');
            $table->float('height')->nullable();
            $table->float('width');
            $table->float('length');
            $table->json('sessions');
            $table->decimal('booking_price');  
            $table->text('description');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turf');
    }
};
