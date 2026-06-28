<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('client_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('date_commande');

            $table->decimal('montant_total',10,2)
                  ->default(0);

            $table->enum('etat',[
                'En attente',
                'Payée',
                'Livrée'
            ])->default('En attente');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};