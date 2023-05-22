<?php

namespace App\Http\Controllers;

use App\Models\TypeEvenement;
use Illuminate\Http\Request;

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

    public function create()
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 0) {
            return view('admin.page.type.create');
        }else{
            return view('admin.page.index');
        }

    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string',
        ]);

        TypeEvenement::create($request->all());

        return redirect()->route('type.index')->with('success', 'Reclamation created successfully.');
    }

    public function edit(TypeEvenement $typeevenement)
    {
        return view('admin.page.type.edit', compact('typeevenement'));
    }

    public function update(Request $request, TypeEvenement $typeevenement)
    {
        $request->validate([
            'libelle' => 'required|string',
        ]);

        $typeevenement->update($request->all());

        return redirect()->route('type.index')->with('success', 'Reclamation created successfully.');
    }

    public function destroy($id)
    {
        TypeEvenement::findOrFail($id)->delete();

        return redirect()->route('type.index')->with('success', 'Reclamation deleted successfully.');
    }
}
