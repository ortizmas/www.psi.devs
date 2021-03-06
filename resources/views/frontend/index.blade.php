@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="clearfix"></div>
    <!--Slide-->
    <section class="section-slide pt-1" id="inicio">
        <div class="container-fluid">
            <div class="container-page">
                <div class="row">
                    <div class="col-md p-0">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php
                                    MyHelper::destaque();
                                ?>
                            </div>
                            <!-- Controls -->
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                <span class="fa fa-chevron-circle-left fa-3x" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                <span class="fa fa-chevron-circle-right fa-3x" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--start-slide-->

    <!--Inicio treinamentos style="background-image: url(/img/psi/bg/bg-4.jpg);"-->
    <section class="treinamentos pt-2 pb-5" id="treinamentos">
        <div class="container-fluid">
            <div class="container-page">
                <div class="text-center pb-4">
                    <h2 class="line-one">Treinamentos</h2>
                </div>
                <div class="row justify-content-center">
                    <?php MyHelper::treinamentosTwo() ?>
                </div>
            </div>
        </div>
    </section>
    <!----End-treinamentos----->

    <!--Inicio palestras-->
    <!--<section class="palestras pt-5 pb-5" id="palestras">
        <div class="container-fluid">
            <div class="container-page">
                <div class="text-center">
                    <h2 class="pb-3">Palestras</h2>
                </div>
                <div class="row justify-content-center">
                    <?php //MyHelper::palestras(); ?>
                </div>
            </div>
        </div>
    </section> -->
    <!----End-palestras----->

    <!-- Start dores nas costas-->
    {{-- <section class="dores-costas pt-4 pb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="dc-box bg-img">
                        <div class="content">
                            <div class="bg-dark-opacy w-100 pt-3 pb-4">
                                <h2 class="text-white text-uppercase">Dores nas costas nunca mais!</h2>
                                <a class="btn-psi btn-green btn-round" href="#" title="Dores nas costas">SAIBA MAIS</a>
                            </div>
                        </div>
                        <img class="img-fluid" src="{{ asset('site/images/bg/bg-dores-costas.jpg') }}" alt="Dores nas costas" />
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="info-area gray-bg mt-5 mb-5" id="produtos">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="intro-image">
                        <img src="{{ asset('site/images/intro/libro.jpg') }}" alt="Dores nas costas nunca mais" class="img-fluid">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="p-5 wow fadeInRight">
                        <h1 class="h1">Dores nas costas nunca mais!</h1>
                        <p class="h6 text-justify">As dores nas costas acompanham a todos em fase produtiva ou não. Este Manual é uma grande arma na prevenção e tratamento das dores nas costas adquiridas no trabalho, em casa ou pelo avançar da idade.</p>
                        <p class="h6 text-justify">Como uma linguagem clara e objetiva este Manual levar o leitor:</p>
                        <a href="{{ url('/produtos') }}" class="btn btn-yellow">SAIBA MAIS <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!------------------ Start section events --------------->
    <section class="events-section pt-5 pb-5" id="programas">
        <div class="pb-0">
            <div class="container events element-animate">
                <div id="events" class="owl-carousel">
                    <div class="item">
                        <div class="events-box">
                            <div class="box16">
                                <img src="{{ asset('site/images/events/event-1.jpg') }}">
                                <div class="box-content">
                                    <h3 class="title">CONSULTORIAS</h3>
                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="{{ url('/consultorias') }}" title="">SAIBA MAIS</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="item">
                    <div class="events-box">
                            <div class="box16">
                                <img src="{{ asset('site/images/events/event-2.jpg') }}">
                                <div class="box-content">
                                    <h3 class="title">PROGRAMAS</h3>
                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="{{ url('/programas') }}" title="">SAIBA MAIS</a>
                                    </ul>
                                </div>
                            </div>
                      </div>
                  </div>

                    <div class="item">
                        <div class="events-box">
                            <div class="box16">
                                <img src="{{ asset('site/images/events/event-3.jpg') }}">
                                <div class="box-content">
                                    <h3 class="title">ESPECIALIDADES</h3>
                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="{{ url('/especialidades') }}" title="">SAIBA MAIS</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>
              </div>
        </div>
    </section>

    <!-- ***** Events start ***** -->
    <section class="mona-blog-area mb-50 section-padding-80-0" id="eventos">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-lg-12">
              <div class="row">
                <div class="col-12 p-0">
                    <div class="single-blog-post featured-post mb-30 wow fadeInUp" data-wow-delay="300ms">
                        
                        <div class="post-content text-center">
                            <div class="w-100 justify-content-center align-content-center">
                                <a class="d-none d-md-block" href="/destaque/seminario-saude-e-longevidade" class="post-title text-center"><h1>EVENTO</h1></a>
                                <span class="post-date text-center pb-2 d-none d-md-block">Seminário Saúde e Longevidade</span>
                                <span class="post-date text-center pb-2 d-none d-md-block">06 JUL | PETROLINA/PE</span>
                                <a class="btn btn-dark btn-sm" href="{{ url('/destaque/seminario-saude-e-longevidade') }}" title="psi">Ver evento</a>
                            </div>
                        </div>
                        <div class="post-thumbnail">
                            <a href="{{ url('/destaque/seminario-saude-e-longevidade') }}"><img src="{{ asset('site/images/bg/bg-events-1.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
      <!-- ***** Blog Area End ***** -->

    <!--Start videos youtube-->
    <section class="latest-movies pt-5 pb-5" id="dicas">
        <div class="container pt-5 pb-5">
            <div class="row justify-content-center pb-3">
                <div class="col-md-5">
                    <h2 class="title d-none d-md-block">VÍDEOS EM DESTAQUE</h2>
                </div>
                <div class="col-md-5 align-self-center text-right">
                    <a target="_blank" href="https://www.youtube.com/channel/UCaw-0bq4ykwbyoU0Y_T24TQ?sub_confirmation=1" class="btn btn-icon btn-danger btn-effect">
                        INSCREVA-SE
                        <i class="ti-angle-double-right"></i>
                    </a>
                </div>
            </div>

            <div class="row justify-content-center">
                
                <div class="col-md-10">
                    <div class="owl-carousel recommended-slider mt20">
                        <div class="item active">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/6ivwI9IYTgs?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/soKRnXKXkPw?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mOTdQYqcY0M?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/JCaAlBdcpew?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pqG4ogW939M?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sH52ToZTRH8?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zjlbHrv-dE8?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Register -->

    <div class="register" id="contato">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">

                    <div class="register_section d-flex flex-column align-items-center justify-content-center">
                        <div class="register_content text-left">
                            <h4 class="register_title text-center">BAIXE AGORA TRANSFORME SEU SONHO EM OBJETIVO</h4>
                            <p class="text-white"><strong>Descubra:</strong><br>
                            <ul class="text-white">
                                <li>como funciona a mente das pessoas visionárias que objetivam transformar sonhos e metas em realidade.</li>
                                <li>como estabelecer e alcançar metas e desenvolver hábitos de sucesso.</li>
                                <li>como viver em harmonia com o seu objetivo.</li>
                            </ul>
                            </p>
                            {{-- <div class="button button_1 register_button mx-auto text-center"><a href="#">Baixar</a></div> --}}
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 p-0">

                    {{-- <div class="search_section d-flex flex-column align-items-center justify-content-center">
                        <div class="search_background" style="background-image:url(site/images/bg/bg-inscrevase.jpg);"></div>
                        <div class="search_content text-center">
                            <h1 class="search_title">Prencha seus dados</h1>
                            <form id="search_form" class="search_form" action="" method="post">
                                <input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Nome completo" required="required">
                                <input id="search_form_category" class="input_field search_form_category" type="email" placeholder="E-mail" required="required">
                                <input id="search_form_degree" class="input_field search_form_degree" type="tel" placeholder="Telefone" required="required">
                                <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Baxiar gratis</button>
                            </form>
                        </div> 
                    </div> --}}

                    
                    <div class="search_section d-flex flex-column align-items-center justify-content-center">
                        <div class="search_background" style="background-image:url(site/images/bg/bg-inscrevase.jpg);"></div>
                        <div class="search_content text-center">
                            <h1 class="search_title">Prencha seus dados</h1>
                            <form action="https://prosaudeintegral.us3.list-manage.com/subscribe/post?u=ed8dc7ed5f0882737313c04a1&amp;id=41c0a84b65" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate search_form" target="_blank">
                                    <input type="text" value="" name="FNAME" class="input_field search_form_name required" id="mce-FNAME" required="required" placeholder="Nome completo">
                                    
                                    <input type="email" value="" name="EMAIL" class="input_field search_form_category required email" id="mce-EMAIL" placeholder="E-mail" required="">
                                    
                                    <input type="text" name="PHONE" class="input_field search_form_degree required" value="" id="mce-PHONE" placeholder="Telefone" required="">
                                    
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                        <input type="text" name="b_ed8dc7ed5f0882737313c04a1_41c0a84b65" tabindex="-1" value=""></div>
                                    <div class="clear">
                                        <input type="submit" value="Subscribe" name="Baxiar gratis" id="mc-embedded-subscribe" class="search_submit_button trans_200 button">
                                    </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-7">
                    <div class="section-title mb-md-0">
                    <h5>CADASTRE-SE PARA OBTER CONTEÚDO EXCLUSIVO</h5>
                    <p>Para ajudar você a criar momento positivo de crescimento contínuo entregue somente através do e-mail</p>
                </div>
                </div>
                <div class="col-md-7 col-lg-5">
                    <form class="newsletter validate" action="https://prosaudeintegral.us3.list-manage.com/subscribe/post?u=ed8dc7ed5f0882737313c04a1&amp;id=41c0a84b65" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Seu melhor e-mail" required>
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ed8dc7ed5f0882737313c04a1_41c0a84b65" tabindex="-1" value=""></div>
                        <button type="submit" value="INSCREVA-SE" name="subscribe" id="mc-embedded-subscribe" class="site-btn">INSCREVA-SE</button>

                    </form>

                    {{-- <div id="mc_embed_signup">
                    <form action="https://prosaudeintegral.us3.list-manage.com/subscribe/post?u=ed8dc7ed5f0882737313c04a1&amp;id=41c0a84b65" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ed8dc7ed5f0882737313c04a1_41c0a84b65" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>
                    </form>
                    </div> --}}
                    <!--End mc_embed_signup-->
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter section end --> 

    <!--Footer-->
    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection

@section('scripts')
    <script>
        (function($) {
            'use strict';
            $('#events').owlCarousel({
                center: false,
                items:1,
                autoplay:true,
                loop:false,
                stagePadding: 10,
                margin:0,
                dots: false,
                nav: true,
                navText: ['<span class="fas fa-arrow-left">', '<span class="fas fa-arrow-right">'],
                responsive:{
                    600:{
                        margin:20,
                        stagePadding: 10,
                        items:2
                    },
                    800:{
                        margin:20,
                        stagePadding: 10,
                        items:2
                    },
                    1000:{
                        margin:20,
                        stagePadding: 10,
                        items:3
                    },
                    1900:{
                        margin:20,
                        stagePadding: 10,
                        items:3
                    }
                }
            });

            //Video owl
            $('#videos-owl').owlCarousel({
                items: 1,
                merge: true,
                loop: true,
                margin: 10,
                video: true,
                lazyLoad: true,
                center: true,
                responsive: {
                  320: {
                    items: 1
                  },
                  560: {
                    items: 2
                  },
                  992: {
                    items: 3
                  }
                }
            });

            // ***********************************
            // Post Carousel Active Code
            // ***********************************
            if ($.fn.owlCarousel) {
                var slidePost = $('.slide-post');
                slidePost.owlCarousel({
                    items: 1,
                    loop: true,
                    dots: false,
                    nav: false,
                    autoplay: true,
                    smartSpeed: 1500
                });
            }
        })(jQuery);
    </script>
@endsection



