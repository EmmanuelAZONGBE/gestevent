<!-- resources/views/lieux/edit.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Editer un Lieu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a >Liste des Lieux</a></li>
                <li class="breadcrumb-item active"><a >Ajouter un Lieu</a></li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="d-flex align-items-center justify-content-center mb-3">
            <div class="card col-lg-6">
                <div class="card-body">
                    <h5 class="card-title">Modifier un Lieux</h5>

                    <form action="{{ route('lieu.update', $lieu->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control"
                                value="{{ $lieu->nom }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-group" for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $lieu->description }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="number" name="prix" id="prix" class="form-control"
                                value="{{ $lieu->prix }}" >
                                <label for="prix">Prix :</label>
                            </div>
                        </div

                        <div class="col-md-12">
                            <label class="form-group" for="photo">Photo :</label>
                            <input type="file" name="photo" id="photo" class="form-control-file">
                            @if ($lieu->photo)
                                <img src="{{ asset('/storage/' . $lieu->photo) }}" alt="Image du lieu" style="width: 100px;">
                            @else
                                Aucune image
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label class="form-group" for="adresse">Adresse</label>
                            <input type="text" name="adresse" id="adresse" class="form-control"
                                value="{{ $lieu->adresse }}">
                        </div>
                        <div class="text center">
                            <button type="submit" class="btn btn-primary">Actualiser</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
