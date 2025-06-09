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
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable(); 
                $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('admin', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable(); 
                $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('comptable', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable(); 
                $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('entreprise_client', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id')->nullable(); 
                $table->foreign('role_id')->references('id')->on('roles');
        });
    }
};
