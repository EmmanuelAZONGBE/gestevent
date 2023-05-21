<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Organisateur;
use App\Models\Prestataire;
use App\Models\User;
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
        'photo'=>['image', 'mimes:png,jpg,jpeg', 'max:2048'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'string', 'max:40'],
        'password' => 'required:8',
        'password_confirmation' => 'required:8|same:password'
    ]);

    $user = User::create([
        'nom' => $request->last_name,
        'prenom' =>$request->first_name,
        'photo'=>$this->uploads($request, 'photo'),
        'email' => $request->email,
        'telephone' => $request->phone,
        'password' => Hash::make($request->password),
        'status' => $request->status
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
