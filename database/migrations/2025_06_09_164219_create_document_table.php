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
        Schema::create('document', function (Blueprint $table) {
            $table->id(); $table->unsignedBigInteger('entreprise_cliente_id');
            $table->enum('document_category', ['Achat', 'Vente', 'Justificatif Paiement', 'Bon Livraison', 'Autre']);
            $table->date('document_date');
            $table->string('document_identifier')->nullable();
            $table->text('file_reference');
            $table->string('mime_type', 100)->nullable();
            $table->enum('status', ['Nouveau', 'En cours', 'Traité', 'Rejeté'])->default('Nouveau');
            $table->timestamp('uploaded_by_client_at')->useCurrent();

            // Foreign key constraint
            $table->foreign('entreprise_cliente_id')->references('id')->on('entreprise_client')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
