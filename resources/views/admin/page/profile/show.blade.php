@extends('admin.layouts.app')

@section('content')
    <div class="tab-content pt-2">
        <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">A propos</h5>
            <h5 class="card-title">Profile Details</h5>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Nom</div>
                <div class="col-lg-9 col-md-8">{{ $user->last_name }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Prenom</div>
                <div class="col-lg-9 col-md-8">{{ $user->first_name }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Adresse</div>
                <div class="col-lg-9 col-md-8">{{ $user->adresse }}</div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Photo</div>
                <div class="col-lg-9 col-md-8">{{ $user->picture }}</div>
            </div>
        </div>
    </div>
@endsection
