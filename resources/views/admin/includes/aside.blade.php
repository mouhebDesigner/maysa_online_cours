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
              <i class="nav-icon fas fa-search fa-fw"></i>
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
            @if(Auth::user()->grade == 'admin')
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{ url('home') }}" class="nav-link @if(Request::is('home')) active @endif">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Acceuil
                    
                  </p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ url('admin/formateurs') }}" class="nav-link @if(Request::is('admin/formateurs*')) active @endif">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                  Gérer les formateurs
                  
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/stagiaires') }}" class="nav-link @if(Request::is('admin/stagiaires*')) active @endif">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                  Gérer les stagiaires
                  
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/users') }}" class="nav-link @if(Request::is('admin/users*')) active @endif">
                <i class="nav-icon fas fa-registered"></i>
                <p>
                  Gérer les insrciptions
                  
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/diplomes') }}" class="nav-link @if(Request::is('admin/diplomes*')) active @endif">
                <i class="nav-icon fas fa-certificate"></i>
                <p>
                  Gérer les diplômes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/classes') }}" class="nav-link @if(Request::is('admin/classes*')) active @endif">
                <i class="nav-icon fas fa-certificate"></i>
                <p>
                  Gérer les classes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/events') }}" class="nav-link @if(Request::is('admin/events*')) active @endif">
                <i class="nav-icon fas fa-calendar-week"></i>
                <p>
                  Gérer les évènements
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/cours') }}" class="nav-link @if(Request::is('admin/cour*')) active @endif">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Gérer les cours
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/matieres') }}" class="nav-link @if(Request::is('admin/matieres*')) active @endif">

                <i class="nav-icon fas fa-file-alt"></i>

                <p>
                  Gérer les matiéres
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ url('admin/seances') }}" class="nav-link @if(Request::is('admin/seances*')) active @endif">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Gérer les séances
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ url('admin/contacts') }}" class="nav-link @if(Request::is('admin/contacts*')) active @endif">
                <i class="nav-icon fas fa-envelope-open-text"></i>
                <p>
                  Gérer les contacts
                </p>
              </a>
            </li>
            @else 
              <li class="nav-item">
                <a href="{{ url('enseignant/matieres') }}" class="nav-link @if(Request::is('enseignant/matieres*')) active @endif">
                  <i class="nav-icon fas fa-align-left"></i>
                  <p>
                    Consulter les matières
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('enseignant/examens') }}" class="nav-link @if(Request::is('enseignant/examens*')) active @endif">
                  <i class="nav-icon fas fa-align-left"></i>
                  <p>
                    Gérer les examens
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('enseignant/seances') }}" class="nav-link @if(Request::is('enseignant/seances*')) active @endif">
                  <i class="nav-icon fas fa-align-left"></i>
                  <p>
                    Consulter les seances
                  </p>
                </a>
              </li>
            @endif
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>