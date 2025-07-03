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
        Schema::create('turf', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('sports_ids');
            $table->json('amenities_ids');
            $table->string('location_link');
            $table->string('location_text');
            $table->unsignedBigInteger('feature_image')->nullable();
            $table->json('turf_image')->nullable();
            $table->float('height')->nullable();
            $table->float('width');
            $table->float('length');
            $table->json('sessions')->nullable();
            $table->decimal('booking_price');  
            $table->string('unit')->nullable();  
            $table->text('description')->nullable();  
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->boolean('status')->comment('0 is Disapprove, 1 is Pending, 2 is Approve')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turf');
    }
};
