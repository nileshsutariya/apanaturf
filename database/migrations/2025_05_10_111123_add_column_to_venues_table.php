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
            $table->string('password')->after('phone')->nullable();            
            $table->unsignedBigInteger('otp')->after('password')->nullable();
            $table->timestamp('otp_send_at')->after('otp')->nullable();
            $table->timestamp('otp_verified_at')->after('otp_send_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            //
        });
    }
};
