<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
            <img src="admin/assets/img/new_logo.png" alt="">
            <span class="d-none d-lg-block">GestEventAdmin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn">

        </i>
    </div>
    <!-- End Logo -->
    {{--
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <!-- End Search Bar -->  --}}

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>

            <!-- End Search Icon-->

            {{-- <li class="nav-item dropdown">

           <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">1</span>
          </a>

          <!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 1 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>
          </ul>
          <!-- End Notification Dropdown Items -->

        </li>
        <!-- End Notification Nav -->  --}}

            <li class="nav-item dropdown">

                {{-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">1</span>
          </a>
          <!-- End Messages Icon -->  --}}

                {{-- <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 1 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>

          </ul>
          <!-- End Messages Dropdown Items -->  --}}



            </li>
            <!-- End Messages Nav -->
            @if (
                (clientPermission() == false && organisateurPermission() == true) ||
                    (auth()->user()?->usertype == 0 && prestatairePermission() == false))
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" data-bs-toggle="dropdown">
                        <i class="bi bi-bag"></i>
                        <span class="badge bg-primary badge-number">

                            {{ cart() }}

                        </span>
                    </a>
                    <!-- End Cart Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow cart">
                        <li class="dropdown-header">
                            Vous avez

                            {{ cart() }}

                            services dans votre panier
                            <a href="{{ route('paniers.index') }}"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">Voie Panier</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>

                    <!-- End Cart Dropdown Items -->
                </li>
            @endif

            <li class="nav-item dropdown pe-3">
                @auth
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ Storage::url(Auth::user()->photo) }}" alt="Profile" class="rounded-circle ">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->last_name }}
                            {{ Auth::user()->first_name }}</span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->last_name }}{{ Auth::user()->first_name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('user_profile.index') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>



                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                @endauth

            </li>
            <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
