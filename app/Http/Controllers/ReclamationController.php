<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index()
    {
        if (clientPermission() == true || auth()->user()->usertype == 1 ||organisateurPermission() == true || prestatairePermission() == true) {
            $reclamations = Reclamation::all();
            return view('admin.page.reclamation.index', compact('reclamations'));
        } else {
            return abort(401);
        }
    }

    public function create()
    {
        return view('admin.page.reclamation.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'date' => 'required|string',
            'message' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Reclamation::create($request->all());

        return redirect()->route('reclamation.index')->with('success', 'Reclamation created successfully.');
    }

    public function edit($id)
    {
        $reclamation=Reclamation::find($id);
        return view('admin.page.reclamation.edit', compact('reclamation'));
    }

    public function update(Request $request,$id)
    {
        $reclamation=Reclamation::find($id);
        $request->validate([
            'date' => 'required|string',
            'message' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $reclamation->update($request->all());

        return redirect()->route('reclamation.index')->with('success', 'Reclamation updated successfully.');
    }

    public function destroy($id)
    {
        $reclamation=Reclamation::find($id);
        $reclamation->delete();

        return redirect()->route('reclamation.index')->with('success', 'Reclamation deleted successfully.');
    }
}
