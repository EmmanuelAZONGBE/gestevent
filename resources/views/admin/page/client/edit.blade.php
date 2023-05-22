@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Modifier un client</h1>
    </div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <div class="card col-lg-6">
                <div class="card-body">
                    <h5 class="card-title">Modification un client</h5>

                    <!--  Form -->
                    <form class="row g-3" action="{{ url('/update', $client->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label for="last_name" class="form-label">Nom</label>
                            <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                 type="text" name="last_name"
                                value="{{ $client->user->last_name }}" id="last_name">
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('last_name') }}
                                </span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">Prenom</label>
                            <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                value="{{ $client->user->first_name }}" type="text" name="first_name"
                                id="first_name">
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('first_name') }}
                                </span>
                            @endif
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                                name="email" id="email" value="{{ $client->user->email }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input class="form-control {{ $errors->has('adresse') ? ' is-invalid' : '' }}" type="adresse"
                                name="adresse" id="adresse" value="{{ $client->user->adresse }}">
                            @if ($errors->has('adresse'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('adresse') }}
                                </span>
                            @endif
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Actualiser</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </section>
@endsection
