<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use App\Models\users;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestataires = users::join('prestataires', 'prestataires.users_id', '=', 'users.id')
            ->get();
        return view('admin.page.prestataire.index', compact('prestataires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.prestataire.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = users::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'picture' => $request->picture,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'societer'=>$request->societer,
            'password' => $request->password,
        ]);

        $users= Prestataire::create([
            'users_id' => $users->id,
            'societer' => $request->societer,
        ]);

        return redirect()->route('prestataire.index')->with('success', 'Prestataire créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestataire $prestataire)
    {
        return view('admin.page.prestataire.show', compact('prestataire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestataire $prestataire)
    {
        return view('admin.page.prestataire.edit', compact('prestataire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestataire $prestataire)
    {
        $request->validate([
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'picture' => 'nullable|file',
            'email' => 'required',
            'societer' => 'required',
            'adresse' => 'nullable|string',
            'password' => 'required|string',
        ]);

        $prestataire->users()->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'picture' => $request->picture,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'societer' => $request->societer,
            'password' => $request->password,
        ]);

        return redirect()->route('prestataire.index')->with('success', 'Prestataire mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestataire $prestataire)
    {
        $prestataire->delete();
        return redirect()->route('prestataire.index')->with('success', 'Prestataire supprimé avec succès');
    }
}
