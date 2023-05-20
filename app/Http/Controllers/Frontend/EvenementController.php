<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lieu;
use App\Models\TypeEvenement;
use App\Models\users;
use Illuminate\Http\Request;

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
        if (clientPermission() == true || auth()->user()->usertype == 1) {

            $organisateurs = users::join('organisateurs', 'organisateurs.user_id', '=', 'users.id')
                ->get();
            $typeevenements = TypeEvenement::all();
            $lieux = Lieu::all();

            return view('frontend.page.evenements.create', [
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
        if (clientPermission() == true) {
            $request->validate([
                'nom' => 'required',
                'heure' => 'required',
                'date' => 'required',
                'nombre_participant' => 'required',
                'facture' => 'required',
                'organisateur_id' => 'required',
                'type_evenement_id' => 'required',
                'lieu_id' => 'required',

            ]);

            $evenement = new Evenement;

            $evenement->nom = $request->nom;
            $evenement->heure = $request->heure;
            $evenement->date = $request->date;
            $evenement->nombre_participant = $request->nombre_participant;
            $evenement->facture = $request->facture;
            $evenement->organisateur_id = $request->organisateur_id;
            $evenement->type_evenement_id = $request->type_evenement_id;
            $evenement->lieu_id = $request->lieu_id;


            $evenement->save();

            return redirect()->route('evenement.index')->with('success', 'L\'événement a été créé');
        } else {
            return view('admin.page.index');
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
