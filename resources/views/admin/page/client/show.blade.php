@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Détails du client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Liste des clients</li>
                <li class="breadcrumb-item active">Détails du client</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="container">
            <h1>Détails du Client</h1>
            @foreach ($clients as $client)
            <p><strong>Nom :</strong> {{ $clients->user->last_name }}</p>
            <p><strong>Nom :</strong> {{ $client->user->last_name }}</p>
            <p><strong>Prénom :</strong> {{ $client->user->first_name }}</p>
            <p><strong>Photo :</strong> {{ $client->user->photo}}</p>
            <p><strong>Adresse :</strong> {{ $client->user->adresse}}</p>
            <p><strong>Email :</strong> {{ $client->user->email }}</p>
            @endforeach
        </div>
    </section>
@endsection
