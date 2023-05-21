@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Listeun reclamation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Liste des reclamations</a></li>
                <li class="breadcrumb-item active">Liste un reclamation</li>
            </ol>
        </nav>
    </div>

    <!-- Affichage de la liste des réclamations -->
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des reclamations</h5>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reclamations as $reclamation)
                            <tr>
                                <td>{{ $reclamation->date }}</td>
                                <td>{{ $reclamation->message }}</td>
                                <td>{{ $reclamation->description }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm btn-rounded " title="update this reclamation"
                                        href="{{ route('reclamation.edit', $reclamation) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('reclamation.destroy', $reclamation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-rounded " title="Remove this reclamation"
                                            data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('reclamations.create') }}">Ajouter une réclamation</a>
    </section>
@endsection
