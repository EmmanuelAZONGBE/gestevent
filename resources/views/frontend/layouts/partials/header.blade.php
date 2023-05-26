            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" methode="POST" href="{{url('welcome')}}">
                        GestEvent
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center ms-auto me-lg-5">
                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_1"> Accueil </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_2"> A propos </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_3"> Lieu </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_4"> Progamme </a>
                            </li>

                            @if (Route::has('login'))

                            @auth

                            <li class="nav-item">
                                <a class="nav-link click-scroll" href="#section_6"> Reclamation </a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ url('/redirect')}}"> Dash </a>
                            </li>


                            <li class="nav-item">
                                <a class="btn btn-rouned btn-info" id="logincss" href="{{ url('/logout')}}"> Log Out </a>
                            </li>

                            @else

                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}"> Login </a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}"> Register </a>
                            </li>
                            @endauth

                            @endif

                        </ul>
                    </div>
                </div>
            </nav>
