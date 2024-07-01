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
                                    <h3>Connexion</h3>
                                    <p class="mb-4">
                                        Bienvenue sur nôtre page de connexion GestEvent
                                    </p>
                                </div>
                                <form method="POST" action="{{ route('login') }}">

                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Email :</label>
                                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            type="email" name="email" id="email" value="{{ old('email') }}"
                                            required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                {{ $errors->first('email') }}
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

                                    <div class="d-flex mb-5 align-items-center">
                                        <label class="control control--checkbox mb-0"><span class="caption">Remember
                                                me</span>
                                            <input type="checkbox" checked="checked" />
                                            <div class="control__indicator"></div>
                                        </label>
                                        <span class="ml-auto"><a href="#" class="forgot-pass">Forgot
                                                Password</a></span>
                                    </div>

                                    <input type="submit" value="Connexion" class="btn btn-block btn-primary">

                                    <span class="d-block text-left my-4 text-muted"><a href="{{ route('register') }}">&mdash; or Sign Up with &mdash;</a></span>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endsection
