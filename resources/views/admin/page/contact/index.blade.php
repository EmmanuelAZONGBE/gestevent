<!-- contact/index.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <h1>Contactez-nous</h1>

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf

        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="message">Message :</label>
            <textarea id="message" name="message"></textarea>
        </div>

        <button type="submit">Envoyer</button>
    </form>
@endsection
