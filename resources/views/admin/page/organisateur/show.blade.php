@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Details un Organisateur</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Details des Organisateurs</a></li>
                <li class="breadcrumb-item active">Details un Organisateur</li>
            </ol>
        </nav>
    </div>
    <section class="section">

        <div class="container">
            <h1>Détails de l'organisateur</h1>
            <p><strong>Nom :</strong> {{ $organisateur->users->last_name }}</p>
            <p><strong>Prénom :</strong> {{ $organisateur->users->first_name }}</p>
            <p><strong>Adresse :</strong> {{ $organisateur->users->adresse }}</p>
            <p><strong>Email :</strong> {{ $organisateur->users->email }}</p>
            <p><strong>Compagnie :</strong> {{ $organisateur->compagnie }}</p>
            <p><strong>Adresse de la compagnie :</strong> {{ $organisateur->adresse_compagnie }}</p>
            <p><strong>Type d'événement organisé :</strong> {{ $organisateur->type_evenement_organiser }}</p>
            <p><strong>Expérience :</strong> {{ $organisateur->experience }}</p>
            <p><strong>Disponible :</strong> {{ $organisateur->disponible }}</p>
        </div>

    </section>
@endsection
