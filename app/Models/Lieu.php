<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prix',
        'description',
        'etat',
        'photo',
        'adresse',
    ];

    protected $casts = [
        'etat' => 'string',
    ];



    public function evenement()

    {
        return $this ->hasMany(Evenement::class);
    }
}
