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
                    <h2 class="line-one">Treinamentos</h2>
                </div>
                <div class="row justify-content-center">
                    <?php MyHelper::treinamentosTwo() ?>
                </div>
            </div>
        </div>
    </section>
    <!----//End-treinamentos----->

    <!--Inicio palestras-->
    <section class="palestras pt-5 pb-5" id="palestras">
        <div class="container-fluid">
            <div class="container-page">
                <div class="text-center">
                    <h2 class="pb-3">Palestras</h2>
                </div>
                <div class="row justify-content-center">
                    <?php MyHelper::palestras(); ?>
                </div>
            </div>
        </div>
    </section>
    <!----//End-palestras----->

    <!-- Start dores nas costas-->
{{-- 
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
    </section> --}}

    <section class="dores-costas pt-4 pb-4">
        <div class="container">
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

    
    {{-- <section class="consulting">
        <div class="container pt-3 pb-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="card">
                       <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/bologna-3.jpg" alt="Bologna">
                       <div class="card-img-overlay text-white d-flex flex-column justify-content-center align-items-center ">
                            <h4 class="card-title">CONSULTORIAS</h4>
                            <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                            <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
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
                            <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                            <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
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
                            <h6 class="card-subtitle mb-2">Emilia-Romagna Region, Italy</h6>
                            <p class="card-text">It is the seventh most populous city in Italy, at the heart of a metropolitan area of about one million people. </p>
                            <div class="link d-flex">
                                <a class="btn btn-primary btn-lg" href="#" title="">SAIBA MAIS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!------------------ Hover Effect Style : Demo - 16 --------------->
   {{-- <div class="container mt-40">
        <h3 class="text-center">Hover Effect Style : Demo - 16</h3>
        <div class="row mt-30">
            <div class="col-md-4 col-sm-6">
                <div class="box16">
                    <img src="http://bestjquery.com/tutorial/hover-effect/demo118/images/img-1.jpg">
                    <div class="box-content">
                        <h3 class="title">Williamson</h3>
                        <span class="post">Web Developer</span>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="box16">
                    <img src="http://bestjquery.com/tutorial/hover-effect/demo118/images/img-2.jpg">
                    <div class="box-content">
                        <h3 class="title">Kristiana</h3>
                        <span class="post">Web Designer</span>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="box16">
                    <img src="http://bestjquery.com/tutorial/hover-effect/demo118/images/img-3.jpg">
                    <div class="box-content">
                        <h3 class="title">Kristiana</h3>
                        <span class="post">Web Designer</span>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <section class="events-section pt-3">
        <div class="pb-0">
            <div class="container events element-animate">
                <div id="events" class="owl-carousel">
                    <div class="item">
                        <div class="events-box">
                            <div class="box16">
                                <img src="site/images/gt-slide-1.jpg">
                                <div class="box-content">
                                    <h3 class="title">CONSULTORIAS</h3>
                                    {{-- <span class="post">Web Developer</span> --}}

                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="" title="">SAIBA MAIS</a>
                                        {{-- <li><a href="" title=""> <i class="fas fa-plus"></i></a></li> --}}
                                        {{-- <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="item">
                    <div class="events-box">
                            <div class="box16">
                                <img src="site/images/gt-slide-2.jpg">
                                <div class="box-content">
                                    <h3 class="title">PROGRAMAS</h3>
                                    {{-- <span class="post">Web Developer</span> --}}
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
                                <img src="site/images/gt-slide-3.jpg">
                                <div class="box-content">
                                    <h3 class="title">ESPECIALIDADE</h3>
                                    {{-- <span class="post">Web Developer</span> --}}
                                    <ul class="social pt-5">
                                        <a class="btn btn-outline-blue rounded-0" href="" title="">SAIBA MAIS</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                  {{-- <div class="item">
                    <div class="events-box">
                        <div class="box16">
                            <img src="site/images/gt-slide-4.jpg">
                            <div class="box-content">
                                <h3 class="title">Williamson</h3>
                                <span class="post">Web Developer</span>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                  </div>

                  <div class="item">
                    <div class="events-box">
                        <div class="box16">
                            <img src="site/images/gt-slide-2.jpg">
                            <div class="box-content">
                                <h3 class="title">Williamson</h3>
                                <span class="post">Web Developer</span>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                      </div>
                  </div> --}}
                  
                </div>
              </div>
        </div>
    </section>

    <!-- Start dores nas costas-->
    {{-- <section class="events">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-6 p-0">
                    <div class="bg bg-left">
                        <h2>Create your snippet's HTML, CSS and Javascript in the editor tabs</h2>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 p-0">
                    <div class="bg bg-right">
                        <h2>Create your snippet's HTML, CSS and Javascript in the editor tabs</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
    <!-- End dores nas costas-->

    <!-- ***** Blog Area Start ***** -->
    <section class="mona-blog-area mb-50 section-padding-80-0">
        <div class="container-fluid">
            {{-- <div class="row">
                <div class="col-12">
                  <div class="section-heading text-center">
                    <h2>Latest News</h2>
                  </div>
                </div>
            </div> --}}

          <div class="row">
            <!-- Single Blog Post -->
            {{-- <div class="col-12 col-lg-4">
              <div class="single-blog-post mb-30 wow fadeInUp" data-wow-delay="100ms">
                <div class="post-thumbnail slide-post owl-carousel">
                  <a href="#"><img src="site/images/bg-img/3.jpg" alt=""></a>
                  <a href="#"><img src="site/images/bg-img/4.jpg" alt=""></a>
                </div>
                <div class="post-content">
                  <a href="#" class="post-title">How To Use Eye Shadow Like The Stars</a>
                  <span class="post-date">30 Aug 2018</span>
                </div>
              </div>
            </div> --}}

            <div class="col-12 col-lg-12">
              <div class="row">

                <!-- Single Blog Post -->
                <div class="col-12 p-0">
                    <div class="single-blog-post featured-post mb-30 wow fadeInUp" data-wow-delay="300ms">
                        
                        <div class="post-content">
                            <div class="w-100 justify-content-center align-content-center">
                                <a href="#" class="post-title text-center"><h1>EVENTOS</h1></a>
                                <span class="post-date text-center">Pró Saúde Integral</span>
                            </div>
                        </div>
                        <div class="post-thumbnail">
                            <a href="#"><img src="{{ asset('site/images/bg/bg-events-1.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </div>

                <!-- Single Blog Post -->
                {{-- <div class="col-12 col-sm-6">
                  <div class="single-blog-post mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="post-thumbnail">
                      <a href="#"><img src="site/images/bg-img/1.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                      <a href="#" class="post-title">What Curling Irons Are The Best Ones</a>
                      <span class="post-date">30 Aug 2018</span>
                    </div>
                  </div>
                </div> --}}

                <!-- Single Blog Post -->
                {{-- <div class="col-12 col-sm-6">
                  <div class="single-blog-post mb-30 wow fadeInUp" data-wow-delay="700ms">
                    <div class="post-thumbnail">
                      <a href="#"><img src="site/images/bg-img/2.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                      <a href="#" class="post-title">How To Save Money On Beauty Products</a>
                      <span class="post-date">30 Aug 2018</span>
                    </div>
                  </div>
                </div> --}}

              </div>
            </div>
          </div>
        </div>
    </section>
      <!-- ***** Blog Area End ***** -->

    <!--INFO AREA-->
    {{-- <section class="info-area gray-bg mt-4 mb-4">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="intro-image">
                        <img src="{{ asset('site/images/intro/intro-bg.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="intro-content wow fadeInRight">
                        <h6 class="high-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment so blinded as by desire, that they cannot foresee the pain and trouble that are bound to ensues; et and equal blame belongs to those who fail in their duty through weakness.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor som incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="#" class="read-more">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--INFO AREA END-->
    <section class="latest-movies pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center pb-3">
                <div class="col-md-5">
                    <h2 class="title">VÍDEOS EM DESTAQUE</h2>
                </div>
                <div class="col-md-5 align-self-center text-right">
                    <a target="_blank" href="https://www.youtube.com/channel/UCaw-0bq4ykwbyoU0Y_T24TQ?view_as=subscriber
" class="btn btn-icon btn-danger btn-effect">
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


    {{-- <section class="latest-movies pt-5">
        <div class="container">
            <div class="row pb-3">
                <div class="col-md-8">
                    <h2 class="title">VIDEOS </h2>
                </div>
                <div class="col-md-4 align-self-center text-right">
                    <a href="#" class="btn btn-icon btn-main btn-effect">
                        Ver todos
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
    </section> --}}

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
                        <div class="search_background" style="background-image:url(site/images/bg/search_background.jpg);"></div>
                        <div class="search_content text-center">
                            <h1 class="search_title">Prencha seus dados</h1>
                            <form id="search_form" class="search_form" action="post">
                                <input id="search_form_name" class="input_field search_form_name" type="text" placeholder="Nome completo" required="required" data-error="Course name is required.">
                                <input id="search_form_category" class="input_field search_form_category" type="email" placeholder="E-mail">
                                <input id="search_form_degree" class="input_field search_form_degree" type="text" placeholder="Telefone">
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


    <!-- Footer section -->
    <footer class="footer-section">
        <div class="container footer-top">
            <div class="row">
                <!-- widget -->
                <div class="col-sm-6 col-lg-3 footer-widget">
                    <div class="about-widget">
                        <img src="site/images/logo/logo-1.jpg" alt="" class="img-fluid">
                        <p>orem ipsum dolor sit amet, consecter adipiscing elite. Donec minos varius, viverra justo ut, aliquet nisl.</p>
                        <div class="social pt-1">
                            <a href=""><i class="fa fa-twitter-square"></i></a>
                            <a href=""><i class="fa fa-facebook-square"></i></a>
                            <a href=""><i class="fa fa-google-plus-square"></i></a>
                            <a href=""><i class="fa fa-linkedin-square"></i></a>
                            <a href=""><i class="fa fa-rss-square"></i></a>
                        </div>
                    </div>
                </div>
                <!-- widget -->
                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">USEFUL LINK</h6>
                    <div class="dobule-link">
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">About us</a></li>
                            <li><a href="">Services</a></li>
                            <li><a href="">Events</a></li>
                            <li><a href="">Features</a></li>
                        </ul>
                        <ul>
                            <li><a href="">Policy</a></li>
                            <li><a href="">Term</a></li>
                            <li><a href="">Help</a></li>
                            <li><a href="">FAQs</a></li>
                            <li><a href="">Site map</a></li>
                        </ul>
                    </div>
                </div>
                <!-- widget -->
                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">RECENT POST</h6>
                    <ul class="recent-post">
                        <li>
                            <p>Snackable study:How to break <br> up your master's degree</p>
                            <span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
                        </li>
                        <li>
                            <p>Open University plans major <br> cuts to number of staff</p>
                            <span><i class="fa fa-clock-o"></i>24 Mar 2018</span>
                        </li>
                    </ul>
                </div>
                <!-- widget -->
                <div class="col-sm-6 col-lg-3 footer-widget">
                    <h6 class="fw-title">CONTACT</h6>
                    <ul class="contact">
                        <li><p><i class="fa fa-map-marker"></i> 40 Baria Street 133/2, NewYork City,US</p></li>
                        <li><p><i class="fa fa-phone"></i> (+88) 111 555 666</p></li>
                        <li><p><i class="fa fa-envelope"></i> infodeercreative@gmail.com</p></li>
                        <li><p><i class="fa fa-clock-o"></i> Monday - Friday, 08:00AM - 06:00 PM</p></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- copyright -->
        <div class="copyright">
            <div class="container">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Pró Saúde Integral <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="#" target="_blank">Projeto por Edessoft</a></p>
            </div>      
        </div>
    </footer>
    <!-- Footer section end-->

    {{-- @include('frontend.partials.footer', ['some' => 'data']) --}}
    
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



