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
            $table->dropForeign(['created_by']); 
            $table->unsignedBigInteger('created_by')->after('city_id');
            $table->string('created_by_type')->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons_and_offers', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
};
