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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->after('password');
            $table->foreign('role_id')->references('id')->on('role_type');
            
            $table->unsignedBigInteger('profile_image')->after('role_id')->nullable();
            $table->foreign('profile_image')->references('id')->on('images');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);       // Drop the foreign key on role_id
            $table->dropColumn('role_id');          // Drop the role_id column
            
            $table->dropForeign(['profile_image']); // Drop the foreign key on profile_image
            $table->dropColumn('profile_image');    // Drop the profile_image column
        });
    }    
};
