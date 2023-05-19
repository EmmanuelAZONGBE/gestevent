<?php

namespace App\Http\Controllers;

use App\Models\Organisateur;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;

class OrganisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $organisateurs = users::join('organisateurs', 'organisateurs.users_id', '=', 'userss.id')
            ->get();
        return view('admin.page.organisateur.index', compact('organisateurs'));
       

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.page.organisateur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $users = users::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'password' => $request->password,
            'disponible' => $request->disponible,
            'compagnie' => $request->compagnie,
            'adresse_compagnie' => $request->adresse_compagnie,
            'type_evenement_organiser' => $request->type_evenement_organiser,
            'experience' => $request->experience,
        ]);

        $users = Organisateur::create([
            'users_id' => $users->id,
            'disponible' => $request->disponible,
            'compagnie' => $request->compagnie,
            'adresse_compagnie' => $request->adresse_compagnie,
            'type_evenement_organiser' => $request->type_evenement_organiser,
            'experience' => $request->experience,
        ]);
        return redirect()->route('organisateur.index')->with('success', 'Organisateur créé avec succès');
    }


    public function storeLogin(Request $request)
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
        Organisateur::create([
            'user_id' => $user->id,
            'disponible' => $request->disponible,
            'compagnie' => $request->compagnie,
            'adresse_compagnie' => $request->adresse_compagnie,
            'type_evenement_organiser' => $request->type_evenement_organiser,
            'experience' => $request->experience,

        ]);

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisateur $organisateur)
    {
        return view('organisateur.show', compact('organisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisateur $organisateur)
    {
        //
        return view('admin.page.organisateur.edit', compact('organisateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisateur $organisateur)
    {

        $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email|unique:organisateurs,email,' . $organisateur->id,
            'adresse' => 'nullable|string',
            'disponible' => 'nullable|string',
            'password' => 'required|string',
            'compagnie' => 'required|string',
            'adresse_compagnie' => 'required|string',
            'type_evenement_organiser' => 'required|string',
            'experience' => 'required|integer',

        ]);

        $organisateur->users()->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'password' => $request->password,
            'disponible' => $request->disponible,
            'compagnie' => $request->compagnie,
            'adresse_compagnie' => $request->adresse_compagnie,
            'type_evenement_organiser' => $request->type_evenement_organiser,
            'experience' => $request->experience,

        ]);

        return redirect()->route('organisateur.index')->with('success', 'Organisateur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisateur $organisateur)
    {
        //
        $organisateur->delete();
        return redirect()->back()->with('success', '  a été supprimé avec succès.');
    }
}
