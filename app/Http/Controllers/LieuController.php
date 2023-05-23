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
        if (organisateurPermission() == true ) {
            $request->validate([
                'nom' => 'required',
                'prix' => 'required',
                'description' => 'nullable|string',
                'photo'=>'image|mimes:png,jpg,jpeg|max:2048',
                'adresse' => 'required',
            ]);

            $photo = $request->photo->store('lieu');

            Lieu::create([
                'nom'=> $request->nom,
                'prix'=> $request->prix,
                'description' => $request->description,
                'photo'=>$photo,
                'adresse' => $request->adresse,
            ]);


            return redirect()->route('lieu.index')->with('success', 'lieu created successfully.');
        }else{
            return view('admin.page.index');
        }
    }

    public function edit($id)
    {
        if (organisateurPermission() == true ) {
            $lieux = Lieu::find($id);
            return view('admin.page.lieu.edit', compact('lieux'));
        }else{
            return view('admin.page.index');
        }
    }

    public function update(Request $request,$id)
    {
        // dd($id);
        if (organisateurPermission() == true ) {
            $lieux = Lieu::find($id);


            $lieux->nom = $request->nom;
            $lieux->prix = $request->prix;
            $lieux->description = $request->description;
            $lieux->adresse = $request->adresse;
            $lieux->photo = $request->photo;
            if($request->photo != null){
                $photo = $request->photo->store('lieu');
                $lieux->photo = $photo;
            }
            $lieux->save();

            return redirect()->route('lieu.index')->with('success', 'lieu updated successfully.');
        } else {
            return view('admin.page.index');
        }
    }

    public function destroy($id)
    {
        //dd($id);
        if (organisateurPermission() == true) {
            $lieux = Lieu::find($id);
            $lieux->delete();
            return redirect()->route('lieu.index')->with('success', 'lieu deleted successfully.');
        } else {
            return view('admin.page.index');
        }
    }
}
