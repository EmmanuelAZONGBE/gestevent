<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Panier;

use App\Models\Evenement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $evenement = Evenement::all();
        $lieu = Lieu::all();
        $panier = Panier::where('user_id', '=', $id)->get();
        $paniers = Panier::select(
            'paniers.*',
            'services.prix as prix'
        )
            ->join('services', 'services.id', '=', 'paniers.service_id')
            ->where('paniers.user_id', auth()->id())
            ->get();

        return view('admin.page.panier.index', compact('paniers','lieu','evenement'));
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
        $panier = new Panier();
        $panier->user_id = auth()->id();
        $panier->service_id = $request->service_id;
        // Autres attributs du panier à définir en fonction de vos besoins

        $panier->save();

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Panier $panier)
    {
        $lieu = Lieu::findOrFail($panier->evenement->lieu_id);

        return view('admin.page.panier.show', compact('panier', 'lieu'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $panier = Panier::find($id);
        if (!$panier) {
            return redirect()->back()->with('error', 'Le panier spécifié n\'existe pas.');
        }

        $panier->delete();

        return redirect()->back()->with('success', 'Supprimé avec succès.')->with('panier', $panier);
    }



    public function downloadPDF($id)
    {
        $evenement = Evenement::all();
        $lieu = Lieu::all();
        $panier = Panier::findOrFail($id);

        return  Pdf::loadView('admin.page.panier.pdf', [
            'evenement' => $evenement,
            'panier' => $panier,
            'lieu' => $lieu
        ])
            ->setPaper('a4', 'landscape')
            ->setWarnings(false)
            ->save(public_path("storage/documents/panier.pdf"))
            ->stream();
    }
}
