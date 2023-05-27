<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Prestataire;

use App\Models\Organisateur;
use App\Models\User;
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
        'last_name' => $request->last_name,
        'first_name' =>$request->first_name,
        'photo'=>$this->uploads($request, 'photo'),
        'email' => $request->email,
        'phone' => $request->phone,
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
