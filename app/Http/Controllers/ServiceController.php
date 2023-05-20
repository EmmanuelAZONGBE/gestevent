<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Liste des services paginés
        $services = Service::where('etat', true)
                            ->orWhere('etat', false)
                            ->paginate(10); // 10 services par page

        return view('admin.page.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //affichage du formulaire
        return view('admin.page.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_service'=> 'required|string',
            'descriptions'=> 'required|string',
            'etat'=> 'nullable',
        ]);

        Service::create([

            'nom_service'=>$request->nom_service,
            'descriptions'=>$request->descriptions,
            'etat'=>$request->has('etat')

        ]);
       return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.page.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Service $service )
    {
        //
        $request->validate([
            'nom_service'=>'required',
            'descriptions'=>'required',
            'etat'=>'nullable',
        ]);

        $service->update([
            'nom_service'=>$request->nom_service,
            'descriptions'=>$request->descriptions,
            'etat'=>$request->has('etat')
        ]);

        return redirect()->route('service.index')->with('success','le service a été mise à jours avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
       return redirect()->route('service.index')->with('success','le service à été supprimer');
    }
}
