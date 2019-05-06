<header class="site-header">
    {{-- <div class="top-header-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email d-flex align-items-center">
                        <i class="fa fa-envelope"></i><a href="#">tuanna.design@gmail.com</a>
                    </div>

                    <div class="header-bar-text lg-flex align-items-center">
                        <p><i class="fa fa-phone"></i>001-1234-88888 </p>
                    </div>
                </div>

                <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                    <div class="header-bar-search">
                        <form class="flex align-items-stretch">
                            <input type="search" placeholder="What would you like to learn?">
                            <button type="submit" value="" class="flex justify-content-center align-items-center"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <div class="header-bar-menu">
                        <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="nav-bar fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-9 col-lg-3">
                    <div class="site-branding">
                        <h2 class="site-title"><a href="/" rel="home"><img src="{{ asset('img/logo-gt.png') }}" alt="" class="rounded-circle" width="75" height="75"></span></a></h2>
                    </div>
                </div>

                <div class="col-3 col-lg-9 flex justify-content-end align-content-center">
                    <nav class="site-navigation flex justify-content-end align-items-center">
                        <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="current-menu-item"><a href="{{ route('jovens.talentos') }}/#home">Home</a></li>
                            <li><a class="js-scroll-trigger" href="{{ route('jovens.talentos') }}/#sobre-programa">Sobre o programa</a></li>
                            <li><a class="js-scroll-trigger" href="{{ route('jovens.talentos') }}/#inscricao">Inscrições</a></li>
                            <li><a class="js-scroll-trigger" href="{{ route('jovens.talentos') }}#nominata">Nominata 2018</a></li>
                            <li><a class="js-scroll-trigger" href="{{ route('jovens.talentos') }}#cursos">Cursos participantes</a></li>
                            <li><a class="js-scroll-trigger" href="{{ route('jovens.talentos') }}/#organizacao">Organização</a></li>

                        </ul>

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        {{-- <div class="header-bar-cart">
                            <a href="#" class="flex justify-content-center align-items-center"><span aria-hidden="true" class="icon_bag_alt"></span></a>
                        </div> --}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>