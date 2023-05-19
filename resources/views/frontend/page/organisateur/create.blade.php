@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>créer  un Organisateur</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a >Liste des Organisateurs</a></li>
            <li class="breadcrumb-item active">créer un Organisateur</li>
        </ol>
    </nav>
</div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-end">
            <div class="col-lg-9 mx-lg-auto">
                <div class="card d-flex align-items-center justify-content-center ">
                    <div class="card-body">
                        <h5 class="card-title"> Ajouter un organisateur </h5>
                        <!--  Form -->
                        <form class="row g-3" action="{{ route('organisateur.store') }}" method="POST"
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
                            <div class="col-md-12">
                                <label for="picture" class="form-label">Photo</label>
                                <input class="form-control {{ $errors->has('picture') ? ' is-invalid' : '' }}"
                                    type="file" name="picture" id="picture" value="{{ old('picture') }}" required>
                                @if ($errors->has('picture'))
                                    <span class="invalid-feedb­ack" role="alert">
                                        {{ $errors->first('picture') }}
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

                            <div class="col-md-6">
                                <label for="disponible" class="form-label">Disponible </label>
                                <input class="form-control {{ $errors->has('disponible') ? ' is-invalid' : '' }}"
                                    type="disponible" name="disponible" id="disponible"value="{{ old('disponible') }}" required>
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
                            <div class="col-md-6">
                                <label for="compagnie" class="form-label">Compagnie </label>
                                <input class="form-control {{ $errors->has('compagnie') ? ' is-invalid' : '' }}"
                                    type="text" name="compagnie" id="compagnie"value="{{ old('compagnie') }}" required>
                                @if ($errors->has('compagnie'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('compagnie') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="adresse_compagnie" class="form-label">Adresse de la compagnie </label>
                                <input class="form-control {{ $errors->has('adresse_compagnie') ? ' is-invalid' : '' }}"
                                    type="text" name="adresse_compagnie"
                                    id="adresse_compagnie"value="{{ old('adresse_compagnie') }}" required>
                                @if ($errors->has('adresse_compagnie'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('adresse_compagnie') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="type_evenement_organiser" class="form-label">Evenement deja Oganiser </label>
                                <input
                                    class="form-control {{ $errors->has('type_evenement_organiser') ? ' is-invalid' : '' }}"
                                    type="text" name="type_evenement_organiser"
                                    id="type_evenement_organiser"value="{{ old('type_evenement_organiser') }}" required>
                                @if ($errors->has('type_evenement_organiser'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('type_evenement_organiser') }}
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

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                        <!-- End  Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
