<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
            {{--  {{ dd($panier) }}  --}}
            @foreach ($panier as $item)
            <tr>
                <td>{{ $item->service->nom_service }}</td>
                <td>{{ $item->service->descriptions }}</td>
                <td>{{ $item->service->prix }} Fcfa</td>
                <td>{{ $item->service->service_id}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <kkiapay-widget sandbox="true" amount="1" key="140d90edbfc500615a953f33ec4c7a660b93e0a6"
        callback="https://kkiapay-redirect.com" />
</body>
</html>
