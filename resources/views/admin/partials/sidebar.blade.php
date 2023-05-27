  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">


      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link" href="">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li>
          <!-- End Dashboard Nav -->


          @if (auth()->user()?->usertype == 1)
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#client-nav" data-bs-toggle="collapse">
                      <i class="bi bi-person"></i>
                      <span>Client</span>
                      <i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="client-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                      {{-- <li>

                      <a href="{{ route('client.create') }}">
                          <i class="bi bi-circle"></i>
                          <span>Ajouter un client</span>
                      </a>
                  </li> --}}

                      <li>
                          <a href="{{ route('client.index') }}">
                              <i class="bi bi-circle"></i>
                              <span>Liste des clients</span>
                          </a>

                      </li>

                  </ul>
              </li>
          @endif
          <!-- End clients Nav -->



          @if (auth()->user()?->usertype == 1)
              <li class="nav-item">
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
          <!-- End Organisateurs Nav -->




          @if (auth()->user()?->usertype == 1 || organisateurPermission() == true)
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse">
                      <i class="bi bi-bar-chart"></i>
                      <span>Prestataire</span>
                      <i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                      {{-- <li>
                      <a href="{{ route('prestataire.create') }}">
                          <i class="bi bi-circle"></i>
                          <span>Ajouter un prestataire</span>
                      </a>
                  </li> --}}

                      <li>
                          <a href="{{ route('prestataire.index') }}">
                              <i class="bi bi-circle"></i>
                              <span>Listes des prestataire</span>
                      </li>
                  </ul>
              </li>
          @endif
          <!-- End Prestataire Nav -->



          @if (auth()->user()?->usertype == 1 || prestatairePermission() == true || organisateurPermission() == true)
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse">
                      <i class="bi bi-tools"></i>
                      <span>Services</span>
                      <i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                      <li>
                          @if (organisateurPermission() == false && auth()->user()->usertype == 0 )
                              <a href="{{ route('service.create') }}">
                                  <i class="bi bi-circle"></i>
                                  <span>Valider vos service</span>
                              </a>
                          @endif
                      </li>

                      <li>
                          @if (organisateurPermission() == true || prestatairePermission() == true || auth()->user()?->usertype == 1)
                              <a href="{{ route('service.index') }}">
                                  <i class="bi bi-circle"></i>
                                  <span>Liste des services</span>
                              </a>
                          @endif
                      </li>
                  </ul>
              </li>
          @endif
          <!-- End services Nav -->



          @if (auth()->user()?->usertype == 1 || organisateurPermission() == true)
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse">
                      <i class="bi bi-geo-alt"></i>
                      <span>Lieu</span>
                      <i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                      <li>
                          @if (auth()->user()->usertype == 0)
                              <a href="{{ route('lieu.create') }}">
                                  <i class="bi bi-circle"></i>
                                  <span>Ajouter un Lieu</span>
                              </a>
                          @endif
                      </li>
                      <li>
                          <a href="{{ route('lieu.index') }}">
                              <i class="bi bi-circle"></i>
                              <span>Liste des lieux</span>
                          </a>
                      </li>
                  </ul>
              </li>
          @endif
          <!-- End lieux Nav -->



          @if (auth()->user()?->usertype == 1 || organisateurPermission() == true)
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#type-evenement-nav" data-bs-toggle="collapse">
                      <i class="bi bi-tag"></i>
                      <span>Type événement</span>
                      <i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="type-evenement-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="{{ route('type.create') }}">
                              <i class="bi bi-circle"></i>
                              <span>Ajouter un type événement</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('type.index') }}">
                              <i class="bi bi-circle"></i>
                              <span>Liste des types événements</span>
                          </a>
                      </li>
                  </ul>
              </li>
          @endif
          <!-- End types evenement Nav -->



              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
                      <i class="bi bi-calendar-event"></i>
                      <span>Evenement</span>
                      <i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                      <li>
                          @if (clientPermission() == false && organisateurPermission() == false && auth()->user()?->usertype == 0 && prestatairePermission() == false)
                              <a href="{{ route('evenement.create') }}">
                                  <i class="bi bi-circle"></i>
                                  <span>Ajouter un événement</span>
                              </a>
                          @endif
                      </li>
                      <li>
                          @if (clientPermission() == true || organisateurPermission() == true || auth()->user()?->usertype == 1 || prestatairePermission() == true)
                              <a href="{{ route('evenement.index') }}">
                                  <i class="bi bi-circle"></i>
                                  <span>Liste des événements</span>
                              </a>
                          @endif
                      </li>
                  </ul>
              </li>


          <!-- End  evenement Nav -->




          @if (auth()->user()?->usertype == 1 ||
                  clientPermission() == true ||
                  organisateurPermission() == true ||
                  prestatairePermission() == true)
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#reclamation-nav" data-bs-toggle="collapse">
                      <i class="bi bi-exclamation-circle"></i>
                      <span>Réclamation</span>
                      <i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="reclamation-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                      {{-- <li>

                              <a href="{{ route('reclamation.create') }}">
                                  <i class="bi bi-circle"></i>
                                  <span>Ajouter une réclamation</span>
                              </a>

                      </li> --}}
                      <li>

                          <a href="{{ route('reclamation.index') }}">
                              <i class="bi bi-circle"></i>
                              <span>Liste des réclamations</span>
                          </a>

                      </li>
                  </ul>
              </li>
          @endif

          <!-- End  reclamation Nav -->



          <li class="nav-heading">Information personnels</li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('user_profile.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
              </a>
          </li>
          <!-- End Profile Page Nav -->


          {{--  <li class="nav-item">
              <a class="nav-link collapsed" href="pages-contact.html">
                  <i class="bi bi-envelope"></i>
                  <span>Contact</span>
              </a>
          </li>  --}}
          <!-- End Contact Page Nav -->

      </ul>

  </aside>
  <!-- End Sidebar-->
