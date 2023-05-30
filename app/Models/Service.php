<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
