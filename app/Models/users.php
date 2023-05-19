<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'adresse',
        'password',
    ];

public function client()

{
    return $this ->belongsTo(Client::class);
}

public function organisateur()

{
    return $this ->belongsTo(Organisateur::class);
}

public function prestataire()

{
    return $this ->belongsTo(Prestataire::class);
}

}
