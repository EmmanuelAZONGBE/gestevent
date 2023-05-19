<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\users;


use Illuminate\Http\Request;



class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if (clientPermission() == false || auth()->user()->usertype == 1) {

        // $userId = auth()->user()->id; // Récupère l'ID de l'utilisateur connecté
        $clients = Client::select('clients.*', 'users.id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            // ->where('clients.user_id', $userId) // Restreint les clients à l'utilisateur connecté
            ->get();

        return view('admin.page.client.index', compact('clients'));
        } else {
            return abort (403);
        }

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (clientPermission() == true) {
            return view('admin.page.client.create');
        } else {
            return abort (403);
        }



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (clientPermission() == true || auth()->user()->usertype == 1) {
            $request->validate([
                'last_name' => 'required|string',
                'first_name' => 'required|string',
                'email' => 'required|string',
                'adresse' => 'required|string',
                'password' => 'required|string',
            ]);

            $user = users::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'picture' => $request->picture,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $client = Client::create([
                'user_id' => $user->id,
                // Autres colonnes du modèle Client
            ]);

            return redirect()->route('client.index')->with('success', 'Le client a été ajouté avec succès.');
        } else {
            return abort (403);
        }

    }
    /**
     * Display the specified resource.
     */
    public function show($client)
    {
        if (clientPermission() == true || auth()->user()->usertype == 1) {
            return view('admin.page.client.show', compact('client'));
        } else {
            return abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (clientPermission() == true || auth()->user()->usertype == 1) {
            return view('admin.page.client.edit', compact('client'));
        } else {
            return abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        if (clientPermission() == true || auth()->user()->usertype == 1) {
            $request->validate([
                'last_name' => 'required|string',
                'first_name' => 'required|string',
                'email' => 'required|string',
                'adresse' => 'required|string',
                'password' => 'required|string',
            ]);

            $client->user()->update([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            return redirect()->route('client.index')->with('success', 'Le client a été mis à jour avec succès.');
        } else {
            return abort(403);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {

        if (clientPermission() == true || auth()->user()->usertype == 1) {
            $id->delete();

            // Redirige vers la liste des clients
            return redirect()->route('client.index')->with('success', 'Client supprimé avec succès.');
        } else {
            return abort(403);
        };
    }
}
