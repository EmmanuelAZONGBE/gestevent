<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('welcome') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (auth()->user()->urtype ==1)
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#client-nav" data-bs-toggle="collapse">
                    <i class="bi bi-person"></i>
                    <span>Client</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="client-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>

                            <a href="{{ route('client.create') }}">
                                <i class="bi bi-circle"></i>
                                <span>Ajouter un client</span>
                            </a>
                    </li>

                    <li>
                        <a href="{{ route('client.index') }}">
                            <i class="bi bi-circle"></i>
                            <span>Liste des clients{{ Auth::user()->name }}</span>
                        </a>

                    </li>

                </ul>
            </li>
        @endif

        @if (auth()->user()->usertype == 1)
            <li class="nav-item d-none">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse">
                    <i class="bi bi-gem"></i>
                    <span>Organisateur</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                        {{-- <li>
                                <a href="{{ route('organisateur.create') }}">
                                    <i class="bi bi-circle"></i>
                                    <span>Ajouter un organisateur</span>
                                </a>
                        </li> --}}

                    <li>
                        <a href="{{ route('organisateur.index') }}">
                            <i class="bi bi-circle"></i>
                            <span>Liste des organisateurs {{ Auth::user()->name }}</span>
                        </a>
                    </li>

                </ul>
            </li>
        @endif

        @if (clientPermission() == false )
            <li class="nav-item d-none">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse">
                    <i class="bi bi-tools"></i>
                    <span>Services</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @if (prestatairePermission() == true)
                        <li>
                            <a href="{{ route('service.create') }}">
                                <i class="bi bi-circle"></i>
                                <span>Ajouter un service</span>
                            </a>
                        </li>

                    @endif
                    <li>
                        <a href="{{ route('service.index') }}">
                            <i class="bi bi-circle"></i>
                            <span>Liste des services</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="nav-item d-none">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse">
                <i class="bi bi-bar-chart"></i>
                <span>Prestataire</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('prestataire.create') }}">
                        <i class="bi bi-circle"></i>
                        <span>Ajouter un prestataire</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('prestataire.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Listes des prestataire</span>
                </li>
            </ul>
        </li>

        <li class="nav-item d-none">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse">
                <i class="bi bi-geo-alt"></i>
                <span>Lieu</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('lieu.create') }}">
                        <i class="bi bi-circle"></i>
                        <span>Ajouter un Lieu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lieu.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Liste des lieux</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item d-none">
            <a class="nav-link collapsed" data-bs-target="#type-evenement-nav" data-bs-toggle="collapse">
                <i class="bi bi-tag"></i>
                <span>Type d'événement</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="type-evenement-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('type.create') }}">
                        <i class="bi bi-circle"></i>
                        <span>Ajouter un type d'événement</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('type.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Liste des types d'événements</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
                <i class="bi bi-calendar-event"></i>
                <span>Evenement</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                @if (clientPermission() == false )
                    <li>

                            <a href="{{ route('evenement.create') }}">
                                <i class="bi bi-circle"></i>
                                <span>Ajouter un événement</span>
                            </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('evenement.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Liste des événements</span>
                    </a>
                </li>
                @if (organisateurPermission() == true|| auth()->user()->usertype == 1)
                    <li>
                        <a href="{{ url('/enCours') }}">
                            <i class="bi bi-circle"></i>
                            <span>Événements en cours</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/enAttente') }}">
                            <i class="bi bi-circle"></i>
                            <span>Événements en attente</span>
                        </a>
                    </li>
                @endif
            </ul>

        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#reclamation-nav" data-bs-toggle="collapse">
                <i class="bi bi-exclamation-circle"></i>
                <span>Réclamation</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="reclamation-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ route('reclamation.create') }}">
                            <i class="bi bi-circle"></i>
                            <span>Ajouter une réclamation</span>
                        </a>
                    </li>
              
                <li>
                    <a href="{{ route('reclamation.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Liste des réclamations</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profil</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>
</aside>
