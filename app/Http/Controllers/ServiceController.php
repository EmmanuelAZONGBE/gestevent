<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les services
        $services = Service::all();

        // Retourner les services sous forme de réponse JSON

        return view('admin.page.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (organisateurPermission() == false) {

            // Valider les données de la requête
            $validator = Validator::make($request->all(), [
                'nom_service' => 'required|string',
                'descriptions' => 'nullable|string',
                'etat' => 'nullable|in:accepté,rejeté,en attente',
            ]);

           
            // Créer un nouvel objet Service avec les données validées
            $service = new Service();
            $service->nom_service = $request->input('nom_service');
            $service->descriptions = $request->input('descriptions');
            $service->etat = $request->input('etat', 'en attente');

            // Enregistrer le service dans la base de données
            $service->save();

            // Retourner une réponse appropriée
            return view('admin.page.service.create');
        } else {
            return abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_service' => 'required|string',
            'descriptions' => 'required|string',
            'etat' => 'nullable',
        ]);

        Service::create([

            'nom_service' => $request->nom_service,
            'descriptions' => $request->descriptions,
            'etat' => $request->has('etat')

        ]);
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Trouver le service par son identifiant
        $service = Service::find($id);

        if (!$service) {
            // Si le service n'est pas trouvé, retourner une réponse d'erreur
            return response()->json(['message' => 'Service non trouvé'], 404);
        }

        // Retourner le service trouvé sous forme de réponse JSON
        return response()->json($service, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.page.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Trouver le service par son identifiant
        $service = Service::find($id);

        if (!$service) {
            // Si le service n'est pas trouvé, retourner une réponse d'erreur
            return redirect()->route(['success' => 'Service non trouvé'], 404);
        }

        // Valider les données de la requête
        $validatedData = $request->validate([
            'nom_service' => 'nullable|string',
            'descriptions' => 'nullable|string',
            'etat' => 'nullable|in:accepté,rejeté,en attente',
        ]);

        // Mettre à jour les champs du service avec les données validées
        $service->nom_service = $validatedData['nom_service'];
        $service->descriptions = $validatedData['descriptions'];
        $service->etat = $validatedData['etat'];

        // Enregistrer les modifications dans la base de données
        $service->save();

        // Retourner une réponse appropriée
        return redirect()->route('service.index')->with('success', 'le service a été mise à jours avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            // Si le service n'est pas trouvé, retourner une réponse d'erreur
            return redirect()->route(['message' => 'Service non trouvé'], 404);
        }
        $service->delete();
        // Retourner une réponse appropriée
        return redirect()->route('service.index')->with('success', 'le service à été supprimer');
    }
}
