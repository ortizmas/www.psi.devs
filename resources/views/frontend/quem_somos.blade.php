@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])

    <div class="hero-show p-0" id="home">
        <div class="hero-show-overlay ">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                            <header class="entry-header pt-5">
                                <h1>Quem somos</h1>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid pb-5">
        
        <div id="quemsomos">
            <div class="content-wrap">
                <section id="vision" class="section bg-light p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <img src="{{ asset('site/images/quem-somos/Bem-vindo.png') }}" class="img-fluid" alt="Nossa Visão">
                            </div>
                            <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <div class="feature-item">
                                    <h1>Seja Bem Vindo!</h1>
                                    <span class="text-gray-dark h4">A Pró-Saúde Integral</span>
                                    <p id="visao" style="font-size: 15px" class="text-muted pt-4">A Pró-Saúde Integral é uma Empresa comprometida com o DESENVOLVIMENTO DE PESSOAS e TRANSFORMAÇÃO DE VIDAS através da promoção da saúde integral, envolvendo os aspectos físico, mental, emocional e social, através da mudança de hábitos e estilo de vida, potencializando significativamente o desenvolvimento integral do ser – pessoal e profissional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="mission" class="section blue-light-2 p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="mission-text-box col-md-8 col-sm-8 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <div class="feature-item">
                                    <h1 class="title-small valores">Filosofia</h1>
                                    <span class="oriental h4">Nossas ações estão alinhadas com nossos valores</span>
                                    <p class="mission-text pt-4" style="font-size: 15px" >
                                        <strong>IMPACTAR E TRANSFORMAR VIDAS</strong>, Promovendo o desenvolvimento da saúde física, mental e social através da mudança de hábitos e estilo de vida, desenvolvendo e potencializando significativamente o desempenho para o crescimento pessoal e profissional.
 
                                    </p>
                                </div>
                            </div>
                            <div class="hide-sm col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <img src="{{ asset('site/images/quem-somos/filosofia.png') }}" class="vision-img img-fluid" alt="Nossa Filosofia">
                            </div>
                        </div>
                    </div>
                </section>

                <section id="vision" class="section white-blue p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="target-big col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <img src="{{ asset('site/images/quem-somos/visao.png') }}" class="img-fluid" alt="Nossa Visão">
                            </div>
                            <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <div class="feature-item">
                                    <h1 class="title-small valores">Missão</h1>
                                    <span class="oriental h4">A nossa razão de existência</span>
                                    <p id="visao" class="mission-text pt-4" style="font-size: 15px" ><strong>DESENVOLVER E TRANSFORMAR VIDAS</strong>, promovendo condições para o desenvolvimento integral do ser físico, mental, emocional e espiritual. Reestabelecer os princípios para uma vida cheia de significado e propósito definido nos mais amplos aspectos do ser.  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="mission" class="section blue-light-2 p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="mission-text-box col-md-8 col-sm-8 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <div class="feature-item">
                                    <h1 class="title-small valores">Visão</h1>
                                    <span class="oriental h4">Aonde nós queremos chegar</span>
                                    <p class="mission-text pt-4" style="font-size: 15px;">
                                        Ser referência nacional em <strong>DESENVOLVIMENTO PESSOAL</strong> e <strong>PROFISSIONAL</strong> e na promoção à saúde integral para saúde plena e longeva. Cremos que os seres humanos podem desenvolver saúde integral, a fim de desenvolverem uma vida mais produtiva e plena de significado.
                                    </p>
                                </div>
                            </div>
                            <div class="hide-sm col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <img src="{{ asset('site/images/quem-somos/missao.png') }}" class="vision-img img-fluid" alt="Nossa Missão">
                            </div>
                        </div>
                    </div>
                </section>

                <section id="vision" class="section white-blue p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="target-big col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <img src="{{ asset('site/images/quem-somos/lema.png') }}" class="img-fluid" alt="Nossa Visão">
                            </div>
                            <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <div class="feature-item">
                                    <h3 class="title-small valores">Lema</h3>
                                    <!--<p class="oriental">A nossa razão de existência</p>-->
                                    <p id="visao" style="color: #363636;font-size: 15px;" class="mission-text pt-4">Acessibilidade de orientação a todos que desejem saúde plena, propósito de vida definido e longevidade.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="values" class="section blue-light-2 p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-8 col-sm-8 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <div class="feature-item">
                                    <h3 class="title-small valores">Valores</h3>
                                    <p class="oriental"> </p>
                                    <ul id="Valores" class="mission-text list-item pt-4" style="font-size: 15px;">
                                        <li><i class="mdi-action-done"></i> Atendimento humanizado</li>
                                        <li><i class="mdi-action-done"></i> Confiança e respeito nas relações</li>
                                        <li><i class="mdi-action-done"></i> Transparência e ética</li>
                                        <li><i class="mdi-action-done"></i> Qualidade total em todos os processos</li>
                                        <li><i class="mdi-action-done"></i> Trabalho em equipe</li>
                                        <li><i class="mdi-action-done"></i> Inovação e Responsabilidade social</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="hide-sm col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <img src="{{ asset('site/images/quem-somos/valores.png') }}" class="vision-img img-fluid" alt="Nossos Valores">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



