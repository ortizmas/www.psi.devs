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

    {{-- <script>
        (function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1000;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);

    </script> --}}
    <script>
        (function($){
            $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
              if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');

            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
        });
        })(jQuery)
    </script>
</body>
</html>
