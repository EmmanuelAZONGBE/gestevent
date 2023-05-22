@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Edite un Evenement</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a >Edite des evenements</a></li>
                <li class="breadcrumb-item active">Editer un evenement</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-end">
            <div class="col-lg-9 mx-lg-auto">
                <div class="card d-flex align-items-center justify-content-center ">
                    <div class="card-body">
                        <div class="card-header">Modifier l'événement</div>

                        <form method="POST" action="{{ url('/update', $evenement->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nom" name="nom"
                                        value="{{ $evenement->nom }}" required autofocus>
                                    <label for="nom">Nom :</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="time" name="heure" id="heure" class="form-control" name="heure"
                                        value="{{ $evenement->heure }}" required>
                                    <label for="heure">Heure :</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="date" id="date" name="date" class="form-control"
                                        value="{{ $evenement->date }}" required>
                                    <label for="date">Date :</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="statut" id="statut" name="statut" class="form-control"
                                        required>
                                    <label for="statut"> Statut :</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="number" name="nombre_participant" id="nombre_participant"
                                            name="nombre_participant" class="form-control"
                                            value="{{ $evenement->nombre_participant }}" required>
                                        <label for="number">Nombre de participant :</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="type_evenement_id">Type d'événement:</label>
                                <select name="type_evenement_id" id="type_evenement_id" class="form-control" required>
                                    @foreach ($typeevenements as $typeevenement)
                                        <option value="{{ $typeevenements->id }}">{{ $evenements->libelle->id === $typeevenements->id ? 'selected' : '' }}{{ $typeevenement->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="organisateur_id">Organisateur:</label>
                                <select name="organisateur_id" id="organisateur_id" class="form-control" required>
                                    @foreach ($organisateurs as $organisateur)
                                        <option value="{{ $organisateur->id }}">{{ $evenement->last_name->id === $organisateur->id }}{{ $evenement->first_name->id === $organisateur->id }}{{ $organisateur->last_name }}{{ $organisateur->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <select name="lieu_id" id="lieu_id" class="form-control" name="lieu_id" required>
                                    @foreach ($lieux as $lieu)
                                        <option value="{{ $lieu->id }}">{{ $evenement->libelle->id === $lieu->id ? 'selected' : '' }}{{ $lieu->nom}}</option>
                                    @endforeach
                                </select>
                                <label for="lieu_id">Lieu :</label>
                            </div>

                            <div class="col-md-6">
                                <select id="statut" class="form-control" name="statut" required>
                                    <option value="en_attente" {{ $evenement->statut == 'en_attente' ? 'selected' : '' }}>
                                        En attente</option>
                                    <option value="valide" {{ $evenement->statut == 'valide' ? 'selected' : '' }}>Validé
                                    </option>
                                    <option value="annule" {{ $evenement->statut == 'annule' ? 'selected' : '' }}>Annulé
                                    </option>
                                </select>
                                <label for="organisateur_id">Facture :</label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                        <!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
