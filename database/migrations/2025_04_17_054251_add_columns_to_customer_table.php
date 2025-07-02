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
        if (!Schema::hasTable('customer')) {

            Schema::table('customer', function (Blueprint $table) {
                $table->unsignedBigInteger('location_history')->after('otp_verified_at')->nullable();
                $table->foreign('location_history')->references('id')->on('location_history');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropForeign(['location_history']);  // Drop the foreign key constraint
            $table->dropColumn('location_history');     // Drop the location_history column
        });
    }    
};
