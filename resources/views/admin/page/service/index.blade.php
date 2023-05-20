@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>liste  un service</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Liste des services</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('service.create') }}">Ajouter un service</a></li>
        </ol>
    </nav>
</div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des services</h5>
                <!-- Small tables -->
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Nom du service </th>
                            <th scope="col"> Description </th>
                            <th scope="col"> Statut </th>
                            <th scope="col"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        @forelse ($service as $service)
                            <tr class="table-info">
                                <td scope="row">{{ $service->id }}</td>
                                <td> {{ $service->nom_service }} </td>
                                <td> {{ $service->descriptions }} </td>
                                <td> {{ $service->actif ? 'Activé' : 'Désactivé' }} </td>
                                <td>
                                    <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-rounded " title="Remove"
                                            data-bs-toggle="tooltip">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm btn-rounded " title="update"
                                        href="{{ route('service.edit', $service->id) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <p class="text text-info">Aucun type de service </p>
                        @endforelse

                    </tbody>
                </table>
                <!-- End small tables -->

            </div>
        </div>
    </section>
@endsection
