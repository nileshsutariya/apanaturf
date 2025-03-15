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
        Schema::create('financial_year', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('ending_date');
            $table->string('financial_year');
            $table->string('year');
            $table->boolean('is_current')->comment('0 is Deactive, 1 is Active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_year');
    }
};
