@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Détails du Prestataire</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Liste des prestataires</li>
                <li class="breadcrumb-item active">Détails du prestataire</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="container">
            <h1>Détails du Pu"restataire</h1>
            <p><strong>Nom :</strong> {{ $prestataire->last_name}}</p>
            <p><strong>Prénom :</strong> {{ $prestataire->first_name}}</p>
            <p><strong>Photo :</strong> {{ $prestataire->phpto}}</p>
            <p><strong>Adresse :</strong> {{ $prestataire->adresse}}</p>
            <p><strong>Email :</strong> {{ $prestataire->email}}</p>
        </div>
    </section>
@endsection
