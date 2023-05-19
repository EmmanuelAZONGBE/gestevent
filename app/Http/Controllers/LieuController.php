<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;

class LieuController extends Controller
{
    public function index()
    {
        $lieux = Lieu::all();
        return view('admin.page.lieu.index', compact('lieux'));
    }

    public function create()
    {
        return view('admin.page.lieu.create');
    }

    public function store(Request $request)
    {
       $request->validate([
            'nom' => 'required',
            'description' => 'nullable|string',
            'picture' => 'required',
            'adresse' => 'required',
        ]);

       Lieu::create($request->all());


        return redirect()->route('lieu.index')->with('success', 'lieu created successfully.');
    }

    public function edit(Lieu $lieux)
    {
        return view('admin.page.lieu.edit', compact('lieux'));
    }

    public function update(Request $request, Lieu $lieux)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'picture' => 'picture',
            'adresse' => 'required',
        ]);

        $lieux->nom = $validatedData['nom'];
        $lieux->description = $validatedData['description'];

        if ($request->hasFile('uploads')) {
            $file = $request->file('uploads')->store('picture');
            $lieux->picture = $file;
        }

        $lieux->adresse = $validatedData['adresse'];
        $lieux->save();

        return redirect()->route('lieu.index');
    }

    public function destroy(Lieu $lieux)
    {
        $lieux->delete();
        return redirect()->route('lieu.index');
    }
}
