<?php

namespace App\Http\Controllers;

use App\Models\Organisateur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if(!$user) return back();

        return view('admin.page.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        if($request->has('password')){
            $request->validate([
                'password' => 'required:8',
                'password_confirmation' => 'required:8|same:password'
            ]);

            $user->update([
                'password' => Hash::make($request->password),
            ]);

        }elseif ($request->has('compagnie')) {
            $request->validate([
                'disponible' => 'nullable|string',
                'compagnie' => 'required|string',
                'adresse_compagnie' => 'required|string',
                'type_evenement_organiser' => 'required|string',
                'experience' => 'required|integer',
            ]);

            Organisateur::firstWhere('user_id', $user->id)->update([
                'disponible' => $request->disponible,
                'compagnie' => $request->compagnie,
                'adresse_compagnie' => $request->adresse_compagnie,
                'type_evenement_organiser' => $request->type_evenement_organiser,
                'experience' => $request->experience,
            ]);
        }
        else{
            $request->validate([
                'last_name' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'photo'=>['nullable','image', 'mimes:png,jpg,jpeg', 'max:2048'],
                'email' => ['required', 'email', 'max:255', 'unique:users,id,'.$user->id],
                'phone' => ['required', 'string', 'max:40'],
            ]);

            $user->update([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'photo'=> $request->photo ? $this->uploads($request, 'photo') : $user->photo,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        }

       return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
