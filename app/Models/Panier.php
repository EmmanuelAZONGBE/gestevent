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
        'descriptions',
        'prix'
    ];

    protected $casts = [
        'prix' => 'integer'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

