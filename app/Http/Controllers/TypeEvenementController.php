<?php

namespace App\Http\Controllers;

use App\Models\TypeEvenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeEvenementController extends Controller
{
    public function index()
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $typeevenements = TypeEvenement::all();
        return view('admin.page.type.index', compact('typeevenements'));
        }
        else
        {
            return view('admin.page.index');
        }

    }

    public function create(Request $request)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 0) {

            $validator = Validator::make($request->all(),[
                'libelle' => 'required|string',
                'etat' => 'nullable|in:accepté,rejeté,en attente',
            ]);

            $typeevenement = new TypeEvenement();
            $typeevenement->libelle = $request->input('libelle');
            $typeevenement->etat = $request->input('etat', 'en attente');
            $typeevenement->save();
            return view('admin.page.type.create');
        }else{
            return view('admin.page.index');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
            'etat' => 'nullable'
        ]);

        TypeEvenement::create($request->all());

        return redirect()->route('type.index');
    }

    public function edit($id)
    {
        $typeevenement=TypeEvenement::find($id);
        return view('admin.page.type.edit', compact('typeevenement'));
    }

    public function update(Request $request,$id)
    {
        $typeevenement=TypeEvenement::find($id);
        $request->validate([
            'libelle' => 'required|string',
        ]);

        $typeevenement->update($request->all());

        return redirect()->route('type.index')->with('success', 'Reclamation created successfully.');
    }

    public function destroy($id)
    {
        $typeevenement=TypeEvenement::find($id);
        $typeevenement->delete();

        return redirect()->route('type.index')->with('success', 'Reclamation deleted successfully.');
    }
    public function accepter($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $typeevenement = TypeEvenement::find($id);
            // Mettre à jour le statut "état" de l'événement pour le marquer comme accepté
            $typeevenement->etat = "Accepté";
            $typeevenement->save();

            return back()->with('success', 'Publication acceptée');
        } else {
            return view('admin.page.index');
        }
    }

    public function rejeter($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $typeevenement = TypeEvenement::find($id);
            // Mettre à jour le statut "état" du TypeEvenement pour le marquer comme rejeté
            $typeevenement->etat = "Rejeté";
            $typeevenement->save();

            return back()->with('success', 'Publication rejetée');
        } else {
            return view('admin.page.index');
        }
    }
}
