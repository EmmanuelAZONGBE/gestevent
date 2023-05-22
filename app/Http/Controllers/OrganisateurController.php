<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\Organisateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrganisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->usertype == 1) {

            $organisateurs = User::join('organisateurs', 'organisateurs.user_id', '=', 'users.id')
                ->get();
            return view('admin.page.organisateur.index', compact('organisateurs'));
        } else {
            return view('admin.page.index');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (organisateurPermission() == false || auth()->user()->usertype == 0) {

            return view('admin.page.organisateur.create');
        } else {
            return abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if (organisateurPermission() == true ) {
            $users = User::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'adresse' => $request->adresse,
                'email' => $request->email,
                'photo' => $request->photo,
                'phone' => $request->phone,
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
        } else {
            return view('frontend.page.index');
        }
    }


    public function storeLogin(Request $request)
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
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            return view('admin.page.organisateur.show', compact('organisateur'));
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisateur $organisateur)
    {
        //
        if (organisateurPermission() == true ) {
            return view('admin.page.organisateur.edit', compact('organisateur'));
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisateur $organisateur)
    {
        if (organisateurPermission() == true ) {
            $request->validate([
                'last_name' => 'required|string',
                'first_name' => 'required|string',
                'email' => 'required|email|unique:organisateurs,user_email',
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
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {

           Organisateur::findOrFail($id)->delete();
            return redirect()->route('organisateur.index')->with('success', '  a été supprimé avec succès.');
        } else {
            return view('frontend.page.index');
        }
    }
}
