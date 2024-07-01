<?php

namespace App\Models;

use App\Models\Lieu;
use App\Models\Service;
use App\Models\Evenement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panier extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',

    ];

    protected $casts = [
        'prix' => 'integer'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}

