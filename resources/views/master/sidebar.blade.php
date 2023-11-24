<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{url('dist/img/umg.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Project Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="bi bi-layout-text-window-reverse nav-icon"></i>
              <p>
                Project Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('department-list')
                  <a href="{{route('projects.index')}}" class="nav-link">
                    <i class="bi bi-list-stars nav-icon"></i>
                    <p>projects</p>
                  </a>
                @endcan  
              </li>
            </ul>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-building-gear"></i>
              <p>
                Employee Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('department-list')
                  <a href="{{route('department.index')}}" class="nav-link">
                    <i class="bi bi-buildings nav-icon"></i>
                    <p>department</p>
                  </a>
                @endcan  
              </li>
              <li class="nav-item">
                @can('employee-list')
                  <a href="{{route('employee.index')}}" class="nav-link">
                    <i class="fa fa-users nav-icon" aria-hidden="true"></i>
                    <p>employees</p>
                  </a>
                @endcan  
              </li>
            </ul>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs" aria-hidden="true"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                @can('user-list')
                  <a href="{{route('users.index')}}" class="nav-link">
                    <i class="bi bi-people nav-icon"></i>
                    <p>users</p>
                  </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('role-list')
                  <a href="{{route('role.index')}}" class="nav-link">
                    <i class="fa fa-th-list nav-icon" aria-hidden="true"></i>
                    <p>roles</p>
                  </a>
                @endcan
              </li>
              <li class="nav-item">
                @can('permission-list')
                  <a href="{{route('permissions.index')}}" class="nav-link">
                    <i class="fa fa-gavel nav-icon" aria-hidden="true"></i>
                    <p>permissions</p>
                  </a>
                @endcan
              </li>
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>