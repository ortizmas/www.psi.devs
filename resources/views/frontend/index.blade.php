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

    <!-- Start dores nas costas-->
    <section class="dores-costas pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="dc-box bg-img">
                        <div class="content">
                            <h2 class="text-white">title of the image</h2>
                            <p class="text-white">content here</p>
                        </div>
                        <img class="img-fluid" src="{{ asset('site/images/bg/bg-dores-costas.jpg') }}" alt="Dores nas costas" />
                    </div>
                </div>
            </div>
        </div>
    </section>

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



