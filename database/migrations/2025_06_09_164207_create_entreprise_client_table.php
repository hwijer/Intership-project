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
        Schema::create('entreprise_client', function (Blueprint $table) {
            $table->id();
            $table->string('official_company_name');
            $table->string('ice', 100)->unique()->nullable();
            $table->string('rc', 100)->nullable();
            $table->string('idf', 100)->nullable();
            $table->string('cnss', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone', 50)->nullable();
            $table->enum('status', ['pending_validation', 'validated', 'rejected'])->default('pending_validation');
            $table->string('mobile_username')->unique();
            $table->string('mobile_password');
            $table->date('subscription_period_start')->nullable();
            $table->date('subscription_period_end')->nullable();
            $table->timestamp('created_by_comptable_at')->useCurrent();
            $table->timestamp('admin_reviewed_at')->nullable()->default(null);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprise_client');
    }
};
