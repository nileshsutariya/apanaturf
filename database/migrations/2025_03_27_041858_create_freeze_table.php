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
        Schema::create('freeze', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venues_id');
            $table->foreign('venues_id')->references('id')->on('venues');
            $table->unsignedBigInteger('turf_id');
            $table->foreign('turf_id')->references('id')->on('turf');
            $table->string('email');
            $table->time('timing');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freeze');
    }
};
