@extends('frontend.layouts.app')

@section('content')
    <section class="hero-section" id="section_1">
        <div class="section-overlay"></div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">

                <div class="col-12 mt-auto mb-5 text-center">
                    <small></small>

                    <h1 class="text-white mb-5">TRANSFORMEZ VOTRE VISION D'EVENEMENT EN REALITER</h1>

                        @auth
                            <a id="commencerButton" href="{{ route('frontend_evenements.create') }}" class="btn custom-btn smoothscroll">
                                commencer
                            </a>
                        @endauth

                </div>

                <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                </div>
            </div>
        </div>

        <div class="video-wrap">
            <video autoplay="" loop="" muted="" class="custom-video" poster="">
                <source src="{{ asset('storage/frontend/video/pexels-2022395.mp4') }}" type="video/mp4">

                Your browser does not support the video tag.
            </video>
        </div>
    </section>


    <section class="about-section section-padding" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                    <div class="services-info">
                        <h2 class="text-white mb-4">About GestEvent</h2>

                        <p class="text-white">GestEvent est un platforme de gestion d'événement qui vise à simplifier la
                            planification et lorganisation d'événement professionnels.</p>



                        <p class="text-white">C'est pourquoi nous avons créé une platforme tout-en-un qui permet à nos
                            clients de gérer facilement toutes les étapes de la planification d'un événement,du début à la
                            fin.</p>



                        <p class="text-white">Notre mission est d'aider toute personnes,aussi bien que les entreprises et
                            les organisations à créer des événements mémorables et éfficaces en leurs offrants les outils
                            néccessaires pour leur réussite.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="about-text-wrap">
                        <img src="{{ asset('storage/frontend/images/pexels-alexander-suhorucov-6457579.jpg') }}"
                            class="about-image img-fluid">

                        <div class="about-text-info d-flex">
                            <div class="d-flex">
                                <i class="about-text-icon bi-person"></i>
                            </div>


                            <div class="ms-4">
                                <h3>a happy moment</h3>

                                <p class="mb-0">your amazing festival experience with us</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="artists-section section-padding" id="section_3">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 text-center">
                    <h2 class="mb-4">Nos emplacement de festival</h1>
                </div>
                @foreach ($lieux as $lieu )
                <div class="col-lg-5 col-12">
                    <div class="artists-thumb">
                        <div class="artists-image-wrap">
                            <img src="{{ asset('storage/'.$lieu->photo) }}"class="artists-image img-fluid">
                        </div>

                        <div class="artists-hover">
                            <p>
                                <strong>Nom:</strong>
                                {{ $lieu->nom }}
                            </p>

                            <p>
                                <strong>Prix :</strong>
                                {{ $lieu->prix }}
                            </p>

                            <p>
                                <strong>Description:</strong>
                                {{ $lieu->description }}
                            </p>

                            <p>
                                <strong>Adresse:</strong>
                                {{ $lieu->adresse }}
                            </p>

                            <hr>


                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="schedule-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">GestEvent Programme</h1>

                        <div class="table-responsive">
                            <table class="schedule-table table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>

                                        <th scope="col">Wednesday</th>

                                        <th scope="col">Thursday</th>

                                        <th scope="col">Friday</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">Day 1</th>

                                        <td class="table-background-image-wrap pop-background-image">
                                            <h3>Pop Night</h3>

                                            <p class="mb-2">5:00 - 7:00 PM</p>

                                            <p>By Adele</p>

                                            <div class="section-overlay"></div>
                                        </td>

                                        <td style="background-color: #F3DCD4"></td>

                                        <td class="table-background-image-wrap rock-background-image">
                                            <h3>Rock & Roll</h3>

                                            <p class="mb-2">7:00 - 11:00 PM</p>

                                            <p>By Rihana</p>

                                            <div class="section-overlay"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Day 2</th>

                                        <td style="background-color: #ECC9C7"></td>

                                        <td>
                                            <h3>DJ Night</h3>

                                            <p class="mb-2">6:30 - 9:30 PM</p>

                                            <p>By Rihana</p>
                                        </td>

                                        <td style="background-color: #D9E3DA"></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Day 3</th>

                                        <td class="table-background-image-wrap country-background-image">
                                            <h3>Country Music</h3>

                                            <p class="mb-2">4:30 - 7:30 PM</p>

                                            <p>By Rihana</p>

                                            <div class="section-overlay"></div>
                                        </td>

                                        <td style="background-color: #D1CFC0"></td>

                                        <td>
                                            <h3>Free Styles</h3>

                                            <p class="mb-2">6:00 - 10:00 PM</p>

                                            <p>By Members</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </section>




    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="text-center mb-4">Interested? Let's talk</h2>

                    <nav class="d-flex justify-content-center">
                        <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                            role="tablist">
                            <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-ContactForm" type="button" role="tab"
                                aria-controls="nav-ContactForm" aria-selected="false">
                                <h5>Reclamation Form</h5>
                            </button>

                        </div>
                    </nav>

                    <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                            aria-labelledby="nav-ContactForm-tab">
                            <form class="custom-form contact-form mb-5 mb-lg-0" action="{{ route('frontend_reclamations.store') }}" method="POST"
                                role="form">
                                @csrf
                                <div class="contact-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input placeholder="Entrez une date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ old('date') }}" type="date" name="date" id="date" required>
                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $errors->first('date') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                            value="{{ old('description') }}" type="text" name="description" id="description" required>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                {{ $errors->first('description') }}
                                            </span>
                                        @endif
                                        </div>
                                    </div>

                                    <input placeholder="vôtre message" class="form-control {{ $errors->has('message') ? ' is-invalid' : '' }}"
                                    value="{{ old('message') }}" type="text" name="message" id="message" required>
                                        @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('message') }}
                                    </span>
                                        @endif



                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        <button type="submit" class="form-control">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                            aria-labelledby="nav-ContactMap-tab">
                            <iframe class="google-map"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.469402870927!2d120.94861466021855!3d14.106066818082482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd777b1ab54c8f%3A0x6ecc514451ce2be8!2sTagaytay%2C%20Cavite%2C%20Philippines!5e1!3m2!1sen!2smy!4v1670344209509!5m2!1sen!2smy"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

 </main>
@endsection
