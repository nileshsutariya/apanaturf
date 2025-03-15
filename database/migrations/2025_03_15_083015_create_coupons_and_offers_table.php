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
        Schema::create('coupons_and_offers', function (Blueprint $table) {
            $table->id();
            $table->string('coupons_name');
            $table->string('coupons_code');
            $table->unsignedBigInteger('turf_id');
            $table->foreign('turf_id')->references('id')->on('turf');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('min_order');
            $table->float('discount_in_per');
            $table->decimal('discount_in_ruppee');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons_and_offers');
    }
};
