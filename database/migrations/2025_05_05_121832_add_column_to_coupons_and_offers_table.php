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
        // Schema::table('coupons_and_offers', function (Blueprint $table) {
        //     $table->integer('transaction_limit')->after('created_by');
        //     $table->boolean('status')->default(1)->after('transaction_limit');  
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons_and_offers', function (Blueprint $table) {
            //
        });
    }
};
