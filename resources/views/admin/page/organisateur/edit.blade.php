@extends('admin.layouts.app')

@section ('content')
<div class="pagetitle">
    <h1>Editer un organisateur</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a  >Ajouter des organisateurs</a></li>
            <li class="breadcrumb-item active"><a  >Liste un organisateur</a></li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="card col-lg-6">
            <div class="card-body">
                <h5 class="card-title">Modifier un organisateur</h5>
<!--  Form -->
          <form action="{{ url('/update', $organisateur->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="col-md-12">
              <label for="last_name" class="form-label">Nom </label>
              <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : ''}}" value="{{ old('last_name') ?? $organisateur->last_name }}"  type="text" name="last_name" id="last_name">
              @if ($errors->has('last_name'))
                  <span class="invalid-feedback" role="alert">
                      {{ $errors->first('last_name') }}
                  </span>
              @endif
            </div>
            <div class="col-md-6">
              <label for="first_name" class="form-label">Prenom</label>
              <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : ''}}" value="{{ old('first_name') ?? $organisateur->first_name }}"  type="text" name="first_name" id="first_name">
            @if ($errors->has('first_name'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('first_name') }}
                </span>
            @endif
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input class="form-control {{ $errors->has('email') ? ' is-invalid' : ''}}" type="email" value="{{ old('email') ?? $organisateur->email }}" name="email" id="email" >
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
            </div>

            <div class="col-12">
              <label for="adresse" class="form-label">Adresse </label>
              <input class="form-control {{ $errors->has('adresse') ? ' is-invalid' : ''}}" type="adresse" value="{{ old('adresse') ?? $organisateur->adresse }}" name="adresse" id="adresse">
                  @if ($errors->has('adresse'))
                      <span class="invalid-feedback" role="alert">
                          {{ $errors->first('adresse') }}
                      </span>
                  @endif
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Mots de passe</label>
              <input class="form-control {{ $errors->has('password') ? ' is-invalid' : ''}}" type="password" value="{{ old('password') ?? $organisateur->password }}" name="password" id="password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
            </div>
            <div class="col-md-6">
              <label for="compagnie" class="form-label">Compagnie </label>
                  <input class="form-control {{ $errors->has('compagnie') ? ' is-invalid' : ''}}" type="text"  name="compagnie" id="compagnie" value="{{old('compagnie')?? $organisateur->compagnie}}">
                  @if ($errors->has('compagnie'))
                      <span class="invalid-feedback" role="alert">
                          {{ $errors->first('compagnie') }}
                      </span>
                  @endif
            </div>
            <div class="col-md-6">
              <label for="adresse_compagnie" class="form-label">Adresse de la compagnie </label>
                  <input class="form-control {{ $errors->has('adresse_compagnie') ? ' is-invalid' : ''}}" type="text"  name="adresse_compagnie" id="adresse_compagnie" value="{{old('adresse_compagnie')?? $organisateur->adresse_compagnie}}">
                  @if ($errors->has('adresse_compagnie'))
                      <span class="invalid-feedback" role="alert">
                          {{ $errors->first('adresse_compagnie') }}
                      </span>
                  @endif
            </div>
            <div class="col-md-6">
              <label for="type_evenement_organiser" class="form-label">Evenement deja Oganiser </label>
                  <input class="form-control {{ $errors->has('type_evenement_organiser') ? ' is-invalid' : ''}}" type="text"  name="type_evenement_organiser" id="type_evenement_organiser"  value="{{old('type_evenement_organiser')?? $organisateur->type_evenement_organiser}}">
                  @if ($errors->has('type_evenement_organiser'))
                      <span class="invalid-feedback" role="alert">
                          {{ $errors->first('type_evenement_organiser') }}
                      </span>
                  @endif
            </div>

            <div class="col-md-12">
              <label for="experience" class="form-label">Experience </label>
                  <input class="form-control {{ $errors->has('experience') ? ' is-invalid' : ''}}" type="number" name="experience" id="experience"  value="{{old('experience')?? $organisateur->experience}}">
                  @if ($errors->has('experience'))
                      <span class="invalid-feedback" role="alert">
                          {{ $errors->first('experience') }}
                      </span>
                  @endif
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
