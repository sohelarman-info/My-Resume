<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','Sohel Arman')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  {{--  BoxIcon  --}}
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link type="text/css" rel="stylesheet" href="{{ asset('src/image-uploader.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('Homepage') }}" class="nav-link">Front</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- Settings Dropdown Menu Start-->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> {{ __('Sign Out') }} </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
      </li>
      <!-- Settings Dropdown Menu End-->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('admin/dist/img/S.png') }}" alt="SohelArman" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SohelArman.Info</b>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item @yield('dashboard')">
            <a href="{{ route('home') }}" class="nav-link @yield('dashboard_active')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">Home</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview @yield('admin_menu_open')">
            <a href="#" class="nav-link @yield('admin_active')">
                <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Admin Panel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('Profile') }}" class="nav-link @yield('profile_active')">
                      <i class="nav-icon fas fa-user"></i>
                      <p>Profile</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="" class="nav-link @yield('blog_active')">
                    <i class="nav-icon fas fa-arrow-alt-circle-up"></i>
                    <p>Header</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link @yield('blog_active')">
                    <i class="nav-icon fas fa-arrow-alt-circle-down"></i>
                    <p>Footer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @yield('front_menu_open')">
            <a href="#" class="nav-link @yield('front_active')">
                <i class="nav-icon fas fa-home"></i>
              <p>
                Home Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('HomeSection') }}" class="nav-link @yield('home_section_active')">
                    <i class="nav-icon fas fa-laptop-house"></i>
                    <p>Home Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('AboutSection') }}" class="nav-link @yield('about_section_active')">
                    <i class="nav-icon far fa-user"></i>
                    <p>About Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('factSection') }}" class="nav-link @yield('fact_section_active')">
                    <i class="nav-icon fas fa-network-wired"></i>
                    <p>Fact Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('SkillSection') }}" class="nav-link @yield('skill_section_active')">
                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>Skill Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('ResumeSection') }}" class="nav-link @yield('resume_section_active')">
                    <i class="nav-icon fas fa-school"></i>
                    <p>Resume Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Portfolio') }}" class="nav-link @yield('portfolio_active')">
                    <i class="nav-icon fas fa-project-diagram"></i>
                    <p>Portfolio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Services') }}" class="nav-link @yield('service_active')">
                    <i class="nav-icon fas fa-hammer"></i>
                    <p>Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Testimonials') }}" class="nav-link @yield('testimonials_active')">
                    <i class="nav-icon fas fa-pencil-ruler"></i>
                    <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('MailPage') }}" class="nav-link @yield('email_active')">
                    <i class="nav-icon far fa-envelope-open"></i>
                    <p>Email</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Footer') }}" class="nav-link @yield('footer_active')">
                    <i class="nav-icon bx bx-down-arrow-alt"></i>
                    <p>Footer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @yield('blog_menu_open')">
            <a href="#" class="nav-link @yield('blog_open_active')">
                <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Blogs') }}" class="nav-link @yield('blog_active')">
                    <i class="nav-icon fas fa-blog"></i>
                    <p>Blog List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('BlogCategory') }}" class="nav-link @yield('blog_category_active')">
                    <i class="nav-icon far fa-folder"></i>
                    <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('BlogSubCategory') }}" class="nav-link @yield('blog_sub_category_active')">
                    <i class="nav-icon far fa-folder"></i>
                    <p>Sub Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Blog.create') }}" class="nav-link @yield('add_users_active')">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>Add Blog</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @yield('role_management_menu_open')">
            <a href="#" class="nav-link @yield('role_management_active')">
                <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Role Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Users') }}" class="nav-link @yield('users_active')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Role') }}" class="nav-link @yield('role_manager_active')">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('PermissionAdd') }}" class="nav-link @yield('role_permission_add_active')">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Permission</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Permissions') }}" class="nav-link @yield('role_permissions_active')">
                    <i class="nav-icon fas fa-user-tie"></i>
                    <p>Role Permissions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('UserRole') }}" class="nav-link @yield('user_role_active')">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>User Roles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Available Icon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="https://fontawesome.com/icons?d=gallery" target="_blank" class="nav-link">
                    <i class="nav-icon fab fa-font-awesome"></i>
                    <p>Font Awesome</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://useiconic.com/open/" target="_blank" class="nav-link">
                    <i class="nav-icon fab fa-font-awesome"></i>
                    <p>Iconic</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://ionicons.com/" target="_blank" class="nav-link">
                    <i class="nav-icon fab fa-font-awesome"></i>
                    <p>Ionic</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
