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
            $table->unsignedBigInteger('turf_id')->nullable();
            $table->foreign('turf_id')->references('id')->on('turf');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('min_order')->nullable();
            $table->float('discount');
            $table->float('discount_type');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('city');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->string('user_limit')->nullable();
            $table->string('transaction_limit')->nullable();
            $table->boolean('status')->comment('0 is Deactive, 1 is Active')->default(1);
             
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
