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
            // Drop the existing column
            $table->dropColumn('turf_image');
        });

        Schema::table('venues', function (Blueprint $table) {
            // Recreate as JSON
            $table->json('turf_image')->nullable()->after('vendor_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->dropColumn('turf_image');
        });

        Schema::table('venues', function (Blueprint $table) {
            $table->longText('turf_image')->nullable()->after('vendor_image');
        });
    }
};
