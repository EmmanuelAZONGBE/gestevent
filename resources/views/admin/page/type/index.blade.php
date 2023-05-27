<!-- resources/views/type_evenements/index.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Listes des type d evenement</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Liste des type d evenement</li>
            <li class="breadcrumb-item active"><a href="{{ route('type.create') }}">créer un type d evenement</a></li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row ">
        <div class="col-lg-6 mx-lg-auto">
            <h5>Type Evenements</h5>
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
                        var typeevenementRows = document.getElementsByClassName('typeevenement-row');

                        etatFilter.addEventListener('change', function() {
                            var selectedEtat = this.value;

                            // Parcours des lignes d'événements
                            for (var i = 0; i < typeevenementRows.length; i++) {
                                var typeevenementRow = typeevenementRows[i];
                                var typeevenementEtat = typeevenementRow.querySelector('.typeevenement-etat');

                                // Vérification du statut de l'événement et affichage/masquage en conséquence
                                if (selectedEtat === '' || selectedEtat === typeevenementEtat.textContent.trim()) {
                                    typeevenementRow.style.display = 'table-row';
                                } else {
                                    typeevenementRow.style.display = 'none';
                                }
                            }
                        });
                    });

                </script>
            </div>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>

                        <th>Nom </th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($typeevenements as $typeevenement)
                    <tr class="typeevenement-row">

                        <td>{{ $typeevenement->libelle }}</td>
                        <td class="typeevenement-etat">{{ $typeevenement->etat }}</td>
                        <td>
                            <a class="btn btn-success btn-sm btn-rounded " title="update" href="{{ route('type.edit', $typeevenement) }}" data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('type.destroy', $typeevenement->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove" data-bs-toggle="tooltip">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @if (clientPermission() == false && organisateurPermission() == true || auth()->user()?->usertype == 1 && prestatairePermission() == false)
                            <form action="{{ route('type.accepter', $typeevenement->id) }}" method="post">
                                @csrf
                                <button type="submit" title="Accepter" class="btn btn-info btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                    <i class="bi bi-check"></i>
                                </button>
                            </form>
                            <form action="{{ route('type.rejeter', $typeevenement->id) }}" method="post">
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
        </div>
    </div>
</section>
@endsection
