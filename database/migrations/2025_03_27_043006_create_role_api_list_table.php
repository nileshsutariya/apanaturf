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
        Schema::create('role_api_list', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('group');
            $table->foreign('group')->references('id')->on('role_type');
            $table->string('api_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_api_list');
    }
};
