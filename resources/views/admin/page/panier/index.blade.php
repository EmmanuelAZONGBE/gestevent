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
                        <th scope="col">Prix unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalPrix = 0; ?>
                    @foreach ($paniers as $panier)
                        <tr>
                            <td>{{ $panier->service->nom_service }}</td>
                            <td>{{ $panier->service->descriptions }}</td>
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
            <a href="{{ route('paniers.downloadPDF', ['id' => $panier->id]) }}" class="btn btn-primary">Télécharger PDF</a> 
        </div>
    </section>
@endsection
