@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Créer un evenement</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Créer des evenement</a></li>
                <li class="breadcrumb-item active">Créer un evenement</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-end">
            <div class="col-lg-9 mx-lg-auto">
                <div class="card d-flex align-items-center justify-content-center">
                    <div class="container">
                        <h1>Create Event</h1>

                        <form action="{{ route('evenement.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nom">Nom:</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="heure">Heure:</label>
                                <input type="time" name="heure" id="heure" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nombre_participant">Nombre de participants:</label>
                                <input type="number" name="nombre_participant" id="nombre_participant" class="form-control"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="facture">Facture:</label>
                                <input type="nmber" name="facture" id="facture" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="statut">Statut:</label>
                                <select name="statut" id="statut" class="form-control" required>
                                    <option value="En cours">En cours</option>
                                    <option value="Terminé">Terminé</option>
                                    <option value="Annulé">Annulé</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="organisateur_id">Organisateur:</label>
                                <select name="organisateur_id" id="organisateur_id" class="form-control" required>
                                    @foreach ($organisateurs as $organisateur)
                                        <option value="{{ $organisateur->id }}">{{ $organisateur->last_name }}{{ $organisateur->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type_evenement_id">Type d'événement:</label>
                                <select name="type_evenement_id" id="type_evenement_id" class="form-control" required>
                                    @foreach ($typeevenements as $typeevenement)
                                        <option value="{{ $typeevenement->id }}">{{ $typeevenement->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="lieu_id">Lieu:</label>
                                <select name="lieu_id" id="lieu_id" class="form-control" required>
                                    @foreach ($lieux as $lieu)
                                        <option value="{{ $lieu->id }}">{{ $lieu->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                @endsection
