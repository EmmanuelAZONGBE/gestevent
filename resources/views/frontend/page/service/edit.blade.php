@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Editer un service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('service.create') }}">Ajouter des services</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('service.index') }}">Liste des service</a></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row ">
            <div class="col-lg-6 mx-lg-auto">

                <div class="card bg-transparent border rounded-3">
                    <div class="card-header bg-transparent border-bottom">
                        <h5 class="card-title">Modifier des services</h5>
                        <!-- services-->
                        <form class="row g-3" action="{{ route('service.update', $service) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nom_service" placeholder="nome servie"
                                        name="nom_service" value="{{ $service->nom_service }}">
                                    <label for="nom_service">Nom service</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Address" id="descriptions" style="height: 100px;">{{ $service->descriptions }}</textarea>
                                    <label for="descriptions">Description</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <label class="toggle-switch toggle-switch-dark">
                                        <input name="etat" type="checkbox" @checked($service->etat)>
                                        <span class="toggle-slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Actualiser</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
