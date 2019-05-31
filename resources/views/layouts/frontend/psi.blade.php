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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="site/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('site/bootstrap-4.3.1/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('site/css/font-awesome.min.css') }}"> --}}
    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/elegant-fonts.css') }}">
    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/themify-icons.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/swiper.min.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/video.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/psi.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">
    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- Plugin JavaScript Scroll menu-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/swiper.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/masonry.pkgd.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/jquery.collapsible.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/video.js') }}"></script>
    <script type='text/javascript' src="{{ asset('site/js/custom.js') }}"></script>

    <script>
        // (function($){
        //     $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        //       if (!$(this).next().hasClass('show')) {
        //         $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        //     }
        //     var $subMenu = $(this).next(".dropdown-menu");
        //     $subMenu.toggleClass('show');

        //     $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        //         $('.dropdown-submenu .show').removeClass("show");
        //     });

        //     return false;
        // });
        // })(jQuery)
    </script>

    @yield('scripts')
    
</body>
</html>
