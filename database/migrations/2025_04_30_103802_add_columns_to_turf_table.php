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
        if (!Schema::hasTable('turf')) {

            Schema::table('turf', function (Blueprint $table) {
                $table->string('unit')->after('booking_price')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('turf', function (Blueprint $table) {
            $table->dropColumn('unit'); // Drops the unit column
        });
    }    
};
