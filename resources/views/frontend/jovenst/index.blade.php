@extends('layouts.frontend.app')

@section('content')
    <div class="hero-content" id="home">
        @include('layouts.frontend.menujt', ['some' => 'data'])

        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h4>FACULDADE ADVENTISTA DA BAHIA</h4>
                                <h1>JOVENS<br/>TALENTOS</h1>
                            </header>

                            {{-- <div class="entry-content">
                                <p>O Programa Jovem Talento é uma das principais portas de entrada para quem sonha em desenvolver o seu talento em uma das melhores empresas para se trabalhar na área de saúde do Brasil.</p>
                            </div>

                            <footer class="entry-footer read-more">
                                <a href="#">Lêr mais</a>
                            </footer> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--- Sobre Nós -->
    <section class="about-section bg-white pt-5 pb-5" id="sobre-programa">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch">
                    <header class="heading">
                        <p class="text-justify">A Faculdade Adventista da Bahia, através do programa Jovens Talentos, visa apresentar aos formandos o perfil das instituições administradas pela Igreja Adventista do Sétimo Dia, tornando possível um contato direto com algumas dessas instituições através de aulas, visitas técnicas e palestras, com o intuito de inseri-los no contexto prático profissional de suas respectivas áreas e reunir formandos interessados em ingressar nas instituições adventistas, facilitando futuros contatos para carreira profissional.</p>
                    </header>
                </div>

                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                     <!-- Swiper -->
                    <div class="swiper-container swiper-sobre-jt">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="{{ asset('site/images/jovens-talentos-3.jpg') }}" alt="" class="img-fluid"></div>
                            <div class="swiper-slide"><img src="{{ asset('site/images/jovens-talentos-4.jpg') }}" alt="" class="img-fluid"></div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Inscrições-->
    <section class="inscription-section bg-dark pt-5 pb-5" id="inscricao">
        <div class="container pt-3 pb-3">
            <div class="titulo_principal pb-4">
                <h2 class="text-white text-center">INSCRIÇÃO PARA JOVENS TALENTOS</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('site/images/word.png') }}" alt="Ficha de Iinscrição" class="rounded-circle">
                    <a target="_blank" class="btn btn-sm btn-outline-dark" href="{{ asset('site/files/ficha-de-inscricao.docs') }}" ><h4 class="text-white">Ficha de Inscriçã</h4></a>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ asset('site/images/pdf.png') }}" alt="Edital de inscrição" class="rounded-circle">
                    <a target="_blank" class="btn btn-sm btn-outline-dark" href="{{ asset('site/files/edital.pdf') }}" ><h4 class="text-white">Edital de Inscriçã</h4></a>
                </div>
            </div>

        </div>
    </section>

    <!--- Jovens Talentos -->
    <section class="courses-listing bg-gray" id="nominata">
        <div class="container pt-4">
            <div class="row">
                <div class="col-12 px-25 pb-4">
                    <header class="heading flex flex-wrap justify-content-between align-items-center">
                        <h2 class="entry-title text-gray-dark">JOVENS TALENTOS</h2>

                        <div class="btn-group">
                            <button class="btn btn-outline-info" data-toggle="portfilter" data-target="all">
                                TODOS
                            </button>
                            <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                SELECIONAR POR CURSO
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                <button class="dropdown-item" data-toggle="portfilter" data-target="all">
                                    Todos os cursos
                                </button>
                                @if (isset($cursos))
                                    @foreach ($cursos as $curso)
                                        <button class="dropdown-item" data-toggle="portfilter" data-target="{{ $curso->slug }}">
                                            {{ $curso->name }}
                                        </button>
                                    @endforeach
                                @endif
                            
                            </div>
                        </div>
                    </header>
                </div>

                @if (isset($trainees))
                    @foreach ($trainees as $trainee)
                        <div class="col-lg-4 col-md-6" data-tag="{{ $trainee->course->slug }}">
                            <div class="course">
                                <div class="course-image">
                                    <img src="{{ asset('uploads/trainees/'. $trainee->image) }}" alt="{{ $trainee->name }}" class="img-fluid" style="height: auto;">
                                    <div class="overlay flex-column d-flex align-items-center justify-content-center">
                                        <div class="instructor-avatar">
                                            <img src="{{ asset('uploads/trainees/'. $trainee->image) }}" alt="{{ $trainee->name }}">
                                        </div>
                                        <div class="instructor-name"><a href="#" class="no-anchor-style"><strong>{{ $trainee->name }}</strong></a></div>
                                        <b>{{ $trainee->course->name }}</b>
                                        <a href="{{ route('info.show', $trainee->slug) }}" class="watch-btn"><i class="fa fa-plus"></i>INFO</a>
                                    </div>
                                </div>
                                <div class="course-header p-3">
                                    <a href="{{ route('info.show', $trainee->slug) }}" class="no-anchor-style">
                                        <h3 class="h5">{{ $trainee->name }}</h3>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="category"><i class="fa fa-tags"></i><a href="#">{{ $trainee->course->name }}</a></div>
                                        <div class="price"><strong><small>ANO </small> {{ $trainee->period->year }}</strong></div>
                                    </div>
                                </div>
                                <div class="course-body pl-3 pr-3">
                                    <p class="text-justify">{{ $trainee->description }}</p>
                                </div>
                                <hr>
                                <div class="course-footer d-flex align-items-center justify-content-between pt-0 pl-3 pr-3 pb-3">
                                    <div class="user"><i class="icon-users"></i><span>{{ $trainee->age }} Anos</span></div>
                                    <div class="comments"><i class="icon-chat"></i><span>{{ $trainee->email }}</span></div>
                                    <div class="duration"><i class="icon-clock-1"></i><span>{{ LongTimeFilter($trainee->created_at) }}</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-12 px-25 flex justify-content-center pt-4 pb-5">
                <button class="btn btn-small bg-lilas text-white" data-toggle="portfilter" data-target="all">
                    Ver todos
                </button>
            </div>
        </div>
    </section>

    <div class="clients-logo" id="cursos">
        <div class="container">
            <div class="row">
                <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="logo-wrap text-center">
                        <img src="{{ asset('site/images/cursos/curso-1.png') }}" alt=""><br>
                        <b>ADMINISTRAÇÃO</b>
                    </div>

                    <div class="logo-wrap text-center">
                        <img src="{{ asset('site/images/cursos/curso-2.png') }}" alt=""><br>
                        <b>CIÊNCIAS CONTÁBEIS</b>
                    </div>

                    <div class="logo-wrap text-center">
                        <img src="{{ asset('site/images/cursos/curso-3.png') }}" alt=""><br>
                        <b>GESTÃO DE TECNOLOGIA DA INFORMAÇÃO</b>
                    </div>

                    <div class="logo-wrap text-center">
                        <img src="{{ asset('site/images/cursos/curso-4.png') }}" alt=""><br>
                        <b>PEDAGOGIA</b>
                    </div>

                    <div class="logo-wrap text-center">
                        <img src="{{ asset('site/images/cursos/curso-5.png') }}" alt=""><br>
                        <b>PSICOLOGIA</b>
                    </div>

                    <div class="logo-wrap text-center">
                        <img src="{{ asset('site/images/cursos/curso-6.png') }}" alt=""><br>
                        <b>SECRETARIADO</b>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <section class="testimonial-section pt-5 pb-5" id="organizacao">
        <div class="swiper-container testimonial-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 order-2 order-lg-1 flex align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
                                    <img src="site/images/user-1.jpg" alt="">
                                </figure>
                            </div>

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>Together as teachers, students and universities we can help make this education available for everyone.</p>
                                </div>

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">Russell Stephens - <span>University in UK</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 order-2 order-lg-1 flex align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
                                    <img src="site/images/user-2.jpg" alt="">
                                </figure>
                            </div>

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">Robert Stephens - <span>University in Oxford</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 flex order-2 order-lg-1 align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
                                    <img src="site/images/user-3.jpg" alt="">
                                </figure>
                            </div>

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                                </div>

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">James Stephens - <span>University in Cambridge</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                        <div class="swiper-pagination position-relative flex justify-content-center align-items-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!--- Jovens Talentos empregados -->
    <section class="courses-listing bg-faded" id="nominata">
        <div class="container pt-4">
            <div class="row">
                <div class="col-12 px-25 pb-4">
                    <header class="heading flex flex-wrap justify-content-between align-items-center">
                        <h2 class="entry-title text-gray-dark">JOVENS TALENTOS EMPREGADOS</h2>

                        <div class="btn-group">
                            <button class="btn btn-outline-info" data-toggle="empregadosfilter" data-target="all">
                                TODOS
                            </button>
                            <button type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                SELECIONAR POR CURSO
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                <button class="dropdown-item" data-toggle="empregadosfilter" data-target="all">
                                    Todos os cursos
                                </button>
                                @if (isset($cursos))
                                    @foreach ($cursos as $curso)
                                        <button class="dropdown-item" data-toggle="empregadosfilter" data-target="{{ $curso->slug }}_tab">
                                            {{ $curso->name }}
                                        </button>
                                    @endforeach
                                @endif
                            
                            </div>
                        </div>
                    </header>
                </div>

                @if (isset($young_employees))
                    @foreach ($young_employees as $employee)
                        <div class="col-lg-3 col-md-3" data-tags="{{ $employee->course->slug }}_tab">
                            <div class="card p-3">
                                <img src="{{ asset('uploads/trainees/'. $employee->image) }}" alt="{{ $employee->name }}" class="card-img-top rounded-circle">
                                <div class="card-body text-center">
                                    <h6 class="card-title text-muted">{{ $employee->name }}</h6>
                                    <p class="card-text">{{ $employee->office }} <br>
                                    <b class="text-muted">Em {{ $employee->company }}</b> </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-12 px-25 flex justify-content-center pt-4 pb-5">
                <button class="btn btn-small bg-lilas text-white" data-toggle="empregadosfilter" data-target="all">
                    Ver todos
                </button>
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



