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
    <section class="dores-costas pt-4 pb-4">
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
    </section>

    <!------------------ Start section events --------------->
    <section class="events-section pt-3">
        <div class="pb-0">
            <div class="container events element-animate">
                <div id="events" class="owl-carousel">
                    <div class="item">
                        <div class="events-box">
                            <div class="box16">
                                <img src="site/images/b-2.jpg">
                                <div class="box-content">
                                    <h3 class="title">CONSULTORIAS</h3>
                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="" title="">SAIBA MAIS</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="item">
                    <div class="events-box">
                            <div class="box16">
                                <img src="site/images/b-3.jpg">
                                <div class="box-content">
                                    <h3 class="title">PROGRAMAS</h3>
                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="" title="">SAIBA MAIS</a>
                                    </ul>
                                </div>
                            </div>
                      </div>
                  </div>

                    <div class="item">
                        <div class="events-box">
                            <div class="box16">
                                <img src="site/images/b-4.jpg">
                                <div class="box-content">
                                    <h3 class="title">ESPECIALIDADE</h3>
                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="" title="">SAIBA MAIS</a>
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
    <section class="mona-blog-area mb-50 section-padding-80-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-lg-12">
              <div class="row">
                <div class="col-12 p-0">
                    <div class="single-blog-post featured-post mb-30 wow fadeInUp" data-wow-delay="300ms">
                        
                        <div class="post-content text-center">
                            <div class="w-100 justify-content-center align-content-center">
                                <a href="/destaque/seminario-saude-e-longevidade" class="post-title text-center"><h1>EVENTO</h1></a>
                                <span class="post-date text-center pb-2">Seminário Saúde e Longevidade</span>
                                <span class="post-date text-center pb-2">15 JUN | SALVADOR / BA</span>
                                <a class="btn btn-dark btn-sm" href="/destaque/seminario-saude-e-longevidade" title="psi"><i class="fas fa-plus" style="font-size: 18px;"></i></a>
                            </div>
                        </div>
                        <div class="post-thumbnail">
                            <a href="#"><img src="{{ asset('site/images/bg/bg-events-1.jpg') }}" alt=""></a>
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
    <section class="latest-movies pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-5">
                    <h2 class="title">VÍDEOS EM DESTAQUE</h2>
                </div>
                <div class="col-md-5 align-self-center text-right">
                    <a target="_blank" href="https://www.youtube.com/channel/UCaw-0bq4ykwbyoU0Y_T24TQ?view_as=subscriber" class="btn btn-icon btn-danger btn-effect">
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
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/JCaAlBdcpew?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pqG4ogW939M?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/sH52ToZTRH8?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>


                        <div class="item">
                            <div class="movie-box-1">
                                <div class="embed-responsive embed-responsive-4by3">
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

    <div class="register">
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

                    <div class="search_section d-flex flex-column align-items-center justify-content-center">
                        <div class="search_background" style="background-image:url(site/images/bg/bg-inscrevase.jpg);"></div>
                        <div class="search_content text-center">
                            <h1 class="search_title">Prencha seus dados</h1>
                            <form id="search_form" class="search_form" action="post">
                                <input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Nome completo" required="required">
                                <input id="search_form_category" class="input_field search_form_category" type="email" placeholder="E-mail" required="required">
                                <input id="search_form_degree" class="input_field search_form_degree" type="tel" placeholder="Telefone" required="required">
                                <button id="search_submit_button" type="submit" class="search_submit_button trans_200" value="Submit">Baxiar gratis</button>
                            </form>
                        </div> 
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- contact section starts here -->
    <!--<section id="contato" class="bg-contact pb-5">
        <div class="container-fluid">
            <div class="container-page"> 
                <div class="contact-caption">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="contact-info text-right">
                                <h3 class="text-light">Informação de Contato</h3>
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <div class="info pt-4">
                                            <h5>Ligue-nos</h5><br>
                                            <dd>(75) 3414-2018</dd>
                                        </div>
                                        <div class="info">
                                            <h5>Watsapp</h5><br>
                                            <dd>(75) 9 91160476</dd>
                                        </div>
                                        <div class="info">
                                            <h5>Encontre-nos</h5><br>
                                            <dd>Rua Plácido Pita, 50 , Capoeirocu – Cachoeira-BA</dd>
                                        </div>
                                        <div class="info">
                                            <h5>E-mail</h5><br>
                                            <dd>contato@prosaudeintegral.com.br</dd>
                                            <dd>secretaria@prosaudeintegral.com.br</dd>
                                            <dd>administrativo@prosaudeintegral.com.br</dd>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block">
                                        <div class="info-detail">
                                            <ul><li><i class="fa fa-phone"></i></li></ul>
                                            <ul><li><i class="fa fa-whatsapp"></i></li></ul>
                                            <ul><li><i class="fa fa-map-marker"></i></li></ul>
                                            <ul><li><i class="fa fa-envelope"></i></li></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6">
                            <div class="contact-form">
                                <h3 class="text-light">Deixe-nos uma mensagem </h3>
                                <form class="form" action="contato" method="post">
                                    <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI'] ?>" placeholder="">
                                    <input class="name" type="text" name="nome" placeholder="Digite seu Nome" required >
                                    <input class="email" type="email" name="email" placeholder="Digite seu E-mail" required >
                                    <input class="phone" type="text" name="phone" id="phone" placeholder="Telefone" width="20%" required >
                                    <input class="watsap" type="text" name="whatsapp" placeholder="WhatsApp">
                                    <textarea class="message" name="message" id="message" cols="30" rows="5" placeholder="Mensagem" required></textarea>
                                    <input class="btn btn-dark" type="submit" value="ENVIAR" >
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- end of contact section -->
    <!--<div id="newslleter" class="newsletter pt-4 pb-4">
        <div class="container-fluid">
            <div class="contact-heading text-center">
                <h3>TRABALHE CONOSCO</h3>
                <span>Entre em contato para ver as condições.</span>
                <hr>
            </div>
            <div class="row">
                <div class="col-md d-flex justify-content-center">
                    <form class="form-inline" action="contato" method="post">
                        <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI'] ?>" placeholder="">
                        <div class="form-group pr-2">
                            <input type="text" name="nome" value="" placeholder="Digite seu nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Digite seu e-mail" class="form-control" required>
                        </div>
                        <div class="form-group pl-2">
                            <input class="btn btn-dark btn-sm" type="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
    
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
                    <form class="newsletter">
                        <input type="text" placeholder="Seu melhor e-mail">
                        <button class="site-btn">INSCREVA-SE</button>
                    </form>
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



