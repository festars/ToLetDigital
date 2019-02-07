<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ToLet</title>
           @include('layouts.javascript')
            @yield('style')
        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

       
    </head>
    <body class="bg-tolet-yellow font-sans antialiased">

        <div id="app" data-app>


            <div class="flex justify-center h-auto">

            <div class="w-left rounded">
                <div class="relative flex flex-col justify-center h-full">
                    <!--<div class="block bg-tolet-blue flex justify-center items-center mb-6">-->
                    <!--    <img src="/img/logo1.png" class="h-48 w-48 rounded-full">-->
                    <!--</div>-->
                    <!-- End of logo -->

                    <!-- Start of menu -->
                    <div class="container flex-1 overflow-auto max-h-screen">
                        <img src="/img/logo1.png" class="h-48 w-48 rounded-full">
                            @if(Auth::guard('owner')->check())
                                @include('owner.side')
                            @elseif(Auth::guard('agent')->check())
                                @include('agent.side')
                            @elseif(Auth::guard('admin')->check())
                                 @include('admin.side')
                            @elseif(Auth::guard('vendor')->check())
                                 @include('vendor.side')
                            @elseif(Auth::guard('demo')->check())
                                 @include('demo.side')
                            @else
                                @include('tenant.side')
                            @endif
                    </div>
                </div>
            </div>
            <!-- End of left -->
            <!-- Start of right -->
            <div class="flex-1 bg-grey-lightest flex flex-col rounded h-full overflow-auto">
                @include('layouts.top')
                 <modals-container></modals-container>
                  <flash message="{{ session('flash') }}"></flash>
                <div class="w-full min-h-screen max-h-screen">
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
                </div>
            </div>
        </div>
            <v-dialog/>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
        <script src="/js/form.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        @yield('scripts')

    </body>
</html>
