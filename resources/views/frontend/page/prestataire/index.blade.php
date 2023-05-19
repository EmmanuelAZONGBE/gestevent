@extends('frontend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Liste un prestataire</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Liste des prestataires</li>
                <li class="breadcrumb-item active"><a href="{{ route('prestataire.create') }}">créer un prestataire</a></li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des prestataires</h5>
                <!-- Dark Table -->
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> Nom </th>
                            <th scope="col"> prenom </th>
                            <th scope="col"> Email </th>
                            <th scope="col"> Adresse </th>
                            <th scope="col"> Mots de passe </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prestataires as $prestataire)
                            <tr>
                                <td> {{ $prestataire->last_name }} </td>
                                <td> {{ $prestataire->first_name }}</td>
                                <td> {{ $prestataire->email }} </td>
                                <td> {{ $prestataire->adresse }} </td>
                                <td> {{ $prestataire->password }} </td>
                                <td>
                                    <a class="btn btn-info btn-sm btn-rounded " id="logincss" title="look"
                                    href="{{ route('prestataire.show', $prestataire->id) }}" data-bs-toggle="tooltip">
                                    <i class="bi bi-eye"></i>
                                     </a>
                                    <a class="btn btn-success btn-sm btn-rounded " title="update this prestataire"
                                        href="{{ route('prestataire.edit', $prestataire->id) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('prestataire.destroy', $prestataire->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-rounded "
                                            title="Remove this prestataire" data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucun prestataire enregistré.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- End Table -->
            </div>
        </div>
    </section>
@endsection
