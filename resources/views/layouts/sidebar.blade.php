<!-- Sidebar Menu -->
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



          @if(Auth::user()->role == 'admin')

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Administration
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admins/view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Admins</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/admins/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Admins</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Teachers
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/students/view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Teachers</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('/students/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Teachers</p>
                </a>
              </li>

            </ul>
          </li>
          @endif
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Projects
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/projects/view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View projects</p>
                </a>
              </li>
              @if(Auth::user()->role == 'teacher')
              <li class="nav-item">
                <a href="{{url('/projects/add')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add projects</p>
                </a>
              </li>
             @endif
            </ul>
          </li>


        </ul>

      </nav>
      <!-- /.sidebar-menu -->
