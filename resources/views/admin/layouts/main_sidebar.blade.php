<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home.index') }}" class="brand-link">
      {{-- <img src="{{asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">--}}
      <h3>MyShop<blod class="brand-text font-weight-light"  style="font-size:30px; color: #f8b806e5;"> Ro</blod></h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="font-size: 25px; color:white">
        <div class="image">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div> --}}
        <div class="user-panel mt-2 pb-3 mb-2 d-flex" style="font-size: 25px; color:white">
        <a href="#" class="nav-link">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span>
                {{ Auth::user()->fname}} {{ Auth::user()->lname}}
            </span>
          </a>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <li class="nav-item">
                    <a href="{{ route('dashboard')}}" class="nav-link {{ $route=='dashboard' ? 'active' : ''}}">
                        <i class="nav-icon fa fa-tachomete" aria-hidden="true"></i>
                      <p>
                        Dashboard
                      </p>
                    </a>
                </li>
          <li class="nav-item">
            <li class="nav-item">
                <a href="{{ route('categories.index')}}" class="nav-link {{ $route=='categories' ? 'active' : ''}}">
                  <i class="nav-icon fa fa-tags" style="color: white" aria-hidden="true"></i>
                  <p>
                    Categories
                  </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('products.index')}}" class="nav-link {{ $route=='products' ? 'active' : ''}}">
              <i class="nav-icon fa fa-cubes" aria-hidden="true"></i>
              <p>
                Prodacts
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('orders.index')}}" class="nav-link {{ $route=='orders' ? 'active' : ''}}">
              <i class="nav-icon fa fa-list-alt" aria-hidden="true"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index')}}" class="nav-link  {{ $route=='users' ? 'active' : ''}}">
            <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>
                Customers
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
