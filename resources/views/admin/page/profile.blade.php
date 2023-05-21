@extends('admin.layouts.app')

@section ('content')
<div class="pagetitle">
    <h1>Profil de l'utilisateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
        <li class="breadcrumb-item active">Profil de l'utilisateur</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ Storage::url($user->photo) }}" alt="Profile" class="rounded-circle ">
            <h2>{{ $user->prenom }} {{ $user->nom }} </h2>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Detail  du profil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer le profil</button>
              </li>

              @if ($user->organisateur)
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#organisateur-edit">Editer l'organisateur</button>
                </li>
              @endif

              
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer le mot de passe</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
               
                <h5 class="card-title">Profil Detail</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nom </div>
                  <div class="col-lg-9 col-md-8"> {{ $user->nom }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Prenom(s)</div>
                    <div class="col-lg-9 col-md-8">{{ $user->prenom }}</div>
                  </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ $user->telephone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="{{ route('user_profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                 
                
                    <div class="row mb-3">
                        <label for="photo" class="col-md-4 col-lg-3 col-form-label">Photo de profil</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="photo" type="file" class="{{ $errors->has('photo') ? ' is-invalid' : '' }}  form-control" id="photo" >
                          @if ($errors->has('photo'))
                              <span class="invalid-feedback" role="alert">
                                  {{ $errors->first('photo') }}
                              </span>
                          @endif
                        </div>
                    </div>
                  <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="last_name" type="text" class="{{ $errors->has('last_name') ? ' is-invalid' : '' }}  form-control" id="last_name" value="{{ $user->nom }}">
                      @if ($errors->has('last_name'))
                          <span class="invalid-feedback" role="alert">
                              {{ $errors->first('last_name') }}
                          </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-lg-3 col-form-label">Prenoms</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="first_name" type="text" class="{{ $errors->has('first_name') ? ' is-invalid' : '' }}  form-control" id="first_name" value="{{ $user->prenom }}">
                      @if ($errors->has('first_name'))
                          <span class="invalid-feedback" role="alert">
                              {{ $errors->first('first_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="{{ $errors->has('phone') ? ' is-invalid' : '' }} form-control" id="phone" value="{{ $user->telephone}}">
                      @if ($errors->has('phone'))
                          <span class="invalid-feedback" role="alert">
                              {{ $errors->first('phone') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }} form-control" id="email" value="{{  $user->email }}">
                      @if ($errors->has('email'))
                          <span class="invalid-feedback" role="alert">
                              {{ $errors->first('email') }}
                          </span>
                      @endif
                    </div>
                  </div>


                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enregistrer les changement</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>
              @if ($user->organisateur)
                <div class="tab-pane fade profile-edit pt-3" id="organisateur-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{ route('user_profile.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                  
                  
                     
                    <div class="row mb-3">
                      <label for="disponible" class="col-md-4 col-lg-3 col-form-label">Disponible</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="disponible" type="text" class="{{ $errors->has('disponible') ? ' is-invalid' : '' }}  form-control" id="disponible" value="{{ $user->organisateur->disponible }}">
                        @if ($errors->has('disponible'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('disponible') }}
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="compagnie" class="col-md-4 col-lg-3 col-form-label">Compagnie</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="compagnie" type="text" class="{{ $errors->has('compagnie') ? ' is-invalid' : '' }}  form-control" id="compagnie" value="{{ $user->organisateur->compagnie }}">
                        @if ($errors->has('compagnie'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('compagnie') }}
                            </span>
                        @endif
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="adresse_compagnie" class="col-md-4 col-lg-3 col-form-label">Adresse compagnie</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adresse_compagnie" type="text" class="{{ $errors->has('adresse_compagnie') ? ' is-invalid' : '' }} form-control" id="adresse_compagnie" value="{{ $user->organisateur->adresse_compagnie }}">
                        @if ($errors->has('adresse_compagnie'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('adresse_compagnie') }}
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="type_evenement_organiser" class="col-md-4 col-lg-3 col-form-label">Evénéments déjà organisés</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="type_evenement_organiser" type="text" class="{{ $errors->has('type_evenement_organiser') ? ' is-invalid' : '' }} form-control" id="type_evenement_organiser" value="{{ $user->organisateur->type_evenement_organiser }}">
                        @if ($errors->has('type_evenement_organiser'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('type_evenement_organiser') }}
                            </span>
                        @endif
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="experience" class="col-md-4 col-lg-3 col-form-label">Nombre d'années d'expérience</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="experience" type="number" class="{{ $errors->has('experience') ? ' is-invalid' : '' }} form-control" id="experience" value="{{ $user->organisateur->experience }}">
                        @if ($errors->has('experience'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('experience') }}
                            </span>
                        @endif
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Enregistrer les changement</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
              @endif
    
              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="{{ route('user_profile.store')}}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }} form-control" id="password">
                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              {{ $errors->first('password') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirmer mot de passe</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password_confirmation" type="password" class="{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }} form-control" id="password_confirmation">
                      @if ($errors->has('password_confirmation'))
                          <span class="invalid-feedback" role="alert">
                              {{ $errors->first('password_confirmation') }}
                          </span>
                      @endif
                    </div>
                  </div>


                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Changer le mot de passe </button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection