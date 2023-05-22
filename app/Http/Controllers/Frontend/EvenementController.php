<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Lieu;
use App\Models\users;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\TypeEvenement;
use App\Http\Controllers\Controller;
use App\Models\User;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (clientPermission() == true ) {

            $organisateurs = User::join('organisateurs', 'organisateurs.user_id', '=', 'users.id')
                ->get();
            $typeevenements = TypeEvenement::all();
            $lieux = Lieu::all();
            // dd($lieux);
            return view('frontend.page.evenements.create', 
            [
                'organisateurs' => $organisateurs,
                'typeevenements' => $typeevenements,
                'lieux' => $lieux,
            ]);
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (clientPermission() == true ) {
            $request->validate([
                'nom' => 'required',
                'heure' => 'required',
                'date' => 'required',
                'nombre_participant' => 'required',
                'organisateur_id' => 'required',
                'type_evenement_id' => 'required',
                'lieu_id' => 'required',

            ]);

            $evenement = new Evenement;

            $evenement->nom = $request->nom;
            $evenement->heure = $request->heure;
            $evenement->date = $request->date;
            $evenement->nombre_participant = $request->nombre_participant;
            $evenement->organisateur_id = $request->organisateur_id;
            $evenement->type_evenement_id = $request->type_evenement_id;
            $evenement->lieu_id = $request->lieu_id;


            $evenement->save();

            return redirect()->route('frontend.page.index')->with('success', 'L\'événement a été créé');
        } else {
            return view('frontend.page.index');
        }
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
