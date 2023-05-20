@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Edite un prestataire</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a >Ajouter des prestataires</a></li>
                <li class="breadcrumb-item active"><a >Edite un prestataire</a></li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <div class="card col-lg-6">
                <div class="card-body">
                    <h5 class="card-title">Modifier un prestataire</h5>

                <!--  Form -->
                <form class="row g-3" action="{{ url('/update', $prestataire) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <label for="last_name" class="form-label">Nom </label>
                        <input class="form-control " value="{{ $prestataire->last_name }}" type="text" name="last_name"
                            id="last_name">

                    </div>
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">Prenom</label>
                        <input class="form-control " value="{{ $prestataire->first_name }}" type="text" name="first_name"
                            id="first_name">

                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control " type="email" name="email" id="email"
                            value="{{ $prestataire->email }}">

                    </div>
                    <div class="col-md-6">
                        <label for="societer" class="form-label">Sociéter : </label>
                        <input class="form-control " value="{{ $prestataire->societer }}" type="text" name="first_name"
                        id="societer">

                    <div class="col-12">
                        <label for="adresse" class="form-label">Address </label>
                        <input class="form-control " type="text" name="adresse" id="adresse"
                            value="{{ $prestataire->adresse }}">

                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mots de passe</label>
                        <input class="form-control" type="password" name="password" id="password">

                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Actualiser</button>
                    </div>
                </form>
                <!-- End  Form -->
            </div>
        </div>
    </section>
@endsection
