<header id="rs-header" class="rs-header">
    <!-- Topbar Area Start -->
    <div class="topbar-area dark-parimary-bg">
        <div class="container">
            <div class="row y-middle">
                <div class="col-md-7">
                    <ul class="topbar-contact">
                        <li>
                            <i class="flaticon-email"></i>
                            <a href="mailto:support@rstheme.com">jargon@gmail.com</a>
                        </li>
                        <li>
                            <i class="flaticon-location"></i>
                           Rue Mhajba 
                        </li>
                    </ul>
                </div>
                <div class="col-md-5 text-right">
                    <ul class="topbar-right">
                        <li class="login-register">
                            <!-- <a href="{{ url('login') }}">Se connecter</a>/ -->
                        </li>
                        <li class="btn-part">
                            @guest
                                <a class="apply-btn" href="{{ url('login') }}">
                                    <i class="fa fa-sign-in"></i>Se connecter
                                </a>
                            @else 
                                <a class="" href="{{ url('profile') }}">
                                    <i class="fa fa-sign-in"></i>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                                </a>
                                <a class="apply-btn" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Déconnecter') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Area End -->

    <!-- Menu Start -->
    <div class="menu-area menu-sticky">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-2">
                    <div class="logo-cat-wrap">
                        <div class="logo-part">
                            <a href="{{ url('/') }}">
                                <img src="http://127.0.0.1:8000/front/assets//images/logo-dark.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 text-right">
                    <div class="rs-menu-area">
                        <div class="main-menu">
                            <div class="mobile-menu">
                                <a class="rs-menu-toggle rs-menu-toggle-close">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                            <nav class="rs-menu rs-menu-close" style="height: 0px;">
                                <ul class="nav-menu">

                                    @guest 
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('/') }}">Accueil</a>
                                    </li>
                                    @else 
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('/home') }}">Accueil</a>
                                    </li>

                                    @endif
                                    @guest 
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('diplomes') }}">Diplômes</a>
                                    </li>
                                    @else 
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('matieres') }}">Matiéres</a>
                                    </li>
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('notes') }}">Notes</a>
                                    </li>
                                    @endif
                                    
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('cours') }}">Cours</a>
                                    </li>

                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('events') }}">Evènement</a>
                                    </li>
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('/formateurs') }}">Formateur</a>
                                    </li>
                                    <li class="menu-item-has-children active">
                                        <a href="{{ url('/contact') }}">Contact</a>
                                    </li>
                                </ul> <!-- //.nav-menu -->
                            </nav>                                         
                        </div> <!-- //.main-menu -->                                
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Menu End --> 

    <!-- Canvas Menu start -->
    
    <!-- Canvas Menu end -->
</header>