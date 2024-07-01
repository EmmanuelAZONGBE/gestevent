<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeEvenement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TypeEvenementController extends Controller
{
    public function index()
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $typeevenements = TypeEvenement::all();
            return view('admin.page.type.index', compact('typeevenements'));
        } else {
            return view('admin.page.index');
        }
    }

    public function create(Request $request)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 0) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }

            $validator = Validator::make($request->all(), [
                'libelle' => 'required|string',
                'etat' => 'nullable|in:accepté,rejeté,en attente',
            ]);

            $typeevenement = new TypeEvenement();
            $typeevenement->libelle = $request->input('libelle');
            $typeevenement->save();
            return view('admin.page.type.create');
        } else {
            return view('admin.page.index');
        }
    }

    public function store(Request $request)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 0) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $request->validate([
                'libelle' => 'required|string',
                'etat' => 'nullable'
            ]);

            TypeEvenement::create($request->all());

            return redirect()->route('type.index');
        } else {
            return view('admin.page.index');
        }
    }

    public function edit($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 0) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $typeevenement = TypeEvenement::find($id);
            return view('admin.page.type.edit', compact('typeevenement'));
        } else {
            return view('admin.page.index');
        }
    }

    public function update(Request $request, $id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 0) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $typeevenement = TypeEvenement::find($id);
            $request->validate([
                'libelle' => 'required|string',
            ]);

            $typeevenement->update($request->all());

            return redirect()->route('type.index')->with('success', ' created successfully.');
        } else {
            return view('admin.page.index');
        }
    }

    public function destroy($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 0) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $typeevenement = TypeEvenement::find($id);
            $typeevenement->delete();

            return redirect()->route('type.index')->with('success', ' deleted successfully.');
        } else {
            return view('admin.page.index');
        }
    }
    // public function accepter($id)
    // {
    //     if (organisateurPermission() == true || auth()->user()->usertype == 1) {
    //         $typeevenement = TypeEvenement::find($id);
    //         // Mettre à jour le statut "état" de l'événement pour le marquer comme accepté
    //         $typeevenement->etat = "Accepté";
    //         $typeevenement->save();

    //         return back()->with('success', 'Publication acceptée');
    //     } else {
    //         return view('admin.page.index');
    //     }
    // }

    // public function rejeter($id)
    // {
    //     if (organisateurPermission() == true || auth()->user()->usertype == 1) {
    //         $typeevenement = TypeEvenement::find($id);
    //         // Mettre à jour le statut "état" du TypeEvenement pour le marquer comme rejeté
    //         $typeevenement->etat = "Rejeté";
    //         $typeevenement->save();

    //         return back()->with('success', 'Publication rejetée');
    //     } else {
    //         return view('admin.page.index');
    //     }
    // }
}
