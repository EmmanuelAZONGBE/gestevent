<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Lieu;
use App\Models\Service;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (prestatairePermission() == true || organisateurPermission() == true || auth()->user()->usertype == 1) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            // Récupérer tous les services
            $services = Service::all();

            // Retourner les services sous forme de réponse JSON

            return view('admin.page.service.index', compact('services'));
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (prestatairePermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            // Valider les données de la requête
            $validator = Validator::make($request->all(), [
                'nom_service' => 'required|string',
                'descriptions' => 'nullable|string',
                'prix' => 'nullable|string',
                'etat' => 'nullable|in:accepté,rejeté,en attente',
            ]);


            // Créer un nouvel objet Service avec les données validées
            $service = new Service();
            $service->nom_service = $request->input('nom_service');
            $service->descriptions = $request->input('descriptions');
            $service->prix = $request->input('prix');
            $service->etat = $request->input('etat', 'en attente');

            // Enregistrer le service dans la base de données
            $service->save();

            // Retourner une réponse appropriée
            return view('admin.page.service.create');
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (prestatairePermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $request->validate([
                'nom_service' => 'required|string',
                'descriptions' => 'required|string',
                'prix' => 'required|string',
                'etat' => 'nullable',
            ]);

            Service::create([

                'nom_service' => $request->nom_service,
                'descriptions' => $request->descriptions,
                'prix' => $request->prix,
                'etat' => $request->has('etat')

            ]);
            return redirect()->route('service.index');
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     // Trouver le service par son identifiant
    //     $service = Service::find($id);

    //     if (!$service) {
    //         // Si le service n'est pas trouvé, retourner une réponse d'erreur
    //         return response()->json(['message' => 'Service non trouvé'], 404);
    //     }

    //     // Retourner le service trouvé sous forme de réponse JSON
    //     return response()->route($service, 200);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (prestatairePermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $service = Service::find($id);
            return view('admin.page.service.edit', compact('service'));
        } else {
            return view('admin.page.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (prestatairePermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            // Trouver le service par son identifiant
            $service = Service::find($id);

            // Valider les données de la requête
            $request->validate([
                'nom_service' => 'nullable|string',
                'descriptions' => 'nullable|string',
                'prix' => 'nullable|string',
                'etat' => 'nullable|in:accepté,rejeté,en attente',
            ]);

            // Mettre à jour les champs du service avec les données validées
            $service->update($request->all());

            // Retourner une réponse appropriée
            return redirect()->route('service.index')->with('success', 'Le service a été mis à jour avec succès.');
        } else {
            return view('admin.page.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (prestatairePermission() == true) {
            if (!Auth::check()) {
                // Utilisateur non authentifié, rediriger ou retourner une réponse appropriée
                return redirect()->route('login');
            }
            $service = Service::find($id);
            if (!$service) {
                // Si le service n'est pas trouvé, retourner une réponse d'erreur
                return redirect()->back()->with('success', 'Service non trouvé');
            }
            $service->delete();
            // Retourner une réponse appropriée
            return redirect()->back()->with('success', 'le service à été supprimer');
        } else {
            return view('admin.page.index');
        }
    }

    public function accepter($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $service = service::find($id);
            // Mettre à jour le statut "état" de l'événement pour le marquer comme accepté
            $service->etat = "Accepté";
            $service->save();

            return back()->with('success', 'Publication acceptée');
        } else {
            return view('admin.page.index');
        }
    }

    public function rejeter($id)
    {
        if (organisateurPermission() == true || auth()->user()->usertype == 1) {
            $service = service::find($id);
            // Mettre à jour le statut "état" de l'événement pour le marquer comme accepté
            $service->etat = "Accepté";
            $service->save();

            return back()->with('success', 'Publication rejetée');
        } else {
            return view('admin.page.index');
        }
    }

    // public function ajout_panier(Request $request, $id)

    // {
    //     if (Auth::id()) {
    //         $user = Auth::user();
    //         dd($user);
    //         $service = Service::find($id);
    //         // $quantiter = $request->input('quantiter');
    //         // dd($service);
    //         $cart= new Cart();

    //         $cart ->last_name=$user->last_name;

    //         $cart ->first_name=$user->first_name;

    //         $cart ->email=$user->email;

    //         $cart ->phone=$user->phone;

    //         $cart ->user_id=$user->id;

    //         $cart ->nom_service=$service->nom_service;

    //         $cart ->prix=$service->prix * $request->quantiter;

    //         $cart ->descriptions=$service->descriptions;

    //         $cart ->quantiter=$request->quantiter;

    //         $cart ->service_id=$service->id;


    //         // $cart->save;
    //         // dd($cart);

    //         return redirect()->back();


    //     } else {
    //         return redirect('login');
    //     }
    // }

    // public function show_panier()
    // {
    //     if (Auth::id()) { $id=Auth::user()->id;

    //         $cart= Cart::where('user_id','=','$id')->get();

    //         return view('admin.page.service.show_panier',compact('cart'));
    //     }
    //     else
    //     {
    //         return redirect('login');
    //     }

    // }

    // public function retir_panier($id)
    // {
    //     $cart=Cart::find($id);

    //     $cart->delete();

    //     return redirect()->back();
    // }

    // public function print_pdf($id)
    // {
    //     $cart=Cart::find($id);
    //     $lieux=Lieu::find($id);
    //     $pdf = PDF::loadView('admin.page.service.pdf',compact('cart','lieux'));

    //     return $pdf->download('show_panier.pdf');
    // }
}
