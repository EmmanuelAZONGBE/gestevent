@extends('admin.layouts.app')

@section ('content')
<div class="pagetitle">
    <h1>créer un service</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Listes des services</a></li>
            <li class="breadcrumb-item active">créer un service</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="d-flex align-items-center justify-content-end">
        <div class="col-lg-9 mx-lg-auto">
            <div class="card d-flex align-items-center justify-content-center ">
                <div class="card-body">
                    <h5 class="card-title">Ajout des services</h5>
                    <!-- services-->
                    <form class="row g-3" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nom_service" placeholder="nom du servie" name="nom_service" required>
                                <label for="nom_service">Nom service :</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea type="text" class="form-control" placeholder="descriptions du service" id="descriptions" name="descriptions" style="height: 100px;"></textarea>
                                <label for="descriptions">Description :</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="number" class="form-control" placeholder="le prix du service proposer" id="prix" name="prix" required>
                                <label for="prix">Prix :</label>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
