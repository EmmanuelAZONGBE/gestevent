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
        }else{
            return view('admin.page.index');
        }
    }

    public function create()
    {
        if (organisateurPermission() == true ) {
            return view('admin.page.lieu.create');
        }else{
            abort (401);
        }
    }

    public function store(Request $request)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $request->validate([
                'nom' => 'required',
                'description' => 'nullable|string',
                'photo'=>'image|mimes:png,jpg,jpeg|max:2048',
                'adresse' => 'required',
            ]);

            Lieu::create($request->all());


            return redirect()->route('lieu.index')->with('success', 'lieu created successfully.');
        }else{
            return view('admin.page.index');
        }
    }

    public function edit(Lieu $lieux)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            return view('admin.page.lieu.edit', compact('lieux'));
        }else{
            return view('admin.page.index');
        }
    }

    public function update(Request $request, Lieu $lieux)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $validatedData = $request->validate([
                'nom' => 'required',
                'description' => 'required',
                'photo'=>'image|mimes:png,jpg,jpeg|max:2048',
                'adresse' => 'required',
            ]);

            $lieux->nom = $validatedData['nom'];
            $lieux->description = $validatedData['description'];

            if ($request->hasFile('uploads')) {
                $file = $request->file('uploads')->store('photo');
                $lieux->photo = $file;
            }

            $lieux->adresse = $validatedData['adresse'];
            $lieux->save();

            return redirect()->route('lieu.index');
        } else {
            return view('admin.page.index');
        }
    }

    public function destroy($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            Lieu::findOrFail($id)->delete();
            return redirect()->route('lieu.index');
        } else {
            return view('admin.page.index');
        }
    }
}
