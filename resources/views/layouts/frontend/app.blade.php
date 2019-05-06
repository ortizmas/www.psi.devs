<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Jovens Talentos') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="site/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('site/bootstrap-4.3.1/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/font-awesome.min.css') }}">
    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/elegant-fonts.css') }}">
    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/themify-icons.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/swiper.min.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    
    @yield('styles')
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <script type='text/javascript' src="{{ asset('site/js/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script type='text/javascript' src="{{ asset('site/bootstrap-4.3.1/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script type='text/javascript' src="{{ asset('site/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script> --}}
    <!-- Plugin JavaScript Scroll menu-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/swiper.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/masonry.pkgd.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/jquery.collapsible.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/custom.js') }}"></script>
    @yield('scripts')
</body>
</html>
