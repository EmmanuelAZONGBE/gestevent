<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;
    protected $fillable = [
            'status',
             'nom',
        'description',
        'picture',
        'adresse'
    ];



    public function evenement()

    {
        return $this ->hasMany(Evenement::class);
    }
}
