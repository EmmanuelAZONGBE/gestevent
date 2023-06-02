<!-- contact/index.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="text-center">
    <h1>Contactez-nous</h1>
</div>

<section class="section">

    <div class="card-body">
        <form method="POST" action="{{ route('contact.send') }}" class="row g-3">
            @csrf
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" required>
                    <label for="name">Nom </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                    <label for="email">Email :</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Message" id="message" name="message" style="height: 100px;"></textarea>
                    <label for="message">Message </label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>

        </form>
    </div>
    </div>
</section>

@endsection
