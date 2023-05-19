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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Détails du client</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Nom :</label>
                            <input type="text" class="form-control" name="last_name"id="last_name" value="{{ $client->users->last_name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="first_name">Prénom :</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $client->users->first_name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email"value="{{ $client->users->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="adresse">Address:</label>
                            <input type="text" class="form-control" id="adresse" name="adresse"value="{{ $client->users->adresse }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Mots de passe :</label>
                            <input type="text" class="form-control" id="password" name="password"value="{{ $client->users->password }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <a class="btn btn-primary" href="{{ route('client.edit', $client->id) }}">Modifier</a>
                        <form action="{{ route('client.destroy', $client->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
