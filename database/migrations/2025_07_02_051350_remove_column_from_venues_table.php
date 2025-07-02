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
            $table->dropColumn(['status']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            $table->boolean('status')->default(1)->comment('0 is Disapprove, 1 is Pending, 2 is Approve')->after('balance');
        });
    }    
};
