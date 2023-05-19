<?php

use App\Models\Prestataire;
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
        Schema::create('_prestataire__service', function (Blueprint $table) {
            $table->id();
            $table->integer('prix')->nullable();
            $table->foreignIdFor(Prestataire::class)->constrained();
             $table->foreignIdFor(Service::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_prestataire__service');
    }
};
