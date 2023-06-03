<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ma page</title>
</head>
<body>
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
        <h1>Informations de l'événement</h1>
        <h2>Informations de l'utilisateur</h2>
        @if ($panier->user)
        <p><strong>Nom :</strong> {{ $panier->user->last_name}}</p>
        <p><strong>Numéro :</strong> {{ $panier->user->phone }}</p>
        <p><strong>Adresse mail:</strong> {{ $panier->user->email }}</p>
        <p><strong>Adresse :</strong> {{ $panier->user->adresse }}</p>
        <p><strong>Identifiant :</strong> {{ $panier->user_id }}</p>
        @else
        <p>Aucune information sur l'utilisateur disponible.</p>
        @endif
        <h2>Informations de l'événement</h2>
        @if ($panier->evenement)
        <p><strong>Nom de l'événement :</strong> {{ $panier->evenement->nom }}</p>
        @else
        <p>Aucune information sur l'événement disponible.</p>
        @endif
        <h2>Photo du lieu de l'événement</h2>
        @if ($lieu)
        {{--  <img src="{{ Storage::url($lieu->photo) }}" alt="photo du lieu" style="width: 100px;">  --}}
        @else
        <p>Aucune photo de lieu disponible.</p>
        @endif
        <h1>Liste des services :</h1>
        <table>
            <thead>
                <tr>
                    <th>Nom du service</th>
                    <th>Description</th>
                    <th>Prix unitaire</th>
                    <th>Identifiant du service</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $panier->service->nom_service }}</td>
                    <td>{{ $panier->service->descriptions }}</td>
                    <td>{{ $panier->service->prix }} Fcfa</td>
                    <td>{{ $panier->service_id}} </td>
                </tr>
            </tbody>
            <kkiapay-widget sandbox="true" amount="1" key="140d90edbfc500615a953f33ec4c7a660b93e0a6" callback="https://kkiapay-redirect.com" />
        </table>
    </div>
</section>
<script src="https://cdn.kkiapay.me/k.js"></script>

</body>
</html>
