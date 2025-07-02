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
            $table->string('password')->after('id');
            $table->string('owner_name')->after('id');
            $table->string('owner_email')->after('id');
            $table->string('owner_phone')->after('id');
            $table->string('vendor_id')->after('id');
            $table->unsignedBigInteger('pancard')->after('location_text')->nullable();
            $table->unsignedBigInteger('Aadhaar_card')->after('pancard')->nullable();
            $table->unsignedBigInteger('vendor_image')->after('Aadhaar_card')->nullable();
            $table->unsignedBigInteger('area_id')->after('city_id')->nullable();
            $table->foreign('pancard')->references('id')->on('images');
            $table->foreign('Aadhaar_card')->references('id')->on('images');
            $table->foreign('vendor_image')->references('id')->on('images');
            $table->foreign('area_id')->references('id')->on('area_code');
            $table->timestamp('password_update')->after('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            // Drop foreign key constraints
            $table->dropForeign(['pancard']);         // Drop foreign key for pancard
            $table->dropForeign(['Aadhaar_card']);    // Drop foreign key for Aadhaar_card
            $table->dropForeign(['vendor_image']);    // Drop foreign key for vendor_image
            $table->dropForeign(['area_id']);         // Drop foreign key for area_id
    
            // Drop the columns that were added
            $table->dropColumn(['password', 'owner_name', 'owner_email', 'owner_phone', 'vendor_id', 
                                'pancard', 'Aadhaar_card', 'vendor_image', 'area_id', 'password_update']);
        });
    }    
};
