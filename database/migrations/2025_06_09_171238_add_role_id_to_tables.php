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
        //   Schema::table('users', function (Blueprint $table) {
        //         $table->unsignedBigInteger('role_id')->nullable(); 
        //         $table->foreign('role_id')->references('id')->on('role');
        // });

        Schema::table('admin', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable(); 
                $table->foreign('role_id')->references('id')->on('role');
        });

        Schema::table('comptable', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable(); 
                $table->foreign('role_id')->references('id')->on('role');
        });

        Schema::table('entreprise_client', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable(); 
                $table->foreign('role_id')->references('id')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            
        });
    }
};
