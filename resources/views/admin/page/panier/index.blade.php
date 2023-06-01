@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Liste des paniers</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"></li>
            <li class="breadcrumb-item active">Liste des paniers</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="container">
        <h1>Paniers</h1>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">Nom du service</th>
                    <th scope="col">Description</th>
                    <th scope="col">Supprimer</th>
                    <th scope="col">Prix unitaire</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalPrix = 0; ?>
                @foreach ($paniers as $panier)
                <tr>
                    <td>{{ $panier->service->nom_service }}</td>
                    <td>{{ $panier->service->descriptions }}</td>
                    <td>
                        <form action="{{ route('paniers.destroy', $panier->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btn-rounded" onclick="return confirm('Vous êtes sûres ???')" title="Remove" data-bs-toggle="tooltip">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                    <td>{{ $panier->service->prix }} Fcfa</td>
                </tr>
                <?php
                            $prix = str_replace(' Fcfa', '', $panier->service->prix);
                            $totalPrix += floatval($prix);
                        ?>

                @endforeach
            </tbody>
        </table>
        <div>
            <h1>Somme totale des prix unitaires : {{ $totalPrix }} Fcfa</h1>
        </div>
        <div>
            <a href="{{ route('panier.downloadPDF', ['id' => $panier->id]) }}" class="btn btn-primary">Télécharger PDF</a>
        </div>

        <button onclick="redirectTochatify()" class="btn btn-info">Accéder à la messagerie</button>
        <script>
            function redirectTochatify() {
                window.location.href = "http://127.0.0.1:8000/chatify";
            }

        </script>

    </div>
</section>
@endsection
