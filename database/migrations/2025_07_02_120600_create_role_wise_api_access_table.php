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
        Schema::create('role_wise_api_access', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group');
            $table->foreign('group')->references('id')->on('role_type');
            $table->unsignedBigInteger('api_list_id');
            $table->foreign('api_list_id')->references('id')->on('role_api_list');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_wise_api_access');
    }
};
