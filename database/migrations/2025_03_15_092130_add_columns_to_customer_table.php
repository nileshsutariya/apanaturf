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
            $table->unsignedBigInteger('role_id')->after('balance');
            $table->foreign('role_id')->references('id')->on('role_type');
            
            $table->unsignedBigInteger('profile_image')->after('balance');
            $table->foreign('profile_image')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer', function (Blueprint $table) {
            //
        });
    }
};
