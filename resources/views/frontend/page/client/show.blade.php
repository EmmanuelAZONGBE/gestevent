@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Modifer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Liste des clients</a></li>
                <li class="breadcrumb-item active">Modifer</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="row">
                <div class="col-lg-6">
                    <span>Nom : </span>
                    <span class="fw-600"> {{ $client->first_name}}</span>
                </div>
                <div class="col-lg-6">
                    <span>Prénom(s) : </span>
                    <span class="fw-600"> {{ $client->last_name }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <span>Email : </span>
                    <span class="fw-600"> {{ $client->email }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <span>Adresse : </span>
                    <span class="fw-600"> {{ $client->address }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection
