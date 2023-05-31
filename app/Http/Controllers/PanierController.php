<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Panier;

use App\Models\Evenement;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use App\Models\TypeEvenement;
use Barryvdh\DomPDF\PDF as PDF;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=Auth::user()->id;
        $panier=Panier::where('user_id','=',$id)->get();
        $paniers = Panier::select(
            'paniers.*',
            'services.prix as prix'
        )
            ->join('services', 'services.id', '=', 'paniers.service_id')
            ->where('paniers.user_id', auth()->id())
            ->get();

        return view('admin.page.panier.index', compact('paniers'));
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
        //
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
        $panier = Panier::select(
            'paniers.*',
            'services.prix as prix'
        )
            ->join('services', 'services.id', '=', 'paniers.service_id')
            ->where('paniers.user_id', auth()->id())
            ->get();
        $panier->delete();

        return redirect()->back('admin.page.panier.index')->with('success', 'Supprimer avec succes');
    }

    public function downloadPDF($id)
    {
        
        $evenement = Evenement::all();
        $lieux = Lieu::all();
        $paniers = Panier::select(
            'paniers.*',
            'services.prix as prix'
        )
            ->join('services', 'services.id', '=', 'paniers.service_id')
            ->where('paniers.user_id', auth()->id())
            ->get();

        $pdf = PDF::loadView('admin.page.panier.pdf', [
            'evenement' => $evenement, 'paniers' => $paniers,
            'lieux' => $lieux
        ]);

        return $pdf->download('paniers.pdf');
    }
    
    public function sendMessage($id)
    {
        dd($id);
        $evenement = Evenement::all();
        $lieux = Lieu::all();
        $paniers = Panier::select(
            'paniers.*',
            'services.prix as prix'
        )
            ->join('services', 'services.id', '=', 'paniers.service_id')
            ->where('paniers.user_id', auth()->id())
            ->get();

        return view('admin.page.panier.sendMessage', [
            'evenement' => $evenement, 'paniers' => $paniers,
            'lieux' => $lieux
        ]);
    }
}