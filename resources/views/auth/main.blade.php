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

        <style>
            #main-container{
                background: #1f1f1fd1;
                border-radius: 8px;
                max-width: 1185px;
            }
        </style>
    </head>
    <body class="d-flex align-items-center" style="background-image: url(/images/apartments-exterior.jpg); height: 100vh;">
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
    <!-- Navbar -->
    <!-- Header -->

      <div class="container" id="main-container">
          <div class="row" id="app">
              <div class="col-sm-6 text-center">
                  <div class="py4">
                      <img class="py-2" src="/images/logo.png" />
                      <h1 class="text-white">Welcome!</h1>
                      <p class="text-lead text-light pt-3">Built for e-tenants, e-agents, e-landlords, e-vendors, Small to Large Property Managing Companies,Developers & Financial Institutions in the Real Estate Sector. We have been successful creating solutions to you our client to help you automate all your Property Management processes.</p>
                      <hr>
                      <h4 class="text-light">Don't have an account?</h4> <br>
                      <a href="/register" class="btn btn-default btn-lg">Register</a>
                  </div>
              </div>
                  @yield('content')
          </div>


          <!-- Footer -->
          <footer class="pt-5">
              <div class="container">
                  <div class="row align-items-center justify-content-xl-between">
                      <div class="col">
                          <div class="copyright text-center text-muted">
                              Copyright &copy; 2019
                          </div>
                      </div>
                  </div>
              </div>
          </footer>

      </div>
        
        
        
        
        <script src="/js/form.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
