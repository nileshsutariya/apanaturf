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
        Schema::table('coupons_and_offers', function (Blueprint $table) {
            $table->renameColumn('discount_in_per', 'discount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons_and_offers', function (Blueprint $table) {
            $table->renameColumn('discount', 'discount_in_per');
        });
    }
};
