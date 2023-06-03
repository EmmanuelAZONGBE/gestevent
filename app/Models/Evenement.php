<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Lieu;
use App\Models\Organisateur;
use App\Models\TypeEvenement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'date',
        'heure',
        'nombre_participant',
        'facture',
        'statut',
        'organisateur_id',
        'type_evenement_id',
        'lieu_id'
    ];

    // indique que chaque évènement appartient a un seul organisateur
    public function organisateur()
    {
        return $this->belongsTo(Organisateur::class);
    }
 // indique que chaque évènement appartient a un seul type evenement
    public function type_evenement()
    {
        return $this->belongsTo(TypeEvenement::class);
    }
     // indique que chaque évènement appartient a un seul lieu

    public function lieu()
    {
        return $this->belongsTo(Lieu::class);
    }
 // indique que chaque évènement appartient a un seul client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
