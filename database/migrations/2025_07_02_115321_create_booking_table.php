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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->date('booking_on');
            $table->unsignedBigInteger('venues_id');
            $table->foreign('venues_id')->references('id')->on('venues');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->json('sports_ids');
            $table->json('amenities_ids');
            $table->unsignedBigInteger('coupons_id')->nullable();
            $table->foreign('coupons_id')->references('id')->on('coupons_and_offers');
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transaction');
            $table->unsignedBigInteger('turf_id');
            $table->foreign('turf_id')->references('id')->on('turf');
            $table->string('settlement')->nullable();
            $table->date('canceled_on')->nullable();
            $table->string('total_amount');
            $table->decimal('discount')->nullable();
            $table->float('tax');
            $table->decimal('paid_amount');
            $table->decimal('remaining_amount');
            $table->string('paid_status')->comment('part or full');
            $table->string('payment_type')->comment('netbanking or creditcard or cash or upi');
            $table->time('time_in');
            $table->time('time_out');
            // $table->unsignedBigInteger('spot')->nullable();
            // $table->foreign('spot')->references('id')->on('turf');
            // $table->time('timing')->nullable();
            $table->string('booked_by')->comment('vendor or online');
            $table->enum('status', ['0', '1', '2'])
                ->comment('0 is cancelled, 1 is done, 2 is pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
