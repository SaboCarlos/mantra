<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/brands.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/solid.css')}}" rel="stylesheet">

    <style>
        svg{
            width: 26px
        }
    </style>

    @livewireStyles


</head>
<body>
    <div id="app">
        <div id="preloader">
            <div class="south-load"></div>
        </div>
        @include('layouts.inc.frontend.navbar')

        <main >
            @yield('content')
        </main>

        @include('layouts.inc.frontend.footer')
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/classy-nav.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('assets/js/active.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

   
   
    
    

    @livewireScripts
</body>
</html>
