@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Vos Réclamation</h1>
    </div>

    <!-- Affichage de la liste des réclamations -->
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste de reclamation</h5>
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
                                    <a class="btn btn-success btn-sm btn-rounded " title="update"
                                        href="{{ route('reclamation.edit', $reclamation) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('reclamation.destroy', $reclamation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove"
                                            data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    </section>
@endsection
