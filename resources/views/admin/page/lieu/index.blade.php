@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Liste des lieux</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Liste des lieux</li>
            <li class="breadcrumb-item active"><a href="#">Ajouter un Lieu</a></li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Liste des Lieux</h5>
            {{--  <div class="col-xxl-2 col-lg-6">
                <select class="form-control select2" name="etat" id="etatFilter">
                    <option value="">Choisissez un état</option>
                    <option value="accepté">Accepté</option>
                    <option value="rejeté">Rejeté</option>
                </select>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var etatFilter = document.getElementById('etatFilter');
                        var lieuRows = document.getElementsByClassName('lieu-row');

                        etatFilter.addEventListener('change', function() {
                            var selectedEtat = this.value;

                            // Parcours des lignes d'événements
                            for (var i = 0; i < lieuRows.length; i++) {
                                var lieuRow = lieuRows[i];
                                var lieuEtat = lieuRow.querySelector('.lieu-etat');

                                // Vérification du statut de l'événement et affichage/masquage en conséquence
                                if (selectedEtat === '' || selectedEtat === lieuEtat.textContent.trim()) {
                                    lieuRow.style.display = 'table-row';
                                } else {
                                    lieuRow.style.display = 'none';
                                }
                            }
                        });
                    });

                </script>
            </div>  --}}
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>

                        <th>Nom</th>
                        <th>prix</th>
                        <th>Description</th>
                        <th>Adresse</th>
                        <th>Photo</th>
                        {{--  <th>Etat</th>  --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lieux as $lieu)
                    <tr class="lieu-row">

                        <td>{{ $lieu->nom }}</td>
                        <td>{{ $lieu->prix }}</td>
                        <td>{{ $lieu->description }}</td>
                        <td>{{ $lieu->adresse }}</td>
                        <td scope="row">
                            @if ($lieu->photo)
                            <img src="{{ Storage::url($lieu->photo) }}" alt="photo du lieu" style="border-radius: 5px;
                            max-width: 60px;">
                            @else
                            Aucune photo
                            @endif
                        </td>
                        {{--  <td class="lieu-etat">{{ $lieu->etat }}</td>  --}}
                        <td>
                            {{--  <a class="btn btn-success btn-sm btn-rounded" title="update" href="{{ route('lieu.edit', $lieu->id) }}" data-bs-toggle="tooltip">
                                <i class="bi bi-pencil"></i>
                            </a>  --}}
                            <form action="{{ route('lieu.destroy', $lieu->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove" data-bs-toggle="tooltip">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            {{--  @if (clientPermission() == false && organisateurPermission() == true || auth()->user()?->usertype == 1 && prestatairePermission() == false)
                            <form action="{{ route('lieu.accepter', $lieu->id) }}" method="post">
                                @csrf
                                <button type="submit" title="Accepter" class="btn btn-info btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                    <i class="bi bi-check"></i>
                                </button>
                            </form>

                            <form action="{{ route('lieu.rejeter', $lieu->id) }}" method="post">
                                @csrf
                                <button type="submit" title="Rejeter" class="btn btn-success btn-sm btn-rounded" onclick="return confirm('Etes-vous sûr ?')">
                                    <i class="bi bi-x"></i>
                                </button>
                            </form>
                            @endif  --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Aucun lieu trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
