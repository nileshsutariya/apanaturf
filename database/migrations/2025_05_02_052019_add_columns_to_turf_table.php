<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('turf')) {

            Schema::table('turf', function (Blueprint $table) {
                $table->unsignedBigInteger('feature_image')->after('location_text')->nullable();
                $table->foreign('feature_image')->references('id')->on('images');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('turf', function (Blueprint $table) {
            $table->dropForeign(['feature_image']);  // Drops the foreign key constraint
            $table->dropColumn('feature_image');     // Drops the feature_image column
        });
    }    
};
