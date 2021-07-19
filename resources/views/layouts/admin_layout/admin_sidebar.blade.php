<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/admin_images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ecom 8</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- Dashboard -->     
          @if(Session::get('page')=="dashboard")
            <?php $active = "active"; ?>
          @else
            <?php $active = ""; ?>
          @endif     
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
            </a>
          </li> 
          
           <!-- Settings -->
          @if(Session::get('page')=="settings" || Session::get('page')=="update-admin-details")
           <?php $active = "active"; ?>
          @else
           <?php $active = ""; ?>
          @endif   
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="settings")
               <?php $active = "active"; ?>
              @else
               <?php $active = ""; ?>
              @endif  
              <li class="nav-item">
                <a href="{{ url('admin/settings') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Password</p>
                </a>
              </li>
              @if(Session::get('page')=="update-admin-details")
               <?php $active = "active"; ?>
              @else
               <?php $active = ""; ?>
              @endif  
              <li class="nav-item">
                <a href="{{ url('admin/update-admin-details') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Details</p>
                </a>
              </li>
            </ul>
          </li>
         
          <!-- Catalogues -->
          @if(Session::get('page')=="sections" || Session::get('page')=="categories" || Session::get('page')=="brands" || Session::get('page')=="products" || Session::get('page')=="banners" )
           <?php $active = "active"; ?>
          @else
           <?php $active = ""; ?>
          @endif   
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ $active }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Catalogues
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="sections")
                <?php $active = "active"; ?>
              @else
                <?php $active = ""; ?>
              @endif  
              <li class="nav-item">
                <a href="{{ url('admin/sections') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>
              @if(Session::get('page')=="brands")
                <?php $active = "active"; ?>
              @else
                <?php $active = ""; ?>
              @endif  
              <li class="nav-item">
                <a href="{{ url('admin/brands') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              @if(Session::get('page')=="categories")
                <?php $active = "active"; ?>
              @else
                <?php $active = ""; ?>
              @endif  
              <li class="nav-item">
                <a href="{{ url('admin/categories') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              @if(Session::get('page')=="products")
                <?php $active = "active"; ?>
              @else
                <?php $active = ""; ?>
              @endif  
              <li class="nav-item">
                <a href="{{ url('admin/products') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              @if(Session::get('page')=="banners")
                <?php $active = "active"; ?>
              @else
                <?php $active = ""; ?>
              @endif  
              <li class="nav-item">
                <a href="{{ url('admin/banners') }}" class="nav-link {{ $active }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
            </ul>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>