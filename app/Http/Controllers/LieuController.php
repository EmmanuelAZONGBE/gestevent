<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;

class LieuController extends Controller
{
    public function index()
    {

        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $lieux = Lieu::all();
            return view('admin.page.lieu.index', compact('lieux'));
        } else {
            return view('admin.page.index');
        }
    }

    public function create()
    {

        if (organisateurPermission() == true) {
            return view('admin.page.lieu.create');
        } else {
            abort(401);
        }
    }

    public function store(Request $request)
    {

        if (organisateurPermission() == true) {
            $request->validate([
                'nom' => 'required',
                'prix' => 'required',
                'description' => 'nullable|string',
                'photo' => 'image|mimes:png,jpg,jpeg|max:2048',
                'adresse' => 'required',
            ]);

            $photo =  $this->uploads($request, 'photo');

            Lieu::create([
                'nom' => $request->nom,
                'prix' => $request->prix,
                'description' => $request->description,
                'photo' => $photo,
                'adresse' => $request->adresse,
            ]);


            return redirect()->route('lieu.index')->with('success', 'lieu created successfully.');
        } else {
            return view('admin.page.index');
        }
    }

    public function edit($id)
    {

        if (organisateurPermission() == true) {
            $lieu = Lieu::find($id);
            return view('admin.page.lieu.edit', compact('lieu'));
        } else {
            return view('admin.page.index');
        }
    }

    public function update(Request $request, $id)
    {
        if (organisateurPermission() == true) {
            $lieu = Lieu::find($id);


            $lieu->nom = $request->nom;
            $lieu->prix = $request->prix;
            $lieu->description = $request->description;
            $lieu->adresse = $request->adresse;
            $lieu->photo = $request->photo;
            if ($request->photo != null) {
                $photo =  $this->uploads($request, 'photo');
                $lieu->photo = $photo;
            }
            $lieu->save();

            return redirect()->route('lieu.index')->with('success', 'lieu updated successfully.');
        } else {
            return view('admin.page.index');
        }
    }

    public function destroy($id)
    {
        if (organisateurPermission() == true) {
            $lieu = Lieu::find($id);

            // Supprimer les événements associés au lieu
            $lieu->evenement()->delete();

            // Supprimer le lieu lui-même
            $lieu->delete();

            return redirect()->route('lieu.index')->with('success', 'Lieu supprimé avec succès.');
        } else {
            return view('admin.page.index');
        }
    }

    // public function accepter($id)
    // {
    //     if (organisateurPermission() == true || auth()->user()->usertype == 1) {
    //         $lieu = Lieu::find($id);
    //         // Mettre à jour le statut "état" de l'événement pour le marquer comme accepté
    //         $lieu->etat = "Accepté";
    //         $lieu->save();

    //         return back()->with('success', 'Publication acceptée');
    //     } else {
    //         return view('admin.page.index');
    //     }
    // }

    // public function rejeter($id)
    // {
    //     if (organisateurPermission() == true || auth()->user()->usertype == 1) {
    //         $lieu = Lieu::find($id);
    //         // Mettre à jour le statut "état" du lieu pour le marquer comme rejeté
    //         $lieu->etat = "Rejeté";
    //         $lieu->save();

    //         return back()->with('success', 'Publication rejetée');
    //     } else {
    //         return view('admin.page.index');
    //     }
    // }
}
