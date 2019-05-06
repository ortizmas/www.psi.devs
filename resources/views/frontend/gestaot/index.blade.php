@extends('layouts.frontend.psi')

@section('content')
    @include('layouts.frontend.menu', ['some' => 'data'])
    <div class="hero-content" id="home" style="background: url(/site/images/bg-gt-5.jpg) no-repeat center;">
        

        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-content-wrap hero-content-wrap-gt flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h1>GESTÃO<br/><strong class="text-danger font-weight-bold">DE TALENTOS</strong></h1>
                                <h3 class="text-white font-weight-bold">FACULDADE ADVENTISTA DA BAHIA</h3>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--- Sobre Nós -->
    <section class="about-section bg-white pt-5 pb-5" id="sobre-programa">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 align-content-lg-stretch">
                    <header class="heading">
                        <p class="text-justify">
                            A Faculdade Adventista da Bahia está localizada no Recôncavo Baiano, oferece aos seus alunos modernas instalações, ensino de alta qualidade e uma experiência educacional excepcional. <br>

                            A instituição tem um corpo discente diversificado, com uma perspectiva bastante singular, com alunos de todos os estados do Brasil e de vários países do mundo. Há um compromisso institucional forte com a qualidade, colocando a Faculdade em uma trajetória ambiciosa, que procura consolidar sua posição crescente, desenvolvendo um portfólio inovador e de forte presença social, baseado nos princípios cristãos.
                            Em suma, ser um colaborador da Faculdade Adventista da Bahia é fazer parte de um mundo voltado à educação, sem esquecer das pessoas. Este é o principal diferencial daquele que está em nossas salas de aula, nos escritórios e oficinas. Aqui o funcionário tem a “missão no coração”. Se você deseja fazer parte deste grupo seleto, envie-nos seu currículo candidatando-se às vagas abertas.
                            <br>
                            O Sistema Adventista de Educação está presente em 115 países, representada por 7.883 instituições da educação infantil ao ensino superior, com aproximadamente 90 mil professores comprometidos na formação de aproximadamente 1,8 milhão de alunos. Na América do Sul, existem 888 instituições com 277 mil alunos ao todo, distribuídos no ensino fundamental, médio e superior. Atualmente no Brasil, a rede conta com mais de 450 unidades escolares, 10 mil professores e cerca de 180 mil alunos. Além dessas unidades, a organização mantém 15 colégios em regime de internato, sendo que sete deles oferecem da educação básica à graduação, na América do Sul são cerca de 26 mil estudantes da educação superior (EDUCAÇÃO ADVENTISTA, 2013).
                        </p>
                    </header>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                     <!-- Swiper -->
                    <div class="swiper-container testimonial-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="site/images/gt-slide-1.jpg" alt="" class="img-fluid"></div>
                            <div class="swiper-slide"><img src="site/images/gt-slide-2.jpg" alt="" class="img-fluid"></div>
                            <div class="swiper-slide"><img src="site/images/gt-slide-3.jpg" alt="" class="img-fluid"></div>
                            <div class="swiper-slide"><img src="site/images/gt-slide-4.jpg" alt="" class="img-fluid"></div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <div class="follow-us">
                            <ul class="follow-us flex flex-wrap align-items-center">
                                <li><a target="_blank" href="https://www.facebook.com/gtfadba/"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" href="https://www.instagram.com/gtfadba/"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="footer-bar-nav">
                            <ul class="flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                                <li><a href="#">SOBRE O PROGRAMA</a></li>
                                <li><a href="#">INSCRIÇÕES</a></li>
                                <li><a href="#">NOMINATA 2018</a></li>
                                <li><a href="#">CURSOS PARTICIPANTES</a></li>
                                <li><a href="#">ORGANIZAÇÃO</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copy bg-dark">
            <div class="container pt-3 pb-1">
                <div class="row flex-wrap justify-content-center align-items-center">
                    <div class="col-12 col-lg-8 align-items-center">
                        <p class="text-muted text-center">FADBA - Faculdade Adventista da Bahia - © 2019 - Todos os direitos reservados.
                            Uma instituição do Sistema Educacional Adventista - Igreja Adventista do Sétimo Dia</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection



