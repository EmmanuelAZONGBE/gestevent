@extends('frontend.layouts.app')

@section('content')

<section class="ticket-section section-padding">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-10 mx-auto">
                <form class="custom-form ticket-form mb-5 mb-lg-0" action="{{ route('evenement.store') }}" method="post" role="form">
                    <h2 class="text-center mb-4">Get started here</h2>
                    @csrf
                    <div class="ticket-form-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="text" name="nom" id="nom" class="form-control" placeholder="Inscrivez un nom" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="number" name="nombre_participant" id="nombre_participant" class="form-control" placeholder="Nombre de personne invité" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="date" name="date" id="date" class="form-control" placeholder="Inscrivez une date" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <input type="time" name="heure" id="heure" class="form-control" placeholder="Heure de demarrage" required>
                            </div>
                        </div>

                        <input type="fille" name="facture" id="facture" class="form-control" placeholder="Télécharger le fichier" required>

                        <div class="form-group">
                            <label for="organisateur_id">Organisateur:</label>
                            <select name="organisateur_id" id="organisateur_id" class="form-control" required>
                                @foreach ($organisateurs as $organisateur)
                                <option value="{{ $organisateur->id }}">{{ $organisateur->last_name }}{{ $organisateur->first_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type_evenement_id">Type événement:</label>
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


                        <div class="col-lg-4 col-md-10 col-8 mx-auto">
                            <button type="submit" class="form-control btn btn-primary">Send Create</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</section>

@endsection
