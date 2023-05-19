<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Organisateur;
use App\Models\Prestataire;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'last_name' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'adresse' => ['required', 'string', 'max:255'],
        'password' => 'required:8',
        'password_confirmation' => 'required:8|same:password'
    ]);

    $user = users::create([
        'last_name' => $validatedData['last_name'],
        'first_name' => $validatedData['first_name'],
        'email' => $validatedData['email'],
        'adresse' => $validatedData['adresse'],
        'password' => Hash::make($validatedData['password']),
        'status' => $request['status'],
    ]);

    if ($request['status'] == 'client') {
        Client::create([
            'user_id' => $user->id
        ]);
    }

    if ($request['status'] == 'prestataire') {
        Prestataire::create([
            'user_id' => $user->id
        ]);
    }

    if ($request['status'] == 'organisateur') {
        Organisateur::create([
            'user_id' => $user->id
        ]);
        return redirect()->route('organisateurform');
    }
    else
    {
        return redirect()->route('login');

    }

}

}
