<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
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
        if (clientPermission() == true) {
            //récupère tous les évènements a partire de la base de donnée et les passe à la vue
            $evenement = Evenement::all();
            return view('admin.page.evenement.index', ['evenement' => $evenement]);
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

            $organisateurs = users::join('organisateurs', 'organisateurs.user_id', '=', 'users.id')
                ->get();
            $typeevenements = TypeEvenement::all();
            $lieux = Lieu::all();

            return view('admin.page.evenement.create', [
                'organisateurs' => $organisateurs,
                'typeevenements' => $typeevenements,
                'lieux' => $lieux,
            ]);
        } else {
            return view('admin.page.index');
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
    public function show($id)
    {
        //
        if (clientPermission() == true) {
            $evenement = Evenement::findOrFail($id);
            return view('evenement.show', ['evenement' => $evenement]);
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (clientPermission() == true) {
            $evenement = Evenement::findOrFail($id);
            return view('admin.page.evenement.edit', ['evenement' => $evenement]);
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
                'client_id' => 'required',
            ]);

            $evenement = Evenement::findOrFail($id);

            $evenement->nom = $request->nom;
            $evenement->heure = $request->heure;
            $evenement->date = $request->date;
            $evenement->nombre_participant = $request->nombre_participant;
            $evenement->facture = $request->facture;
            $evenement->organisateur_id = $request->organisateur_id;
            $evenement->type_evenement_id = $request->type_evenement_id;
            $evenement->lieu_id = $request->lieu_id;
            $evenement->client_id = $request->client_id;

            $evenement->save();

            return redirect()->route('admin.page.evenement.index')->with('success', 'Événement a été mis à jour');
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        if (clientPermission() == true) {
            Evenement::findOrFail($id)->delete();
            return redirect()->route('evenement.index')->with('success', 'L\'événement a été créé');
        } else {
            return view('admin.page.index');
        }
    }
    // public function enCours()
    // {
    //     //récupère tous les évènement ayant une date et une heure
    //     $evenement = Evenement::where('date', '=', date('Y-m-d'))->where('heure', '<=', date('H:i'))->get();
    //     return view('admin.page.evenement.index', ['evenement' => $evenement]);
    // }

    // public function enAttente()
    // {
    //     //récupère tous les évènement ayant une date et une heure
    //     $evenement = Evenement::where('date', '>', date('Y-m-d'))->orWhere(function ($query) {
    //         $query->where('date', '=', date('Y-m-d'))->where('heure', '>', date('H:i'));
    //     })->get();
    //     return view('admin.page.evenement.index', ['evenement' => $evenement]);
    // }
}
