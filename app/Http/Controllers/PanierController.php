<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Panier;
use App\Models\Service;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (organisateurPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }

            $id = Auth::user()->id;
            $service = Service::all();
            $paniers = Panier::select(
                'paniers.*',
                'services.prix as prix',
                'services.nom_service as nom_service',
                'services.descriptions as descriptions'


            )
                ->join('services', 'services.id', '=', 'paniers.service_id')
                ->where('paniers.user_id', auth()->id())
                ->get();

            return view('admin.page.panier.index', compact('paniers', 'service'));
        } else {
            return view('admin.page.index');
        }
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
        if (organisateurPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $panier = new Panier();
            $panier->user_id = auth()->id();
            $panier->service_id = $request->service_id;
            // Autres attributs du panier à définir en fonction de vos besoins

            $panier->save();

            return redirect()->back();
        } else {
            return view('admin.page.index');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Panier $panier)
    {
        if (organisateurPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $lieu = Lieu::findOrFail($panier->service->lieu_id);

            return view('admin.page.panier.show', compact('panier', 'lieu', 'service'));
        } else {
            return view('admin.page.index');
        }
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
        if (organisateurPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $panier = Panier::find($id);
            if (!$panier) {
                return redirect()->back()->with('error', 'Le panier spécifié n\'existe pas.');
            }

            $panier->delete();

            return redirect()->back()->with('success', 'Supprimé avec succès.')->with('panier', $panier);
        } else {
            return view('admin.page.index');
        }
    }


    public function downloadPDF($id)
    {
        if (organisateurPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $panier = Panier::findOrFail($id);

            $pdf = PDF::loadView('admin.page.panier.pdf', compact('panier'))
                ->setPaper('a4', 'landscape')
                ->setWarnings(false);

            return $pdf->stream('panier.pdf');
        } else {
            return view('admin.page.index');
        }
    }
}
