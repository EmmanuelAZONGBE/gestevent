<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GestEvent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        .data {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mail GestEvent </h1>
        <p>Voici les informations que vous avez envoyées :</p>
        <div class="data">
            <label>Nom :</label>
            <span>{{$data['name']}}</span>
        </div>
        <div class="data">
            <label>Email :</label>
            <span>{{$data['email']}}</span>
        </div>
        <div class="data">
            <label>Message :</label>
            <span>{{$data['message']}}</span>
        </div>
    </div>
</body>
</html>
