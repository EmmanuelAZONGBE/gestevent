@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Liste des evenements</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a >Liste des evenements</a></li>
                <li class="breadcrumb-item active">Liste des événements</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des evenements</h5>
                <a href="{{ route('evenement.create') }}" class="btn btn-sm btn-primary mb-3">Ajouter un client</a>
                <div class="card-header">Liste des événements</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Heure</th>
                            <th>Date</th>
                            <th>Statut</th>
                            <th>Nombre de participant</th>
                            <th>Facture</th>
                            <th>Organisateur</th>
                            <th>Type d'événement</th>
                            <th>Lieu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evenement as $evenement)
                            <tr>
                                <td>{{ $evenement->nom }}</td>
                                <td>{{ $evenement->heure }}</td>
                                <td>{{ $evenement->date }}</td>
                                <td>{{ $evenement->statut }}</td>
                                <td>{{ $evenement->nombre_participant }}</td>
                                <td>{{ $evenement->facture }}</td>
                                <td>{{ $evenement->organisateur->first_name }} {{ $evenement->organisateur->last_name }}</td>
                                <td>
                                    @if ($evenement->type_evenement)
                                        {{ $evenement->type_evenement->libelle }}
                                    @endif
                                </td>
                                <td>{{ $evenement->lieu->nom }}</td>
                                <td>
                                    <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" id="logincss" class="btn btn-danger btn-sm btn-rounded "
                                            title="Remove" data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <a class="btn btn-success btn-sm btn-rounded " id="logincss" title="look"
                                        href="{{ route('evenement.show', $evenement->id) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <a href="{{ route('evenement.edit', $evenement->id) }}" class="btn btn-primary">Modifier</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
