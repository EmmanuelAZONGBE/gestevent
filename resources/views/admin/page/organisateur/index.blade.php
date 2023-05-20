@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Liste un organisateur</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Liste des organisateurs</li>
                <li class="breadcrumb-item active"><a >Ajouter un organisateur</a></li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des organisateurs</h5>
                <!-- Dark Table -->
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> Nom</th>

                            <th scope="col"> Compagnie </th>
                            <th scope="col"> Adresse de la compagnie</th>
                            <th scope="col"> Type evenement organiser </th>
                            <th scope="col"> Experience </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @forelse ($organisateurs as $organisateur)
                        <tr>
                            <td> {{ $organisateur->last_name }} </td>
                            <td> {{ $organisateur->compagnie }} </td>
                            <td> {{ $organisateur->adresse_compagnie }} </td>
                            <td> {{ $organisateur->type_evenement_organiser }} </td>
                            <td> {{ $organisateur->experience }} </td>
                            <td>

                                <a class="btn btn-info btn-sm btn-rounded " id="logincss" title="look"
                                    href="{{ route('organisateur.show', $organisateur->id) }}" data-bs-toggle="tooltip">
                                    <i class="bi bi-eye"></i>
                                     </a>

                                <a class="btn btn-success btn-sm btn-rounded " title="update"
                                    href="{{ route('organisateur.edit', $organisateur->id) }}" data-bs-toggle="tooltip">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('organisateur.destroy', $organisateur->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-rounded " title="Remove"
                                        data-bs-toggle="tooltip">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p class="text text-info">Aucun n'à été enregistrer </p>
                        @endforelse
                    </tbody>
                </table>
                <!-- End Table -->
            </div>
        </div>

    </section>
@endsection
