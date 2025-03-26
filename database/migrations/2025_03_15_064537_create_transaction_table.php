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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transfer_by_customer_id');
            $table->foreign('transfer_by_customer_id')->references('id')->on('customer');
            $table->text('transaction_id');
            $table->date('date');
            $table->text('amount');
            $table->string('transaction_type')->comment('withdraw or deposit');
            $table->string('method');
            $table->enum('status', ['0', '1', '2'])
                ->comment('0 is cancelled, 1 is pending, 2 is successful')
                ->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
