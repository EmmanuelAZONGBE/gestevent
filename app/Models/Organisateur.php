<?php

namespace App\Models;

use App\Models\users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'disponible',
        'compagnie',
        'adresse_compagnie',
        'type_evenement_organiser',
        'experience',

    ];

    public function user()
    {
        return $this->belongsTo(users::class);
    }
}
