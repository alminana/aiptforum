<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ URL::asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    
    <!-- Sidebar -->
    
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="{{ route('home') }}" class="d-block"> @if(auth()->check() == true)
              {{ Auth::user()->username }}
              @endif</a>
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
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                Users
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show Users</p>
                </a>
              </li>
            </ul>
          </li>        
          <br>

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                methodes
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('methodes.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add methode</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('methodes.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show methodes</p>
                </a>
              </li>
            </ul>
          </li>

          <br>


          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                procedures
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('procedures.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add procedure</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('procedures.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show procedures</p>
                </a>
              </li>
            </ul>
          </li>

          <br>


          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                Associates
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('associates.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add Associate</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('associates.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show Associates</p>
                </a>
              </li>
            </ul>
          </li>

          <br>


          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                Notification
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('notifications.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add Notification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('notifications.notificationall') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show Notifications</p>
                </a>
              </li>
            </ul>
          </li>

          <br> 

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                Applicant
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('applicants.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add Applicant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('applicants.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show Applicants</p>
                </a>
              </li>
            </ul>
          </li>

          <br>

          <br>
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                departments
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('departments.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('departments.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show departments</p>
                </a>
              </li>
            </ul>
          </li>

          <br>

          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                Clients
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('clients.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('clients.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show Clients</p>
                </a>
              </li>
            </ul>
          </li>
          <br>
          <li class="nav-item">
            <a href="#" class="nav-link active">
            <i class="fas fa-user"></i>                        
                <p>
                trademarkstkts
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ route('trademarkstkts.create') }}" class="nav-link">
                <i class="fas fa-user-plus"></i>
                  <p>Add trademarkstkts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('trademarkstkts.index') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show trademarkstkts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('trademarkstkts.request_report') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Show trademarkstkts Report</p>
                </a>
              </li>
            </ul>
          </li>

          <br>

         
          
          <li class="nav-item">
                <a href="{{ route('import-view') }}" class="nav-link">
                <i class="fas fa-user"></i>
                  <p>Import Excel </p>
                </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>