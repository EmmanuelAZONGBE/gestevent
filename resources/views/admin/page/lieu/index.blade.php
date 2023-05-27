@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Liste des lieux</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Liste des lieux</li>
                <li class="breadcrumb-item active"><a href="#">Ajouter un Lieu</a></li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des Lieux</h5>
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>

                            <th>Nom</th>
                            <th>prix</th>
                            <th>Description</th>
                            <th>Adresse</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lieux as $lieu)
                            <tr>

                                <td>{{ $lieu->nom }}</td>
                                <td>{{ $lieu->prix }}</td>
                                <td>{{ $lieu->description }}</td>
                                <td>{{ $lieu->adresse }}</td>
                                <td scope="row">
                                    @if ($lieu->photo)
                                        <img src="{{ asset('/storage/'.$lieu->photo) }}" alt="photo du lieu" style="width: 100px;">
                                    @else
                                        Aucune photo
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm btn-rounded" title="update" href="{{ route('lieu.edit', $lieu->id) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('lieu.destroy', $lieu->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove" data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Aucun lieu trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
