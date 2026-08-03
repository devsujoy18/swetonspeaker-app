<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
      <img src="{{ asset('admin_assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin_assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if(Auth::check())
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          @else
            Guest
          @endif
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
            <li class="nav-item">
                <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('keyfeature*') 
              || request()->is('mountinginfo*') 
              || request()->is('specification*') 
              || request()->is('tsparameter*')
              || request()->is('reconkit*') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ request()->is('keyfeature*') 
                || request()->is('mountinginfo*') 
                || request()->is('specification*') 
                || request()->is('tsparameter*')
                || request()->is('reconkit*') ? 'active' : '' }}">
                  <i class="nav-icon fa fa-tasks"></i>
                  <p>Masters<i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ route('keyfeature.index') }}" class="nav-link {{ request()->is('keyfeature*') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Keyfeatures</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('mountinginfo.index') }}" class="nav-link {{ request()->is('mountinginfo*') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Mountinginfos</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('specification.index') }}" class="nav-link {{ request()->is('specification*') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Specification</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('tsparameter.index') }}" class="nav-link {{ request()->is('tsparameter*') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Tsparameter</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('reconkit.index') }}" class="nav-link {{ request()->is('reconkit*') ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Reconkit</p>
                      </a>
                  </li>
              </ul>
            </li>  

            <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('category*') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Category</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link {{ request()->is('product*') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Product</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('seo-meta.index') }}" class="nav-link {{ request()->is('seo-meta*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-search"></i>
                  <p>SEO Meta</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('page-faq.index') }}" class="nav-link {{ request()->is('page-faq*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-question-circle"></i>
                  <p>Page FAQ</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('product.enquiry.list') }}" class="nav-link {{ request()->is('all-enquiries') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Product Enquiries</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('applications.for.dealership') }}" class="nav-link {{ request()->is('all-applications-for-dealership') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Applications for Dealership </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('all.contact.us') }}" class="nav-link {{ request()->is('all-contact-us') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Contact Us </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('all.product.review') }}" class="nav-link {{ request()->is('all-product-reviews') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Product Reviews </p>
                </a>
            </li>

            <!--Tags Master-->
            <li class="nav-item">
                <a href="{{ route('tag.index') }}" class="nav-link {{ request()->is('all-tags') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Tags</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('blog.index') }}" 
                class="nav-link 
                {{ 
                  request()->is('blog-list')
                  || request()->is('blog-create')
                   || request()->is('blog-edit*') 
                   || request()->is('blog-images*')
                    || request()->is('blog-show*') ? 'active' : '' 
                }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Blogs/Events </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('blog.review.list') }}" class="nav-link {{ request()->is('all-blog-reviews') ? 'active' : '' }}">
                  <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                  <p>Blog/Event Reviews </p>
                </a>
            </li>
    </div>
  </aside>
