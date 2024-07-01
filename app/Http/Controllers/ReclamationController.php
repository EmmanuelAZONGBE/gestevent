<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    public function index()
    {
        if (clientPermission() == true || auth()->user()->usertype == 1 || organisateurPermission() == true || prestatairePermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $reclamations = Reclamation::all();
            return view('admin.page.reclamation.index', compact('reclamations'));
        } else {
            return view('frontend.page.index');
        }
    }

    public function create()
    {
        if (clientPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            return view('admin.page.reclamation.create');
        } else {
            return view('frontend.page.index');
        }
    }

    public function store(Request $request)
    {
        if (clientPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $request->validate([
                'date' => 'required|string',
                'message' => 'nullable|string',
                'description' => 'nullable|string',
            ]);

            Reclamation::create($request->all());

            return redirect()->route('reclamation.index')->with('success', 'Reclamation created successfully.');
        } else {
            return view('frontend.page.index');
        }
    }

    public function edit($id)
    {
        if (clientPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $reclamation = Reclamation::find($id);
            return view('admin.page.reclamation.edit', compact('reclamation'));
        } else {
            return view('frontend.page.index');
        }
    }

    public function update(Request $request, $id)
    {
        if (clientPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $reclamation = Reclamation::find($id);
            $request->validate([
                'date' => 'required|string',
                'message' => 'nullable|string',
                'description' => 'nullable|string',
            ]);

            $reclamation->update($request->all());

            return redirect()->route('reclamation.index')->with('success', 'Reclamation updated successfully.');
        } else {
            return view('frontend.page.index');
        }
    }

    public function destroy($id)
    {
        if (clientPermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $reclamation = Reclamation::find($id);
            $reclamation->delete();

            return redirect()->route('reclamation.index')->with('success', 'Reclamation supprimé avec succè.');
        } else {
            return view('frontend.page.index');
        }
    }
    // public function accepter($id)
    // {
    //     if (organisateurPermission() == true || auth()->user()->usertype == 1) {
    //         $reclamation = Reclamation::find($id);
    //         // Mettre à jour le statut "état" de l'événement pour le marquer comme accepté
    //         $reclamation->etat = "Accepté";
    //         $reclamation->save();

    //         return back()->with('success', 'Publication acceptée');
    //     } else {
    //         return view('admin.page.index');
    //     }
    // }

    // public function rejeter($id)
    // {
    //     if (organisateurPermission() == true ||auth()->user()->usertype == 1) {
    //         $reclamation = Reclamation::find($id);
    //         // Mettre à jour le statut "état" de l'événement pour le marquer comme accepté
    //         $reclamation->etat = "Accepté";
    //         $reclamation->save();

    //         return back()->with('success', 'Publication rejetée');
    //     } else {
    //         return view('admin.page.index');
    //     }
    // }
}
