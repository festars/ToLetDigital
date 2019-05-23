<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ToLet</title>
          
            
        <!-- Fonts -->
        <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>


        
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" type="text/css" />
                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/buttons.bootstrap4.min.css" type="text/css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/select.bootstrap4.min.css" type="text/css" />


        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
         @include('layouts.javascript')
        @yield('style')
       
    </head>
    <body class="">
        
        
          <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
          
        <img src="/img/logo1.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        
        @if(Auth::guard('owner')->check())
            @include('owner.side2')
        @elseif(Auth::guard('agent')->check())
            @include('agent.side2')
        @elseif(Auth::guard('admin')->check())
             @include('admin.side2')
        @elseif(Auth::guard('vendor')->check())
             @include('vendor.side2')
        @elseif(Auth::guard('demo')->check())
             @include('demo.side')
        @else
            @include('tenant.side2')
        @endif
        
        
        <!-- Divider -->
        <!--<hr class="my-3">-->
        <!-- Heading -->
        <!--<h6 class="navbar-heading text-muted">Documentation</h6>-->
        <!-- Navigation -->
        <!--<ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
              <i class="ni ni-spaceship"></i> Getting started
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
              <i class="ni ni-palette"></i> Foundation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
              <i class="ni ni-ui-04"></i> Components
            </a>
          </li>
        </ul>-->
      </div>
    </div>
  </nav>
  
  <!-- Main content -->
  <div class="main-content" id="app" data-app>
    <!-- Top navbar -->
    
    @include('layouts.top2')
    
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-7 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          
          @yield("top-content")
          
        </div>
      </div>
    </div>
    <!-- Page content -->
    
    <div class="container-fluid mt--7">
      
      
      <modals-container></modals-container>
      <flash message="{{ session('flash') }}"></flash>
         @if ($errors->any())
            <div class="block flex justify-center my-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red text-xs italic">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          
        @yield('content')
      
      <v-dialog/>
      
      <!-- Footer -->
     
   
    
  </div>
  
</div>
        <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
        <script src="/js/form.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
                <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

        <script src="//cdn.datatables.net/1.10.18/js/dataTables.buttons.min.js"></script>
        
        <script src="//cdn.datatables.net/1.10.18/js/dataTables.select.min.js"></script>
        

        <script src="//cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    

        @yield('scripts')

    </body>
</html>
