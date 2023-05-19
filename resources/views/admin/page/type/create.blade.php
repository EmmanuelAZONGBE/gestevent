<!-- resources/views/type_evenements/create.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>créer un type d'evenement</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('type.index') }}">Liste des type d'evenement</a></li>
                <li class="breadcrumb-item active">créer un type d'evenement</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-end">
            <div class="col-lg-9 mx-lg-auto">
                <div class="card d-flex align-items-center justify-content-center ">
                    <div class="card-body">
                        <h5 class="card-title"> Ajouter un Type D'evenement </h5>
                        <form action="{{ route('type.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="libelle">Nom :</label>
                                    <input type="text" name="libelle" id="libelle" class="form-control"
                                        value="{{ old('libelle') }}" required>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
