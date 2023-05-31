@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Liste des paniers</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"></li>
            <li class="breadcrumb-item active">Liste des paniers</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="container">
        <h1>Informations de l'événement</h1>
        
        <h2> Envoie de message à {{ $paniers->user->last_name }}</h2>
</section>
@endsection
