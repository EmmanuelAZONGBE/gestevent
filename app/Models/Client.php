<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'user_id',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function evenemennts()
    {
        return $this->hasMany(Evenement::class);
    }

}
