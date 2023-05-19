@extends('frontend.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Enregistrer vous en temps que prestataire</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a >prestataires</a></li>
                <li class="breadcrumb-item active">Enregistrer vous en temps que prestataire</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-end">
            <div class="col-lg-9 mx-lg-auto">
                <div class="card d-flex align-items-center justify-content-center ">
                    <div class="card-body">
                        <h5 class="card-title"> Remplissze les informations  </h5>

                        <!--  Form -->
                        <form class="row g-3" action="{{ route('prestataire.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Nom </label>
                                <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    value="{{ old('last_name') }}" type="text" name="last_name" id="last_name"
                                     required>
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('last_name') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Prenom</label>
                                <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    value="{{ old('first_name') }}" type="text" name="first_name" id="first_name"
                                     required>
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('first_name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="col-6">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                                    name="email" id="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <div class="col-6">
                                <label for="adresse" class="form-label">Address </label>
                                <input class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}"
                                    type="adresse" name="adresse" id="adresse"value="{{ old('adresse') }}" required>
                                @if ($errors->has('adresse'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('adresse') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Mots de passe</label>
                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    type="password" name="password" id="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Valider votres formulaire de demandes</button>
                            </div>
                        </form>
                        <!-- End  Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
