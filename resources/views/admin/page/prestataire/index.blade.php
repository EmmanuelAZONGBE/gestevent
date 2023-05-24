@extends('admin.layouts.app')

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
             <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th > Nom </th>
                        <th > prenom </th>
                        <th > Email </th>
                        <th > Action </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prestataires as $prestataire)
                    <tr>
                        <td> {{ $prestataire->last_name }} </td>
                        <td> {{ $prestataire->first_name }}</td>
                        <td> {{ $prestataire->email }} </td>
                        <td>
                            {{--  <a class="btn btn-info btn-sm btn-rounded " id="logincss" title="look"
                                    href="{{ route('prestataire.show', $prestataire->id) }}" data-bs-toggle="tooltip">
                            <i class="bi bi-eye"></i>
                            </a>
                            <a class="btn btn-success btn-sm btn-rounded " title="update " href="{{ route('prestataire.edit', $prestataire->id) }}" data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>  --}}
                            <form action="{{ route('prestataire.destroy', $prestataire->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove " data-bs-toggle="tooltip">
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
