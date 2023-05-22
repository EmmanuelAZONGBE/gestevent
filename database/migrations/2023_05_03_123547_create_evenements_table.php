<?php

use App\Models\Client;
use App\Models\Lieu;
use App\Models\Organisateur;
use App\Models\TypeEvenement;
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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->time('heure');
            $table->date('date');
            $table->integer('nombre_participant');
            $table->enum('etat',['accepté','rejeté','en attente'])->default('en attente');

             // Clé étrangère pour la table organisateur
             $table->foreignIdFor(Organisateur::class)->constrained();
              // Clé étrangère pour la table TypeEvenement
              $table->foreignIdFor(TypeEvenement::class)->constrained();

              // Clé étrangère pour la table lieu
             $table->foreignIdFor(Lieu::class)->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
