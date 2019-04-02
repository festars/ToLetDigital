<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tolet Digital Agency</title>

        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">

        <!-- Fonts -->
        @yield('style')
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->
    </head>
    <body class="bg-default">
        <?php
        $page = '';

        if(Request::is('agent/*')){
            $page = 'agent-image';
        }else if(Request::is('tenant/*')){
            $page = 'tenant-image';
        }else if(Request::is('owner/*')){
            $page = 'owner-image';
        }else if(Request::is('vendor/*')){
            $page = 'vendor-image';
        }else if(Request::is('demo/*')){
            $page = 'demo-image';
        }else{
            $page = 'login-image';
        }
        ?>
        
        <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="/">
          <img src="/images/logo.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="/images/logo.png" />
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <!--<a class="nav-link nav-link-icon" href="../index.html">
                <i class="ni ni-planet"></i>
                <span class="nav-link-inner--text">Dashboard</span>
              </a>-->
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="/register">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Register</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="/login">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link nav-link-icon" href="../examples/profile.html">
                <i class="ni ni-single-02"></i>
                <span class="nav-link-inner--text">Profile</span>
              </a>
            </li>-->
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header section-grey gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Built for e-tenants, e-agents, e-landlords, e-vendors, Small to Large Property Managing Companies,Developers & Financial Institutions in the Real Estate Sector. We have been successful creating solutions to you our client to help you automate all your Property Management processes.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    
    <!--{{ $page }}-->
    <!-- Page content -->
    <div id="app" class="container mt--8 pb-5 ">
      <div class="row justify-content-center">
          
          @yield('content')
          
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            Copyright &copy; 2019
          </div>
        </div>
        <div class="col-xl-6">
          <!--<ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>-->
        </div>
      </div>
    </div>
  </footer>
        
        
        
        
        <script src="/js/form.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
