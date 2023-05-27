@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Vos Réclamation</h1>
</div>

<!-- Affichage de la liste des réclamations -->
<section class="section">
    <div class="col-lg-6 mx-lg-auto">


        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Liste des reclamation</h5>
                <!-- Bordered Table -->
                <div class="col-xxl-2 col-lg-6">
                    <select class="form-control select2" name="etat" id="etatFilter">
                        <option value="">Choisissez un état</option>
                        <option value="accepté">Accepté</option>
                        <option value="rejeté">Rejeté</option>
                        <option value="en_attente">En attente</option>
                    </select>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var etatFilter = document.getElementById('etatFilter');
                            var reclamationRows = document.getElementsByClassName('reclamation-row');

                            etatFilter.addEventListener('change', function() {
                                var selectedEtat = this.value;

                                // Parcours des lignes d'événements
                                for (var i = 0; i < reclamationRows.length; i++) {
                                    var reclamationRow = reclamationRows[i];
                                    var reclamationEtat = reclamationRow.querySelector('.reclamation-etat');

                                    // Vérification du statut de l'événement et affichage/masquage en conséquence
                                    if (selectedEtat === '' || selectedEtat === reclamationEtat.textContent.trim()) {
                                        reclamationRow.style.display = 'table-row';
                                    } else {
                                        reclamationRow.style.display = 'none';
                                    }
                                }
                            });
                        });

                    </script>
                </div>

                <!-- Primary Color Bordered Table -->
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Message</th>
                            <th>Description</th>
                            <th>Etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reclamations as $reclamation)
                        <tr class="reclamation-row">
                            <td>{{ $reclamation->date }}</td>
                            <td>{{ $reclamation->message }}</td>
                            <td>{{ $reclamation->description }}</td>
                        <td class="reclamation-etat">{{ $service->etat }}</td>
                            <td>
                                <a class="btn btn-success btn-sm btn-rounded " title="update" href="{{ route('reclamation.edit', $reclamation) }}" data-bs-toggle="tooltip">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('reclamation.destroy', $reclamation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove" data-bs-toggle="tooltip">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @if (clientPermission() == false && organisateurPermission() == true || auth()->user()?->usertype == 1 && prestatairePermission() == false)
                                <form action="{{ route('reclamation.accepter', $reclamation->id) }}" method="post">
                                    @csrf
                                    <button type="submit" title="Accepter" class="btn btn-info btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                        <i class="bi bi-check"></i>
                                    </button>
                                </form>

                                <form action="{{ route('reclamation.rejeter', $reclamation->id) }}" method="post">
                                    @csrf
                                    <button type="submit" title="Rejeter" class="btn btn-success btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                        <i class="bi bi-x"></i>
                                    </button>
                                </form>

                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Primary Color Bordered Table -->

            </div>
        </div>
    </div>


</section>
@endsection
