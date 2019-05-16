@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="container-fluid pb-5">
        <div class="hero-show" id="home">
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
        <div id="quemsomos">
            <div class="content-wrap">
                <section id="vision" class="section bg-blue p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <img src="http://prosaudeintegral.com.br/img/psi/Bem-vindo.png" class="img-fluid" alt="Nossa Visão">
                            </div>
                            <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <div class="feature-item">
                                    <h3 class="title-small valores">Seja Bem Vindo!</h3>
                                    <p class="oriental">A Pró-Saúde Integral </p>
                                    <p id="visao" style="color: #363636;" class="mission-text">A Pró-Saúde Integral é uma Empresa comprometida com a promoção da saúde integral envolvendo os aspectos físico, mental e social através da mudança de hábitos e estilo de vida, potencializando significativamente o desenvolvimento integral do ser e o desenvolvimento intra e inter-pessoal. </p>
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
                                    <h3 class="title-small valores">Filosofia</h3>
                                    <p class="oriental">Nossas ações estão alinhadas com nossos valores</p>
                                    <p class="mission-text">
                                        Promover a saúde física, mental e social através da mudança de hábitos e estilo de vida, potencializando significativamente o desempenho intra e inter-pessoal e profissional, desenvolvendo maior sociabilidade no ambiente de trabalho e demais grupos sociais. 
                                    </p>
                                </div>
                            </div>
                            <div class="hide-sm col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <img src="http://prosaudeintegral.com.br/img/psi/filosofia.png" class="vision-img img-fluid" alt="Nossa Missão">
                            </div>
                        </div>
                    </div>
                </section>

                <section id="vision" class="section white-blue p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="target-big col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <img src="http://prosaudeintegral.com.br/img/psi/visao.png" class="img-fluid" alt="Nossa Visão">
                            </div>
                            <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <div class="feature-item">
                                    <h3 class="title-small valores">Missão</h3>
                                    <p class="oriental">A nossa razão de existência</p>
                                    <p id="visao" style="color: #363636;" class="mission-text">Atuar, através de uma experiente equipe multidisciplinar de profissionais especializados, de forma dinâmica, criativa, consciente e com qualidade, promovendo através do cuidado integral, condições para que os clientes e as corporações empresariais desenvolvam suas atividades com segurança, conforto e maior eficiência, obtendo produtividade com qualidade. Facilitar o acesso das pessoas a orientações quanto a um viver saudável, Promovendo a recuperação do estado de saúde de nossos clientes, através de métodos comprovadamente eficientes e com atenção personalizada, utilizando métodos preventivos. </p>
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
                                    <h3 class="title-small valores">Visão</h3>
                                    <p class="oriental">Aonde nós queremos chegar</p>
                                    <p class="mission-text">
                                        Ser referência em atendimento e promoção da saúde, através do conceito que parte da prevenção e diagnóstico para oferecer muito mais qualidade de vida. Cremos que os seres humanos podem adquirir melhor saúde a fim de desenvolverem uma vida mais produtiva e plena de sentido que dê valor e dignidade à essa existência, ajudando os semelhantes a viverem com dignidade no presente e ensinando-os a serem mais longevos e com qualidade de vida.
                                    </p>
                                </div>
                            </div>
                            <div class="hide-sm col-md-4 col-sm-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <img src="http://prosaudeintegral.com.br/img/psi/missao.png" class="vision-img img-fluid" alt="Nossa Missão">
                            </div>
                        </div>
                    </div>
                </section>

                <section id="vision" class="section white-blue p-3">
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-center">
                            <div class="target-big col-md-4 col-sm-4 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                                <img src="http://prosaudeintegral.com.br/img/psi/lema.png" class="img-fluid" alt="Nossa Visão">
                            </div>
                            <div class="col-md-8 col-sm-8 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInRight;">
                                <div class="feature-item">
                                    <h3 class="title-small valores">Lema</h3>
                                    <!--<p class="oriental">A nossa razão de existência</p>-->
                                    <p id="visao" style="color: #363636;" class="mission-text">Acesso à saúde integral e acessibilidade a todos que desejam mais saúde e longevidade.</p>
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
                                    <ul id="Valores" class="mission-text list-item">
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
                                <img src="http://prosaudeintegral.com.br/img/psi/valores.png" class="vision-img img-fluid" alt="Nossos Valores">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



