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
        Schema::create('turf_timing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('turf_id'); 
            $table->foreign('turf_id')->references('id')->on('turf');
            $table->time('from'); 
            $table->time('to'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turf_timing');
    }
};
