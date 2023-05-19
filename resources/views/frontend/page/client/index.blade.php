@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Liste un client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Liste des clients</li>
                <li class="breadcrumb-item active"><a href="{{ route('client.create') }}">créer un client</a></li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des clients</h5>
                <!-- Dark Table -->
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> Nom </th>
                            <th scope="col"> prenom </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clients as $client)
                            <tr>

                                <td> {{ $client->user->last_name }} </td>
                                <td> {{ $client->user->first_name }}</td>
                                <td>

                                    <a class="btn btn-success btn-sm btn-rounded " id="logincss" title="look"
                                        href="{{ route('client.show', $client->id) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                                    <td>
                                    <a class="btn btn-success btn-sm btn-rounded " id="logincss" title="update "
                                        href="{{ route('client.edit', $client->id) }}" data-bs-toggle="tooltip">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('client.destroy', $client->id)}}">suprimer</a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Aucun client enregistré.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- End Table -->
            </div>
        </div>
    </section>
@endsection
