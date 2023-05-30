<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Informations de l'événement</h1>
    <h2>Informations de l'utilisateur</h2>
    <p><strong>Nom :</strong> {{ $user->last_name}}</p>
    <p><strong>Numéro :</strong> {{ $user->numero }}</p>
    <p><strong>Adresse :</strong> {{ $user->adresse }}</p>

    <h2>Informations de l événement</h2>
    <p><strong>Nom de l événement :</strong> {{ $evenement->nom }}</p>

    <h2>Photo du lieu de l événement</h2>
    <img src="{{ Storage::url($lieu->photo) }}" alt="photo du lieu" style="width: 100px;">

    <h1>Liste des paniers</h1>
    <table>
        <thead>
            <tr>
                <th>Nom du service</th>
                <th>Description</th>
                <th>Prix unitaire</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paniers as $panier)
                <tr>
                    <td>{{ $panier->service->nom_service }}</td>
                    <td>{{ $panier->service->descriptions }}</td>
                    <td>{{ $panier->service->prix }} Fcfa</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
