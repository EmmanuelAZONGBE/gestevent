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
                                <h3>Sign Up</h3>
                                <p class="mb-4">
                                    Bienvenue sur nôtre page de creaction de compte GestEvent
                                </p>
                            </div>
                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">

                                @csrf
                                <label for="status">Enregistrez vous en temps que :</label>
                                <div>
                                    <p>
                                        <label for="client">Evenementier </label>
                                        <input type="radio" name="status" id="client" value="client">
                                    </p>
                                    <p>
                                        <label for="prestataire">Prester </label>
                                        <input type="radio" name="status" id="prestataire" value="prestataire">
                                    </p>
                                    <p>
                                        <label for="organisateur">Organisateur </label>
                                        <a href="{{ route('organisateurform') }}" style='padding:5px;'><input type="radio"
                                                name="status" id="organisateur" value="organisateur"></a>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Nom :</label>
                                    <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                        value="{{ old('last_name') }}" type="text" name="last_name" id="last_name"
                                        value="{{ old('last_name') }}" required>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('last_name') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="first_name">Prenom :</label>
                                    <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                        value="{{ old('first_name') }}" type="text" name="first_name" id="first_name"
                                        value="{{ old('first_name') }}" required>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('first_name') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo :</label>
                                    <input accept="image/png, image/jpeg, image/jpg," class="form-control {{ $errors->has('photo') ? ' is-invalid' : '' }}"
                                        value="{{ old('photo') }}" type="file" name="photo" id="photo"
                                        value="{{ old('photo') }}" required>
                                    @if ($errors->has('photo'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('photo') }}
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        type="email" name="email" id="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="adresse">Adresse :</label>
                                    <input class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}"
                                        type="adresse" name="adresse" id="adresse"value="{{ old('adresse') }}" required>
                                    @if ($errors->has('adresse'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('adresse') }}
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group mb-4">
                                    <label for="password">Mots de passe :</label>
                                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        type="password" name="password" id="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-4">
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

                                <span class="d-block text-left my-4 text-muted" ><a href="{{ route('login') }}">&mdash; or login with &mdash;</a></span>

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
