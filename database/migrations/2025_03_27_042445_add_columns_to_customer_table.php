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
        Schema::table('customer', function (Blueprint $table) {
            
            $table->unsignedBigInteger('profile_image')->after('balance')->nullable();
            $table->foreign('profile_image')->references('id')->on('images');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropForeign(['profile_image']); // Drops the foreign key
            $table->dropColumn('profile_image');   // Drops the profile_image column
        });
    }

};
