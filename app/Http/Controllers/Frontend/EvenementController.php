<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lieu;
use App\Models\TypeEvenement;
use App\Models\users;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submit()
    {
        if (clientPermission() == true) {

            $organisateurs = users::join('organisateurs', 'organisateurs.user_id', '=', 'users.id')
                ->get();
            $typeevenements = TypeEvenement::all();
            $lieux = Lieu::all();

            return view('frontend.page.evenement.create', [
                'organisateurs' => $organisateurs,
                'typeevenements' => $typeevenements,
                'lieux' => $lieux,
            ]);
        } else {
            return view('frontend.page.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
