@extends('layouts.auth_app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('auth_asset/assets/images/undraw_remotely_2j6y.svg') }}" alt="Image"
                        class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Organisateur Up</h3>
                                <p class="mb-4">
                                    Bienvenue sur nôtre page de compte de GestEvent
                                </p>
                            </div>
                            <!--  Form -->
                            <form class="row g-3" action="{{ route('organisateur.storeLogin') }}" method="POST"
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
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="disponible" class="form-label">Disponible </label>
                                    <input class="form-control {{ $errors->has('disponible') ? ' is-invalid' : '' }}"
                                        type="disponible" name="disponible" id="disponible"value="{{ old('disponible') }}"
                                        required>
                                    @if ($errors->has('disponible'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('disponible') }}
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

                                <div class="col-12">
                                    <label for="compagnie" class="form-label">Compagnie </label>
                                    <input class="form-control {{ $errors->has('compagnie') ? ' is-invalid' : '' }}"
                                        type="text" name="compagnie" id="compagnie"value="{{ old('compagnie') }}"
                                        required>
                                    @if ($errors->has('compagnie'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('compagnie') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="adresse_compagnie" class="form-label">Adresse de la compagnie </label>
                                    <input
                                        class="form-control {{ $errors->has('adresse_compagnie') ? ' is-invalid' : '' }}"
                                        type="text" name="adresse_compagnie"
                                        id="adresse_compagnie"value="{{ old('adresse_compagnie') }}" required>
                                    @if ($errors->has('adresse_compagnie'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('adresse_compagnie') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="experience" class="form-label">Experience </label>
                                    <input class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}"
                                        type="number" name="experience" id="experience"value="{{ old('experience') }}"
                                        required>
                                    @if ($errors->has('experience'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('experience') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <label for="type_evenement_organiser" class="form-label">Evenement deja Oganiser
                                    </label>
                                    <input
                                        class="form-control {{ $errors->has('type_evenement_organiser') ? ' is-invalid' : '' }}"
                                        type="text" name="type_evenement_organiser"
                                        id="type_evenement_organiser"value="{{ old('type_evenement_organiser') }}"
                                        required>
                                    @if ($errors->has('type_evenement_organiser'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('type_evenement_organiser') }}
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
                                <div class="col-md-12">
                                    <label for="password_confirmation">Confirmer mots de passe :</label>
                                    <input placeholder="confirmation de mots de passe"
                                        class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        type="password" name="password_confirmation" id="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot
                                            Password</a></span>
                                </div>

                                <input type="submit" value="Log Up" class="btn btn-block btn-primary">

                                <span class="d-block text-left my-4 text-muted"><a href="{{ route('register') }}">&mdash; or login with &mdash;</a></span>

                                <div class="social-login">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
