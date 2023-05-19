<?php

namespace App\Models;

use App\Models\users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(users::class);
    }
}
