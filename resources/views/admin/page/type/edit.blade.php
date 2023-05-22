<!-- resources/views/type_evenements/edit.blade.php -->

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
                    <h5 class="card-title">Modifier un type d'évènement</h5>

                    <form action="{{ url('type.update', $typeevenement) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="date">Libelle:</label>
                            <input type="text" id="libelle" name="libelle" value="{{ $typeevenement->libelle }}">
                        </div>
                        <div>
                            <button type="submit">Modifier</button>
                        </div>
                    </form>

                    <a href="{{ route('type.index') }}">Retour à la liste des évènements</a>
                </div>
            </div>
        </div>
    </section>
@endsection
