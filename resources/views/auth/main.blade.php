<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tolet Digital Agency</title>

        <!-- Fonts -->
        @yield('style')
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="bg-teal max-w-full ">
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
        <div class="flex justify-center items-center {{$page}}" id="app">
            @yield('content')
        </div>
        <script src="/js/form.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
