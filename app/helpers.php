<?php

use App\Models\Client;
use App\Models\Organisateur;
use App\Models\Prestataire;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Contracts\Permission;


function clientPermission()
{
    $client =Client::where('user_id',Auth::id())->first();
    if($client != null){
        return true;
    }
    else
    {
        return false;
    }
}
function prestatairePermission()
{
    $prestataire =Prestataire::where('user_id',Auth::id())->first();
    if($prestataire != null){
        return true;
    }
    else
    {
        return false;
    }
}

function organisateurPermission()
{
    $organisateur = Organisateur::where('user_id',Auth::id())->first();
    if($organisateur != null){
        return true;
    }
    else
    {
        return false;
    }
}


