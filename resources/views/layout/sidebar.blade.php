<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link reslogo" style="background: radial-gradient(circle, rgba(245,250,255,1) 97%, rgba(63,94,251,1) 100%);border: 4px solid #007bff;">
  <!-- <center><img src="{{ asset('dist/img/orms.png') }}" alt="AdminLTE Logo" style="width:220px;"></center>   -->
  <center><img src="{{ asset('dist/img/orms.png') }}" alt="AdminLTE Logo" style="width:220px;height:30px;"></center>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item menu-open">
          <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <!-- Users -->
        <li class="nav-item {{ Request::is('users*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview" style="border:1px solid #007bff;">
            <li class="nav-item">
              <a href="{{ route('users.create') }}" class="nav-link {{ Request::is('users/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Users</p>
              </a>
            </li>
          </ul>
        </li>
        
        <!-- Groups -->
        <li class="nav-item {{ Request::is('groups*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('groups*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Roles
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="border:1px solid #007bff;">
            <li class="nav-item">
              <a href="{{ route('groups.create') }}" class="nav-link {{ Request::is('groups/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Role</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('groups.index') }}" class="nav-link {{ Request::is('groups') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Roles</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Flores -->
        <li class="nav-item">
          <a href="" class="nav-link {{ Request::is('branches') ? 'active' : '' }}">
            <i class="nav-icon fa fa-building"></i>
            <p>Branches</p>
          </a>
        </li>
        
        <!-- Flores -->
        <li class="nav-item">
          <a href="{{ route('stores.index') }}" class="nav-link {{ Request::is('stores') ? 'active' : '' }}">
            <i class="nav-icon fas fa-store"></i>
            <p>Floors</p>
          </a>
        </li>
        
        <!-- Tables -->
        <li class="nav-item">
          <a href="{{ route('tables.index') }}" class="nav-link {{ Request::is('tables') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>Tables</p>
          </a>
        </li>
        
        <!-- Category -->
        <li class="nav-item">
          <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories') ? 'active' : '' }}">
            <i class="nav-icon fas fa-list"></i>
            <p>Category</p>
          </a>
        </li>
        
        <!-- Products -->
        <li class="nav-item {{ Request::is('products*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Products
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="border:1px solid #007bff;">
            <li class="nav-item">
              <a href="{{ route('products.create') }}" class="nav-link {{ Request::is('products/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Products</p>
              </a>
            </li>
          </ul>
        </li>
        
        <!-- Orders -->
        <li class="nav-item {{ Request::is('orders*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Orders
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="border:1px solid #007bff;">
            <li class="nav-item">
              <a href="{{ route('orders.create') }}" class="nav-link {{ Request::is('orders/create') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('orders.index') }}" class="nav-link {{ Request::is('orders') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Orders</p>
              </a>
            </li>
          </ul>
        </li>
        
        <!-- Reports -->
        <li class="nav-item {{ Request::is('reports*') ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Reports
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="border:1px solid #007bff;">
            <li class="nav-item">
              <a href="{{ route('reports.index') }}" class="nav-link {{ Request::is('reports/product-wise') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Wise</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('reports.index') }}" class="nav-link {{ Request::is('reports/total-store-wise') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Total Store Wise</p>
              </a>
            </li>
          </ul>
        </li>
        
        <!-- Company Info -->
        <li class="nav-item">
          <a href="{{ route('edit_company', ['id' =>  Auth::user()->company_id ]) }}" class="nav-link {{ Request::is('edit_company*') ? 'active' : '' }}">
            <i class="nav-icon fas fa fa-institution"></i>
            <p>Company Info</p>
          </a>
        </li>
        
        <!-- Profile -->
        <li class="nav-item">
          <a href="{{ route('profile.index') }}" class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Profile </p>
          </a>
        </li>
        
        <!-- Setting -->
        <li class="nav-item">
          <a href="{{ route('edit_profile', ['id' =>  Auth::user()->id ]) }}" class="nav-link {{ Request::is('edit_profile*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-gear"></i>
            <p>Setting</p>
          </a>
        </li>
        
        <!-- Logout -->
        <li class="nav-item">
          <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-right-from-bracket"></i>
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


  <style>
    .reslogo:hover {
      transform: scale(1.02); 
    }
  </style>