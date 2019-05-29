@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="clearfix"></div>
    <!--Slide-->
    <section class="section-slide pt-1" id="inicio">
        <div class="container-fluid">
            <div class="container-page">
                <div class="row">
                    <div class="col-md">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php
                                MyHelper::destaque();
                                ?>
                            </div>
                            <!-- Controls -->
                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                <span class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                <span class="fa fa-chevron-circle-right fa-2x" aria-hidden="true"></span>
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
                    <h2 class="line-one text-uppercase">Treinamentos</h2>
                </div>
                <div class="row justify-content-center">
                    <?php MyHelper::treinamentosTwo() ?>
                </div>
            </div>
        </div>
    </section>
    <!----//End-treinamentos----->

    <!--Inicio palestras-->
    <section class="palestras pt-5 pb-4" id="palestras">
        <div class="container-fluid">
            <div class="container-page">
                <div class="text-center">
                    <h2 class="pb-3 text-uppercase">Palestras</h2>
                </div>
                <div class="row justify-content-center">
                    <?php MyHelper::palestras(); ?>
                </div>
            </div>
        </div>
    </section>
    <!----//End-palestras----->

    <!-- Start dores nas costas-->
    <section class="dores-costas pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="dc-box bg-img">
                        <div class="content">
                            <h2 class="text-white text-uppercase">Dores nas costas nunca mais!</h2>
                            <a class="btn btn-primary btn-lg" href="#" title="Dores nas costas">SAIBA MAIS</a>
                        </div>
                        <img class="img-fluid" src="{{ asset('site/images/bg/bg-dores-costas.jpg') }}" alt="Dores nas costas" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="consulting">
        <div class="container-fluid bg-info pt-5 pb-5">
            <div class="row">
                <div class="col-md justify-content-center">
                    <div class="card bg-dark text-white">
                        <img src="site/images/events/img_1.jpg" class="card-img" alt="">
                        <div class="card-img-overlay text-center justify-content-center">
                            <h1>CONSULTORIAS</h1>
                            <a class="btn btn-primary btn-lg" href="#" title="">SAIBA MAIS</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-white">
                        <img src="site/images/events/img_2.jpg" class="card-img" alt="">
                        <div class="card-img-overlay text-center justify-content-center">
                            <h1>CONSULTORIAS</h1>
                            <a class="btn btn-primary btn-lg" href="#" title="">SAIBA MAIS</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-white">
                        <img src="site/images/events/img_3.jpg" class="card-img" alt="">
                        <div class="card-img-overlay text-center justify-content-center">
                            <h1>CONSULTORIAS</h1>
                            <a class="btn btn-primary btn-lg" href="#" title="">SAIBA MAIS</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">
                       <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/bologna-3.jpg" alt="Bologna">
                       <div class="card-img-overlay text-white d-flex flex-column justify-content-center align-items-center ">
                            <h4 class="card-title">CONSULTORIAS</h4>
                            {{-- <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                            <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p> --}}
                            <div class="link d-flex">
                                <a class="btn btn-primary btn-lg" href="#" title="">SAIBA MAIS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">
                       <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/bologna-3.jpg" alt="Bologna">
                       <div class="card-img-overlay text-white d-flex flex-column justify-content-center align-items-center ">
                            <h4 class="card-title">CONSULTORIAS</h4>
                            {{-- <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                            <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p> --}}
                            <div class="link d-flex">
                                <a class="btn btn-primary btn-lg" href="#" title="">SAIBA MAIS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">
                       <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/bologna-3.jpg" alt="Bologna">
                       <div class="card-img-overlay text-white d-flex flex-column justify-content-center align-items-center ">
                            <h4 class="card-title">CONSULTORIAS</h4>
                            {{-- <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                            <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p> --}}
                            <div class="link d-flex">
                                <a class="btn btn-primary btn-lg" href="#" title="">SAIBA MAIS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events-section">
        <div class="pb-5 bg-light">
            <div class="container-fluid events element-animate">
                <div id="events" class="owl-carousel">
                    <div class="item">
                        <div class="events-box">
                            <figure>
                                <img src="site/images/events/img_1.jpg" alt="Image" class="img-fluid">
                            </figure>
                            <div class="text pt-1">
                                <div class="meta text-center">
                                    <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="item">
                    <div class="events-box">
                        <figure>
                          <img src="site/images/events/img_3.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <div class="text pt-1">
                                <div class="meta text-center">
                                    <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                                </div>
                            </div>
                      </div>
                  </div>

                    <div class="item">
                        <div class="events-box">
                          <figure>
                            <img src="site/images/events/img_2.jpg" alt="Image" class="img-fluid">
                          </figure>
                          <div class="text pt-1">
                                <div class="meta text-center">
                                    <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="item">
                    <div class="events-box">
                      <figure>
                        <img src="site/images/events/img_1.jpg" alt="Image" class="img-fluid">
                      </figure>
                      <div class="text pt-1">
                            <div class="meta text-center">
                                <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="item">
                    <div class="events-box">
                        <figure>
                          <img src="site/images/events/img_1.jpg" alt="Image" class="img-fluid">
                        </figure>
                        <div class="text pt-1">
                                <div class="meta text-center">
                                    <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                                </div>
                            </div>
                      </div>
                  </div>

                    <div class="item">
                        <div class="events-box">
                            <figure>
                              <img src="site/images/events/img_3.jpg" alt="Image" class="img-fluid">
                            </figure>
                            <div class="text pt-1">
                                <div class="meta text-center">
                                    <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                                </div>
                            </div>
                          </div>
                    </div>

                  <div class="item">
                    <div class="events-box">
                      <figure>
                        <img src="site/images/events/img_2.jpg" alt="Image" class="img-fluid">
                      </figure>
                      <div class="text pt-1">
                            <div class="meta text-center">
                                <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="item">
                    <div class="events-box">
                      <figure>
                        <img src="site/images/events/img_1.jpg" alt="Image" class="img-fluid">
                      </figure>
                      <div class="text pt-1">
                            <div class="meta text-center">
                                <a class="btn-events btn-xs font-weight-bold" href="#" title="">SAIBA MAIS</a>
                            </div>
                        </div>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
    </section>

    <!-- Start dores nas costas-->
    <section class="dores-costas pb-5 bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="dc-box bg-img">
                        <div class="content">
                            {{-- <h2 class="text-white text-uppercase">Dores nas costas nunca mais!</h2>
                            <a class="btn btn-warning btn-lg" href="#" title="Dores nas costas">SAIBA MAIS</a> --}}
                        </div>
                        <img class="img-fluid" src="{{ asset('site/images/bg/bg-events.jpg') }}" alt="Dores nas costas" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-movies ptb100">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <h2 class="title">Latest Movies</h2>
                </div>
                <div class="col-md-4 align-self-center text-right">
                    <a href="#" class="btn btn-icon btn-main btn-effect">
                        view all
                        <i class="ti-angle-double-right"></i>
                    </a>
                </div>
            </div>


            <div class="owl-carousel latest-movies-slider mt20">

                <div class="item active">

                    <div class="movie-box-1">

                        <div class="poster">
                            <img src="site/images/posters/poster-1.jpg" alt="">
                        </div>


                        <div class="buttons">
                            <a href="https://www.youtube.com/watch?v=Q0CbN8sfihY" class="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>


                        <div class="movie-details">
                            <h4 class="movie-title">
                                <a href="movie-detail.html">Star Wars</a>
                            </h4>
                            <span class="released">14 Dec 2017</span>
                        </div>


                        <div class="stars">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span>7.5 / 10</span>
                        </div>

                    </div>

                </div>

                <div class="item">
                    <div class="movie-box-1">
                        <div class="poster">
                            <img src="site/images/posters/poster-2.jpg" alt="">
                        </div>

                        <div class="buttons">
                            <a href="https://www.youtube.com/watch?v=Q0CbN8sfihY" class="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>

                        <div class="movie-details">
                            <h4 class="movie-title">
                                <a href="movie-detail.html">The Brain 1</a>
                            </h4>
                            <span class="released">20 Dec 2017</span>
                        </div>

                        <div class="stars">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span>7.2 / 10</span>
                        </div>
                    </div>
                </div>


                <div class="item">

                    <div class="movie-box-1">

                        <div class="poster">
                            <img src="site/images/posters/poster-3.jpg" alt="">
                        </div>


                        <div class="buttons">
                            <a href="https://www.youtube.com/watch?v=Q0CbN8sfihY" class="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>


                        <div class="movie-details">
                            <h4 class="movie-title">
                                <a href="movie-detail.html">The Mummy</a>
                            </h4>
                            <span class="released">9 Jun 2017</span>
                        </div>


                        <div class="stars">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span>5.5 / 10</span>
                        </div>

                    </div>

                </div>


                <div class="item">

                    <div class="movie-box-1">

                        <div class="poster">
                            <img src="site/images/posters/poster-4.jpg" alt="">
                        </div>


                        <div class="buttons">
                            <a href="https://www.youtube.com/watch?v=N9ozvjDzE4Y" class="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>


                        <div class="movie-details">
                            <h4 class="movie-title">
                                <a href="movie-detail.html">The Parrot</a>
                            </h4>
                            <span class="released">20 Jan 2017</span>
                        </div>


                        <div class="stars">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span>5.2 / 10</span>
                        </div>

                    </div>

                </div>


                <div class="item">

                    <div class="movie-box-1">

                        <div class="poster">
                            <img src="site/images/posters/poster-1.jpg" alt="">
                        </div>


                        <div class="buttons">
                            <a href="https://www.youtube.com/watch?v=Q0CbN8sfihY" class="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>


                        <div class="movie-details">
                            <h4 class="movie-title">
                                <a href="movie-detail.html">Star Wars</a>
                            </h4>
                            <span class="released">14 Dec 2017</span>
                        </div>


                        <div class="stars">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span>7.5 / 10</span>
                        </div>

                    </div>

                </div>

                <div class="item">
                    <div class="movie-box-1">
                        <div class="poster">
                            <img src="site/images/posters/poster-2.jpg" alt="">
                        </div>

                        <div class="buttons">
                            <a href="https://www.youtube.com/watch?v=N9ozvjDzE4Y" class="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>

                        <div class="movie-details">
                            <h4 class="movie-title">
                                <a href="movie-detail.html">The Brain 3</a>
                            </h4>
                            <span class="released">20 Dec 2017</span>
                        </div>

                        <div class="stars">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span>7.2 / 10</span>
                        </div>
                    </div>
                </div>


                <div class="item">
                    <div class="movie-box-1">
                        <div class="poster">
                            <img src="site/images/posters/poster-2.jpg" alt="">
                        </div>

                        <div class="buttons">
                            <a href="https://www.youtube.com/watch?v=Q0CbN8sfihY" class="play-video">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>

                        <div class="movie-details">
                            <h4 class="movie-title">
                                <a href="movie-detail.html">The Brain</a>
                            </h4>
                            <span class="released">20 Dec 2017</span>
                        </div>

                        <div class="stars">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span>7.2 / 10</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- contact section starts here -->
    <section id="contato" class="bg-contact pb-5">
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
    </section>

    <!-- end of contact section -->
    <div id="newslleter" class="newsletter pt-4 pb-4">
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
    </div>


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
                        stagePadding: 200,
                        items:4
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
        })(jQuery);
    </script>
@endsection



