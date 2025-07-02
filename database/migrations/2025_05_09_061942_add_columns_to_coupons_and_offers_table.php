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
        Schema::table('coupons_and_offers', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->after(column: 'type')->nullable();
            $table->foreign('city_id')->references('id')->on('city');
            $table->integer('transaction_limit')->after('created_by');
            $table->boolean('status')->default(1)->after('transaction_limit');  
            $table->string('user_limit')->after('created_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupons_and_offers', function (Blueprint $table) {
            $table->dropForeign(['city_id']);  // Drops the foreign key constraint on city_id
            $table->dropColumn('city_id');     // Drops the city_id column
            
            $table->dropColumn('transaction_limit'); // Drops the transaction_limit column
            $table->dropColumn('status');           // Drops the status column
            $table->dropColumn('user_limit');      // Drops the user_limit column
        });
    }    
};
