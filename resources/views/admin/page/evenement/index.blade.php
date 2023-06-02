@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Vos Evenements</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Liste des evenements</h5>

            {{--  <div class="col-xxl-2 col-lg-6">
                <select class="form-control select2" name="etat" id="etatFilter">
                    <option value="">Choisissez un état</option>
                    <option value="accepté">Accepté</option>
                    <option value="rejeté">Rejeté</option>
                    <option value="en_attente">En attente</option>
                </select>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var etatFilter = document.getElementById('etatFilter');
                        var evenementRows = document.getElementsByClassName('evenement-row');

                        etatFilter.addEventListener('change', function() {
                            var selectedEtat = this.value;

                            // Parcours des lignes d'événements
                            for (var i = 0; i < evenementRows.length; i++) {
                                var evenementRow = evenementRows[i];
                                var evenementEtat = evenementRow.querySelector('.evenement-etat');

                                // Vérification du statut de l'événement et affichage/masquage en conséquence
                                if (selectedEtat === '' || selectedEtat === evenementEtat.textContent.trim()) {
                                    evenementRow.style.display = 'table-row';
                                } else {
                                    evenementRow.style.display = 'none';
                                }
                            }
                        });
                    });

                </script>
            </div>  --}}
            <br>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Heure</th>
                        <th>Date</th>
                        <th>Organisateur</th>
                        <th>Type d événement</th>
                        <th>Lieu</th>
                        {{--  <th>Etat</th>  --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evenement as $evenement)
                    <tr class="evenement-row">
                        <td>{{ $evenement->nom }}</td>
                        <td>{{ $evenement->heure }}</td>
                        <td>{{ $evenement->date }}</td>
                        @foreach ($organisateurs as $organisateur)
                        @if($organisateur->id == $evenement->organisateur_id)
                        <td>
                            {{ $organisateur->first_name }}
                            {{ $organisateur->last_name }}
                        </td>
                        @endif
                        @endforeach

                        @if ($evenement->typeevenement)
                        <td>
                            {{ $evenement->typeevenement->libelle }}
                        </td>
                        @else
                        <td>...</td>
                        @endif
                        <td>{{ $evenement->lieu->nom }}</td>
                        {{--  <td class="evenement-etat">{{ $evenement->etat }}</td>  --}}
                        <td>
                            <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûrs ???')" title="Remove" data-bs-toggle="tooltip">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <a class="btn btn-success btn-sm btn-rounded" id="logincss" title="edit" href="{{ route('evenement.edit', $evenement->id) }}" data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>
                            {{--  @if (clientPermission() == false && organisateurPermission() == true || auth()->user()?->usertype == 1 && prestatairePermission() == false)
                            <form action="{{ route('evenement.accepter', $evenement->id) }}" method="post">
                                @csrf
                                <button type="submit" title="Accepter" class="btn btn-info btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                    <i class="bi bi-check"></i>
                                </button>
                            </form>

                            <form action="{{ route('evenement.rejeter', $evenement->id) }}" method="post">
                                @csrf
                                <button type="submit" title="Rejeter" class="btn btn-success btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                    <i class="bi bi-x"></i>
                                </button>
                            </form>

                            @endif  --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
