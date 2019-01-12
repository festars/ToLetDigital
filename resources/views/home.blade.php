<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    </head>
    <body class="bg-teal">
        <div class="flex flex-col h-screen">
           <div class="flex justify-center items-center w-full h-32 mr-16" id="app">
               <div class="flex justify-between items-start container mx-auto">
                <div>
                    <img src="/img/tolet.jpg" class="h-32 w-32 rounded">
                </div>
                <div class="bg-transparent mt-6">
                    <span class="py-2 px-4">
                        <a class="no-underline text-white"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </span>
                </div>
               </div>
            </div>

            <div class="flex h-full justify-center items-center" id="app">
                <h1>Welcome to Tolet Digital(Vendor and Demo)</h1>
            </div>
        </div>

        <script src="/js/form.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
