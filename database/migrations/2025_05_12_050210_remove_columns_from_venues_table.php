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
        Schema::table('venues', function (Blueprint $table) {
            // $table->dropForeign(['vendor_id']);
            // $table->dropForeign(['turf_id']);

            $table->dropColumn(['pincode','vendor_id', 'turf_image','area','vendor_image','email','phone','turf_id','balance']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            // Recreate the columns that were dropped
            $table->string('pincode')->nullable();         // Recreate pincode
            $table->unsignedBigInteger('vendor_id')->nullable();  // Recreate vendor_id
            $table->string('turf_image')->nullable();      // Recreate turf_image
            $table->string('area')->nullable();            // Recreate area
            $table->string('vendor_image')->nullable();    // Recreate vendor_image
            $table->string('email')->nullable();           // Recreate email
            $table->string('phone')->nullable();           // Recreate phone
            $table->unsignedBigInteger('turf_id')->nullable();     // Recreate turf_id
            $table->decimal('balance', 8, 2)->nullable();  // Recreate balance
        });
    }
};
