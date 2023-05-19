@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>créer un reclamation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Liste des reclamations</a></li>
                <li class="breadcrumb-item active">Liste un reclamation</li>
            </ol>
        </nav>
    </div>
    <!-- Formulaire de modification d'une réclamation -->
    <section class="section">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <div class="card col-lg-6">
                <div class="card-body">
                    <h5 class="card-title">Modifier une réclamation</h5>

                    <form action="{{ route('reclamation.update', $reclamation) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="date">Date:</label>
                            <input type="text" id="date" name="date" value="{{ $reclamation->date }}">
                        </div>
                        <div>
                            <label for="message">Message:</label>
                            <input type="text" id="message" name="message" value="{{ $reclamation->message }}">
                        </div>
                        <div>
                            <label for="description">Description:</label>
                            <textarea id="description" name="description">{{ $reclamation->description }}</textarea>
                        </div>
                        <div>
                            <button type="submit">Modifier</button>
                        </div>
                    </form>

                    <a href="{{ route('reclamation.index') }}">Retour à la liste des réclamations</a>


    </section>
@endsection
