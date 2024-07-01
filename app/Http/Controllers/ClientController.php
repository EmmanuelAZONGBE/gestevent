<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;


use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (clientPermission() == false || auth()->user()->usertype == 1) {
            $clients = Client::select('clients.*', 'users.id')
                ->join('users', 'clients.user_id', '=', 'users.id')
                // ->where('clients.user_id', $userId) // Restreint les clients à l'utilisateur connecté
                ->paginate(7); // Ajoutez paginate() avec le nombre d'éléments que vous souhaitez afficher par page

            return view('admin.page.client.index', compact('clients'));
        } else {
            return view('admin.page.index');
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
            return view('admin.page.index');
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
                'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
                'email' => 'required|string',
                'phone' => 'required', 'string', 'max:40',
                'adresse' => 'required|string',
            ]);

            $user = User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'photo' => $request->photo,
                'phone' => $request->phone,
                'adresse' => $request->adresse,
                'email' => $request->email,
            ]);

            $client = Client::create([
                'user_id' => $user->id,
                // Autres colonnes du modèle Client
            ]);

            return redirect()->route('client.index')->with('success', 'Le client a été ajouté avec succès.');
        } else {
            return view('admin.page.index');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Client $clients)
    {

        if (clientPermission() == false || auth()->user()->usertype == 1) {
            $clients = Client::select('clients.*', 'users.id')
                ->join('users', 'clients.user_id', '=', 'users.id');
            return view('admin.page.client.show', compact('clients'));
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (clientPermission() == true || auth()->user()->usertype == 1) {
            $client = Client::find($id);
            return view('admin.page.client.edit', compact('client'));
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        if (clientPermission() == true || auth()->user()->usertype == 1) {
            $client = Client::find($client);
            $request->validate([
                'last_name' => 'required|string',
                'first_name' => 'required|string',
                'email' => 'required|string',
                'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
                'adresse' => 'required|string',
                'phone' => 'required', 'string', 'max:40',

            ]);

            $client->user()->update([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'phone' => $request->phone,
                'photo' => $request->photo,

            ]);

            return redirect()->route('client.index')->with('success', 'Le client a été mis à jour avec succès.');
        } else {
            return view('admin.page.index');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        if (clientPermission() == true) {

            $client = Client::find($id);
            $client->delete();

            // Redirige vers la liste des clients
            return redirect()->route('client.index')->with('success', 'Client supprimé avec succès.');
        } else {
            return view('admin.page.index');
        };
    }
}
