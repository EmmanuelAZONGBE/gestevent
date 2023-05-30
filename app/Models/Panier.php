<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'service_id',
        'nom_service',
        'quantiter',
        'descriptions',
        'prix'
    ];

    protected $casts = [
        'quantiter' => 'integer',
        'prix' => 'integer'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

