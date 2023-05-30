@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>liste un service</h1>
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
            <div class="col-xxl-2 col-lg-6">
                <select class="form-control select2" name="etat" id="etatFilter">
                    <option value="">Choisissez un état</option>
                    <option value="accepté">Accepté</option>
                    <option value="rejeté">Rejeté</option>

                </select>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var etatFilter = document.getElementById('etatFilter');
                        var serviceRows = document.getElementsByClassName('service-row');

                        etatFilter.addEventListener('change', function() {
                            var selectedEtat = this.value;

                            // Parcours des lignes d'événements
                            for (var i = 0; i < serviceRows.length; i++) {
                                var serviceRow = serviceRows[i];
                                var serviceEtat = serviceRow.querySelector('.service-etat');

                                // Vérification du statut de l'événement et affichage/masquage en conséquence
                                if (selectedEtat === '' || selectedEtat === serviceEtat.textContent.trim()) {
                                    serviceRow.style.display = 'table-row';
                                } else {
                                    serviceRow.style.display = 'none';
                                }
                            }
                        });
                    });

                </script>
            </div>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col"> Nom du service </th>
                        <th scope="col"> Ajouter </th>
                        <th scope="col"> Description </th>
                        <th scope="col"> Prix </th>
                        <th scope="col">Etat</th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @forelse ($services as $service)
                    <tr class="service-row">
                        <td> {{ $service->nom_service }} </td>
                        <td>
                                <form action="{{ route('paniers.store') }}" method="POST">
                                    @csrf
                                    <input  name="service_id" value="{{ $service->id }}" type="hidden">
                                    <button type="submit" class="add_btn">
                                     Ajouter au panier 
                                    </button>
                                </form>

                        </td>
                        <td> {{ $service->descriptions }} </td>
                        <td> {{ $service->prix }} </td>
                        <td class="service-etat">{{ $service->etat }}</td>

                        <td>
                            <form action="{{ route('service.destroy', $service->id) }}" class="rounded-circle "method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove" data-bs-toggle="tooltip">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @if (clientPermission() == false && organisateurPermission() == true || auth()->user()?->usertype == 1 && prestatairePermission() == false)
                            <form action="{{ route('service.accepter', $service->id) }}" method="post">
                                @csrf
                                <button type="submit" title="Accepter" class="btn btn-info btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                    <i class="bi bi-check"></i>
                                </button>
                            </form>

                            <form action="{{ route('service.rejeter', $service->id) }}" method="post">
                                @csrf
                                <button type="submit" title="Rejeter" class="btn btn-success btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                    <i class="bi bi-x"></i>
                                </button>
                            </form>
                            @endif
                        </td>

                        <td>
                            <a class="btn btn-success btn-sm btn-rounded " title="update" href="{{ route('service.edit', $service->id) }}" data-bs-toggle="tooltip">
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
