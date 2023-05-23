<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use App\Models\User;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( auth()->user()->usertype == 1 || organisateurPermission() == true) {
            $prestataires = User::join('prestataires', 'prestataires.user_id', '=', 'users.id')
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
        if (prestatairePermission() == false || auth()->user()->usertype == 0 || organisateurPermission() == false) {
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
        if (prestatairePermission() == true) {

            $users = User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'picture' => $request->picture,
                'adresse' => $request->adresse,
                'photo' => $request->photo,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            $users = Prestataire::create([
                'users_id' => $users->id,
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
        if (prestatairePermission() == false ) {
            return view('admin.page.prestataire.show', compact('prestataire'));
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (prestatairePermission() == true ) {
            $prestataire=Prestataire::find($id);
            return view('admin.page.prestataire.edit', compact('prestataire'));
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (prestatairePermission() == true ) {
            $prestataire=Prestataire::find($id);
            $request->validate([
                'last_name' => 'required|string',
                'first_name' => 'required|string',
                'photo' => 'nullable|file',
                'email' => 'required',
                'adresse' => 'nullable|string',

            ]);

            $prestataire->users()->update([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'photo' => $request->photo,
                'adresse' => $request->adresse,
                'email' => $request->email,
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
            $prestataire=Prestataire::find($id);
            $prestataire->delete();
            return redirect()->route('prestataire.index')->with('success', 'Prestataire supprimé avec succès');
        } else {
            return abort(401);
        }
    }
}
