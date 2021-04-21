<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Cours en ligne</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nom  }} {{ Auth::user()->prenom }} </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item">
        <div class="search-title">
          <b class="text-light"></b>N<b class="text-light"></b>o<b class="text-light"></b> <b class="text-light"></b>e<b class="text-light"></b>l<b class="text-light"></b>e<b class="text-light"></b>m<b class="text-light"></b>e<b class="text-light"></b>n<b class="text-light"></b>t<b class="text-light"></b> <b class="text-light"></b>f<b class="text-light"></b>o<b class="text-light"></b>u<b class="text-light"></b>n<b class="text-light"></b>d<b class="text-light"></b>!<b class="text-light"></b>
        </div>
        <div class="search-path">
          
        </div>
      </a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="{{ url('home') }}" class="nav-link @if(Request::is('home')) active @endif">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Acceuil
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>
          <li class="nav-item">
            <a href="{{ url('admin/formateurs') }}" class="nav-link @if(Request::is('admin/formateurs*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les formateurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/diplomes') }}" class="nav-link @if(Request::is('admin/diplomes*')) active @endif">
              <i class="fas fa-twitter"></i>
              <p>
                Gérer les diplômes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/events') }}" class="nav-link @if(Request::is('admin/events*')) active @endif">
              <i class="fas fa-twitter"></i>
              <p>
                Gérer les évènements
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/cours') }}" class="nav-link @if(Request::is('admin/cours*')) active @endif">
              <i class="fas fa-twitter"></i>
              <p>
                Gérer les cours
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/matieres') }}" class="nav-link @if(Request::is('matieres*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les matiéres
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/examens') }}" class="nav-link @if(Request::is('examens*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les examens
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('admin/stagiaires') }}" class="nav-link @if(Request::is('stagiaires*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les stagiaires
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link @if(Request::is('admin/users*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les insrciptions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/abscences') }}" class="nav-link @if(Request::is('abscences*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les abscences
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/emplois') }}" class="nav-link @if(Request::is('emplois*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les emplois
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/contacts') }}" class="nav-link @if(Request::is('contacts*')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gérer les contacts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
            <!-- <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> -->
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>