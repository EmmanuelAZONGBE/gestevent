<!-- resources/views/type_evenements/index.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Listes des type d'evenement</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Liste des type d'evenement</li>
            <li class="breadcrumb-item active"><a href="{{ route('type.create') }}">créer un type d'evenement</a></li>
        </ol>
    </nav>
</div>
    <section class="section">
        <div class="row ">
            <div class="col-lg-6 mx-lg-auto">
                <h5>Type Evenements</h5>
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>

                            <th>Nom </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeevenements as $typeevenement)
                            <tr>

                                <td>{{ $typeevenement->libelle }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm btn-rounded "
                                        title="update" href="{{ route('type.edit', $typeevenement) }}"
                                        data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('type.destroy', $typeevenement->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')"
                                            title="Remove" data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
