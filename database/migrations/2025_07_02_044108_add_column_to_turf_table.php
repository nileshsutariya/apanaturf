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
        Schema::table('turf', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->after('turf_image')->nullable();
            $table->unsignedBigInteger('vendor_id')->after('created_by')->nullable();
            $table->foreign('vendor_id')->references('id')->on('venues');
            $table->boolean('status')->comment('0 is Disapprove, 1 is Pending, 2 is Approve')->default(1)->after('vendor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('turf', function (Blueprint $table) {
            //
        });
    }
};
