<!-- resources/views/lieux/create.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Ajouter un Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a >Liste des Lieux</a></li>
                <li class="breadcrumb-item active">Ajouter un Lieu</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="d-flex align-items-center justify-content-end">
            <div class="col-lg-9 mx-lg-auto">
                <div class="card d-flex align-items-center justify-content-center ">
                    <div class="card-body">
                        <h1 class="card-title">Ajouter un lieu</h1>
                        <div class="table-responsive border-0 rounded-3">
                            <form class="row g-3" action="{{ route('lieu.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="nom" id="nom" class="form-control"
                                            value="{{ old('nom') }}" required>
                                        <label for="nom">Nom</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="picture" class="form-label">Photo</label>
                                    <input class="form-control {{ $errors->has('picture') ? ' is-invalid' : '' }}" type="file"
                                        name="picture" id="picture" value="{{ old('picture') }}" required>
                                    @if ($errors->has('picture'))
                                        <span class="invalid-feedb­ack" role="alert">
                                            {{ $errors->first('picture') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="adresse" id="adresse" class="form-control"
                                            value="{{ old('adresse') }}">
                                        <label for="adresse">Adresse</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
