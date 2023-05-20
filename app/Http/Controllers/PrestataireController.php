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
        if (prestatairePermission() == false || auth()->user()->usertype == 1) {
            $prestataires = users::join('prestataires', 'prestataires.user_id', '=', 'users.id')
                ->get();

            return view('admin.page.prestataire.index', compact('prestataires'));
        } else {
            abort(401);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (prestatairePermission() == false || auth()->user()->usertype == 0) {
            return view('admin.page.prestataire.create');
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (prestatairePermission() == true || auth()->user()->usertype == 1) {

            $users = users::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'picture' => $request->picture,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'societer' => $request->societer,
                'password' => $request->password,
            ]);

            $users = Prestataire::create([
                'users_id' => $users->id,
                'societer' => $request->societer,
            ]);

            return redirect()->route('prestataire.index')->with('success', 'Prestataire créé avec succès');
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestataire $prestataire)
    {
        if (prestatairePermission() == true || auth()->user()->usertype == 1) {
            return view('admin.page.prestataire.show', compact('prestataire'));
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestataire $prestataire)
    {
        if (prestatairePermission() == true || auth()->user()->usertype == 1) {
            return view('admin.page.prestataire.edit', compact('prestataire'));
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestataire $prestataire)
    {
        if (prestatairePermission() == true || auth()->user()->usertype == 1) {
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
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (prestatairePermission() == true || auth()->user()->usertype == 1) {
            Prestataire::findOrFail($id)->delete();
            return redirect()->route('prestataire.index')->with('success', 'Prestataire supprimé avec succès');
        } else {
            return abort(401);
        }
    }
}
