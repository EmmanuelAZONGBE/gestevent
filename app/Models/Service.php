<?php

namespace App\Models;

use App\Models\Panier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_service',
        'descriptions',
        'prix',
    ];

    public function paniers()
    {
        return $this->hasMany(Panier::class);
    }
}
