@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>créer un reclamation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Liste des reclamations</a></li>
                <li class="breadcrumb-item active">créer un reclamation</li>
            </ol>
        </nav>
    </div>
    <!-- Formulaire d'ajout d'une réclamation -->
    <section class="section">
        <div class="d-flex align-items-center justify-content-end">
            <div class="col-lg-9 mx-lg-auto">
                <div class="card d-flex align-items-center justify-content-center ">
                    <div class="card-body">
                        <h1 class="card-title">Ajouter une réclamation</h1>
                        <form action="{{ route('reclamation.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label for="date" class="date">Date : </label>
                                <input class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ old('date') }}" type="text" name="date" id="date" required>
                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('date') }}
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="message" class="message">Message : </label>
                                <input class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}"
                                    value="{{ old('message') }}" type="text" name="message" id="message" required>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('message') }}
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="description">Description : </label>
                                <input class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    value="{{ old('description') }}" type="text" name="description" id="description" required>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>

                        <a href="{{ route('reclamation.index') }}">Retour à la liste des réclamations</a>

                    </div>
    </section>
@endsection
