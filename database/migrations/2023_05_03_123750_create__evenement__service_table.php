<?php

use App\Models\Evenement;
use App\Models\Reclamation;
use App\Models\Service;
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
        Schema::create('_evenement__service', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite')->nullable();
            $table->integer('note')->nullable();
            $table->integer('prix')->nullable();
            

                $table->foreignIdFor(Evenement::class)->constrained();
                $table->foreignIdFor(Service::class)->constrained();
                $table->foreignIdFor(Reclamation::class)->constrained();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_evenement__service');
    }
};
