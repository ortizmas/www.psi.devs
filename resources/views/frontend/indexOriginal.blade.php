@extends('layouts.frontend.app')

@section('content')
    <div class="hero-content">
        @include('layouts.frontend.menu', ['some' => 'data'])

        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h4>FACULDADE ADVENTISTA DA BAHIA</h4>
                                <h1>JOVENS<br/>TALENTOS</h1>
                            </header>

                            <div class="entry-content">
                                <p>O Programa Jovem Talento é uma das principais portas de entrada para quem sonha em desenvolver o seu talento em uma das melhores empresas para se trabalhar na área de saúde do Brasil.</p>
                            </div>

                            <footer class="entry-footer read-more">
                                <a href="#">Lêr mais</a>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- Jovens Talentos -->
    <section class="featured-courses vertical-column courses-wrap">
        <div class="container">
            <div class="row mx-m-25">
                <div class="col-12 px-25">
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
                                {{-- <button class="dropdown-item" type="button">Action</button>
                                <button class="dropdown-item" type="button">Another action</button>
                                <button class="dropdown-item" type="button">Something else here</button> --}}
                                <button class="dropdown-item" data-toggle="portfilter" data-target="all">
                                    Todos os cursos
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="business">
                                    Administração
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="design">
                                    Ciências Contábeis
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="web">
                                    Enfermagem
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Fisioterapia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="gti">
                                    Gestão de TI
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="odontologia">
                                    Odontologia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Pedagogia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Psicologia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Secretariado
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Nutrição
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Teologia
                                </button>
                            </div>
                        </div>

                        {{-- <nav class="courses-menu mt-3 mt-lg-0">
                            <button class="link" data-toggle="portfilter" data-target="all">
                                Todos
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="business">
                                Administração
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="design">
                                Ciências Contábeis
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="web">
                                Enfermagem
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="photography">
                                Fisioterapia
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="gti">
                                Gestão de TI
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="odontologia">
                                Odontologia
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="photography">
                                Pedagogia
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="photography">
                                Psicologia
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="photography">
                                Secretariado
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="photography">
                                Nutrição
                            </button>
                            <button class="link" data-toggle="portfilter" data-target="photography">
                                Teologia
                            </button>
                        </nav> --}}
                    </header>
                </div>

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="business">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/1.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Complete Android Developer Course</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="course-date">July 21, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $45 <span class="price-drop">$68</span>
                                </div>

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="design">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/2.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Ultimate Drawing Course Beginner to Advanced</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Michelle Golden</a></div>

                                    <div class="course-date">Mar 14, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div>

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="photography">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/3.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Complete Digital Marketing Course</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lucius</a></div>

                                    <div class="course-date">Dec 18, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $55 <span class="price-drop">$78</span>
                                </div>

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="business">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/4.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Unreal Engine Developer Course</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Mr. John Wick</a></div>

                                    <div class="course-date">Otc 17, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div>

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="design">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/5.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Progressive Web Apps (PWA) - The Complete Guide</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Mr. Tom Redder</a></div>

                                    <div class="course-date">Sep 14, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $38 <span class="price-drop">$48</span>
                                </div>

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="web">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/6.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Cryptocurrency Investment Course 2018</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Russell Stephens</a></div>

                                    <div class="course-date">Nov 06, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div>

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="web">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/6.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Cryptocurrency Investment Course 2018</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Russell Stephens</a></div>

                                    <div class="course-date">Nov 06, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div>

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 px-25 flex justify-content-center pt-4">
                    {{-- <a class="btn" href="#">view all courses</a> --}}
                    <button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="all">
                        view all courses
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="courses-listing bg-gray pt-0">
        <div class="container">
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
                                <button class="dropdown-item" data-toggle="portfilter" data-target="business">
                                    Administração
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="design">
                                    Ciências Contábeis
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="web">
                                    Enfermagem
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Fisioterapia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="gti">
                                    Gestão de TI
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="odontologia">
                                    Odontologia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Pedagogia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Psicologia
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Secretariado
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Nutrição
                                </button>
                                <button class="dropdown-item" data-toggle="portfilter" data-target="photography">
                                    Teologia
                                </button>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="col-lg-4 col-md-6" data-tag="business">
                    <div class="course">
                      <div class="course-image"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/course-img-1.jpg" alt="Photoshop Essentials">
                        <div class="overlay flex-column d-flex align-items-center justify-content-center">
                          <div class="instructor-avatar"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar.jpg" alt="Richard Vardy" class="img-fluid"></div>
                          <div class="instructor-name"><a href="#" class="no-anchor-style"><strong>Richard Vardy</strong></a></div>
                          <ul class="instructor-rate list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                          </ul><a href="#" class="watch-btn"><i class="fa fa-eye">       </i>Watch Now</a>
                        </div>
                      </div>
                      <div class="course-header pb-1"><a href="course-detail.html" class="no-anchor-style">
                          <h3 class="h5">Photoshop Essentials</h3></a>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="category"><i class="fa fa-tags"></i><a href="#">photoshop</a></div>
                          <div class="price"><strong><small>USD </small> 95.99</strong></div>
                        </div>
                      </div>
                      <div class="course-body">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <hr>
                      <div class="course-footer d-flex align-items-center justify-content-between">
                        <div class="user"><i class="icon-users"></i><span>340</span></div>
                        <div class="comments"><i class="icon-chat"></i><span>340</span></div>
                        <div class="duration"><i class="icon-clock-1"></i><span>10 weeks</span></div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-tag="business">
                    <div class="course">
                        <div class="course-image">
                            <img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/course-img-2.jpeg" alt="Electrical Engineering">
                            <div class="overlay flex-column d-flex align-items-center justify-content-center">
                                <div class="instructor-avatar">
                                    <img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar.jpg" alt="Richard Vardy" class="img-fluid">
                                </div>
                                <div class="instructor-name">
                                    <a href="#" class="no-anchor-style"><strong>Richard Vardy</strong></a>
                                </div>
                                <ul class="instructor-rate list-inline">
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                </ul>
                                <a href="#" class="watch-btn"><i class="fa fa-eye">       </i>Watch Now</a>
                            </div>
                        </div>
                        <div class="course-header pb-1"><a href="course-detail.html" class="no-anchor-style">
                            <h3 class="h5">Electrical Engineering</h3></a>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="category"><i class="fa fa-tags"></i><a href="#">Engineering</a></div>
                                <div class="price"><strong><small> </small> Free</strong></div>
                            </div>
                        </div>
                        <div class="course-body">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                        </div>
                        <hr>
                        <div class="course-footer d-flex align-items-center justify-content-between">
                            <div class="user"><i class="icon-users"></i><span>340</span></div>
                            <div class="comments"><i class="icon-chat"></i><span>340</span></div>
                            <div class="duration"><i class="icon-clock-1"></i><span>10 weeks</span></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-tag="web">
                    <div class="course">
                      <div class="course-image"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/course-img-3.jpg" alt="Agricultural Management">
                        <div class="overlay flex-column d-flex align-items-center justify-content-center">
                          <div class="instructor-avatar"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar.jpg" alt="Richard Vardy" class="img-fluid"></div>
                          <div class="instructor-name"><a href="#" class="no-anchor-style"><strong>Richard Vardy</strong></a></div>
                          <ul class="instructor-rate list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                          </ul><a href="#" class="watch-btn"><i class="fa fa-eye">       </i>Watch Now</a>
                        </div>
                      </div>
                      <div class="course-header pb-1"><a href="course-detail.html" class="no-anchor-style">
                          <h3 class="h5">Agricultural Management</h3></a>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="category"><i class="fa fa-tags"></i><a href="#">Agriculture</a></div>
                          <div class="price"><strong><small>USD </small> 95.99</strong></div>
                        </div>
                      </div>
                      <div class="course-body">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <hr>
                      <div class="course-footer d-flex align-items-center justify-content-between">
                        <div class="user"><i class="icon-users"></i><span>340</span></div>
                        <div class="comments"><i class="icon-chat"></i><span>340</span></div>
                        <div class="duration"><i class="icon-clock-1"></i><span>10 weeks</span></div>
                      </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-tag="web">
                    <div class="course">
                      <div class="course-image"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/course-img-4.jpeg" alt="Graphic Art">
                        <div class="overlay flex-column d-flex align-items-center justify-content-center">
                          <div class="instructor-avatar"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar.jpg" alt="Richard Vardy" class="img-fluid"></div>
                          <div class="instructor-name"><a href="#" class="no-anchor-style"><strong>Richard Vardy</strong></a></div>
                          <ul class="instructor-rate list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                          </ul><a href="#" class="watch-btn"><i class="fa fa-eye">       </i>Watch Now</a>
                        </div>
                      </div>
                      <div class="course-header pb-1"><a href="course-detail.html" class="no-anchor-style">
                          <h3 class="h5">Graphic Art</h3></a>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="category"><i class="fa fa-tags"></i><a href="#">Art</a></div>
                          <div class="price"><strong><small>USD </small> 95.99</strong></div>
                        </div>
                      </div>
                      <div class="course-body">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <hr>
                      <div class="course-footer d-flex align-items-center justify-content-between">
                        <div class="user"><i class="icon-users"></i><span>340</span></div>
                        <div class="comments"><i class="icon-chat"></i><span>340</span></div>
                        <div class="duration"><i class="icon-clock-1"></i><span>10 weeks</span></div>
                      </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-tag="gti">
                    <div class="course">
                      <div class="course-image"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/course-img-5.jpeg" alt="Electrical Engineering">
                        <div class="overlay flex-column d-flex align-items-center justify-content-center">
                          <div class="instructor-avatar"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar.jpg" alt="Richard Vardy" class="img-fluid"></div>
                          <div class="instructor-name"><a href="#" class="no-anchor-style"><strong>Richard Vardy</strong></a></div>
                          <ul class="instructor-rate list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                          </ul><a href="#" class="watch-btn"><i class="fa fa-eye">       </i>Watch Now</a>
                        </div>
                      </div>
                      <div class="course-header pb-1"><a href="course-detail.html" class="no-anchor-style">
                          <h3 class="h5">Electrical Engineering</h3></a>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="category"><i class="fa fa-tags"></i><a href="#">Engineering</a></div>
                          <div class="price"><strong><small>USD </small> 95.99</strong></div>
                        </div>
                      </div>
                      <div class="course-body">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <hr>
                      <div class="course-footer d-flex align-items-center justify-content-between">
                        <div class="user"><i class="icon-users"></i><span>340</span></div>
                        <div class="comments"><i class="icon-chat"></i><span>340</span></div>
                        <div class="duration"><i class="icon-clock-1"></i><span>10 weeks</span></div>
                      </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-tag="gti">
                    <div class="course">
                      <div class="course-image"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/course-img-6.jpeg" alt="Agricultural Management">
                        <div class="overlay flex-column d-flex align-items-center justify-content-center">
                          <div class="instructor-avatar"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/avatar.jpg" alt="Richard Vardy" class="img-fluid"></div>
                          <div class="instructor-name"><a href="#" class="no-anchor-style"><strong>Richard Vardy</strong></a></div>
                          <ul class="instructor-rate list-inline">
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                          </ul><a href="#" class="watch-btn"><i class="fa fa-eye">       </i>Watch Now</a>
                        </div>
                      </div>
                      <div class="course-header pb-1"><a href="course-detail.html" class="no-anchor-style">
                          <h3 class="h5">Agricultural Management</h3></a>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="category"><i class="fa fa-tags"></i><a href="#">Agriculture</a></div>
                          <div class="price"><strong><small>USD </small> 95.99</strong></div>
                        </div>
                      </div>
                      <div class="course-body">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <hr>
                      <div class="course-footer d-flex align-items-center justify-content-between">
                        <div class="user"><i class="icon-users"></i><span>340</span></div>
                        <div class="comments"><i class="icon-chat"></i><span>340</span></div>
                        <div class="duration"><i class="icon-clock-1"></i><span>10 weeks</span></div>
                      </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
                </ul>
            </nav>
        </div>
    </section>

    <div class="icon-boxes">
        <div class="container-fluid">
            <div class="flex flex-wrap align-items-stretch">
                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-user"></span>
                    </div>

                    <header class="entry-header">
                        <h2 class="entry-title">Learn From The Experts</h2>
                    </header>

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div>

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer>
                </div>

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-folder"></span>
                    </div>

                    <header class="entry-header">
                        <h2 class="entry-title">Book Library & Store</h2>
                    </header>

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div>

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer>
                </div>

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-book"></span>
                    </div>

                    <header class="entry-header">
                        <h2 class="entry-title">Best Course Online</h2>
                    </header>

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div>

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer>
                </div>

                <div class="icon-box">
                    <div class="icon">
                        <span class="ti-world"></span>
                    </div>

                    <header class="entry-header">
                        <h2 class="entry-title">Best Industry Leaders</h2>
                    </header>

                    <div class="entry-content">
                        <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div>

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <section class="featured-courses horizontal-column courses-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center">
                        <h2 class="entry-title">Featured Courses</h2>

                        <a class="btn mt-4 mt-sm-0" href="#">view all</a>
                    </header>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/1.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <div class="course-ratings flex align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>

                                <h2 class="entry-title"><a href="#">The Complete Android Developer Course</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="course-date">July 21, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/2.jpg" alt=""></a>
                        </figure>

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <div class="course-ratings flex align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div>

                                <h2 class="entry-title"><a href="#">Learn Photoshop, Web Design & Profitable</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Mr. John Wick</a></div>

                                    <div class="course-date">Aug 21, 2018</div>
                                </div>
                            </header>

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $32 <span class="price-drop">$59</span>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch">
                    <header class="heading">
                        <h2 class="entry-title">About Ezuca</h2>

                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                    </header>

                    <div class="entry-content ezuca-stats">
                        <div class="stats-wrap flex flex-wrap justify-content-lg-between">
                            <div class="stats-count">
                                50<span>M+</span>
                                <p>STUDENTS LEARNING</p>
                            </div>

                            <div class="stats-count">
                                30<span>K+</span>
                                <p>ACTIVE COURSES</p>
                            </div>

                            <div class="stats-count">
                                340<span>M+</span>
                                <p>INSTRUCTORS ONLINE</p>
                            </div>

                            <div class="stats-count">
                                20<span>+</span>
                                <p>Country Reached</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
                    <div class="ezuca-video position-relative">
                        <div class="video-play-btn position-absolute">
                            <img src="site/images/video-icon.png" alt="Video Play">
                        </div>

                        <img src="site/images/video-screenshot.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section">
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
    </section>

    <section class="latest-news-events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center">
                        <h2 class="entry-title">Latest News & Events</h2>
                    </header>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="featured-event-content">
                        <figure class="event-thumbnail position-relative m-0">
                            <a href="#"><img src="site/images/event-1.jpg" alt=""></a>

                            <div class="posted-date position-absolute">
                                <div class="day">23</div>
                                <div class="month">mar</div>
                            </div>
                        </figure>

                        <header class="entry-header flex flex-wrap align-items-center">
                            <h2 class="entry-title"><a href="#">The Complete Financial Analyst Training & Investing Course</a></h2>

                            <div class="event-location"><i class="fa fa-map-marker"></i>40 Baria Sreet 133/2 NewYork City, US</div>

                            <div class="event-duration"><i class="fa fa-calendar"></i>10 Dec - 12 dec</div>
                        </header>
                    </div>
                </div>

                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <div class="event-content flex flex-wrap justify-content-between align-content-stretch">
                        <figure class="event-thumbnail">
                            <a href="#"><img src="site/images/event-2.jpg" alt=""></a>
                        </figure>

                        <div class="event-content-wrap">
                            <header class="entry-header">
                                <div class="posted-date">
                                    <i class="fa fa-calendar"></i> 22 Mar 2018
                                </div>

                                <h2 class="entry-title"><a href="#">Personalized online learning experience</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="post-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="post-comments">02 Comments  </div>
                                </div>
                            </header>

                            <div class="entry-content">
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                            </div>
                        </div>
                    </div>

                    <div class="event-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="event-thumbnail">
                            <a href="#"><img src="site/images/event-3.jpg" alt=""></a>
                        </figure>

                        <div class="event-content-wrap">
                            <header class="entry-header">
                                <div class="posted-date">
                                    <i class="fa fa-calendar"></i> 22 Mar 2018
                                </div>

                                <h2 class="entry-title"><a href="#">Which investment project should my company choose?</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="post-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="post-comments">02 Comments  </div>
                                </div>
                            </header>

                            <div class="entry-content">
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-gallery">
        <div class="gallery-wrap flex flex-wrap">
            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/a.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/b.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid2x2">
                <a href="#"><img src="site/images/c.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/d.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/e.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid2x1">
                <a href="#"><img src="site/images/g.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid2x1">
                <a href="#"><img src="site/images/h.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/i.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid2x2 ">
                <a href="#"><img src="site/images/j.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/k.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/l.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid2x1">
                <a href="#"><img src="site/images/m.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid3x1">
                <a href="#"><img src="site/images/n.jpg" alt=""></a>
            </div><!-- .gallery-grid -->

            <div class="gallery-grid gallery-grid1x1">
                <a href="#"><img src="site/images/o.jpg" alt=""></a>
            </div><!-- .gallery-grid -->
        </div><!-- .gallery-wrap -->
    </section>

    <div class="clients-logo">
        <div class="container">
            <div class="row">
                <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="logo-wrap">
                        <img src="site/images/logo-1.png" alt="">
                    </div>

                    <div class="logo-wrap">
                        <img src="site/images/logo-2.png" alt="">
                    </div>

                    <div class="logo-wrap">
                        <img src="site/images/logo-3.png" alt="">
                    </div>

                    <div class="logo-wrap">
                        <img src="site/images/logo-4.png" alt="">
                    </div>

                    <div class="logo-wrap">
                        <img src="site/images/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            <a class="foot-logo" href="#"><img src="site/images/foot-logo.png" alt=""></a>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese mollit anim id est laborum. </p>
                            <p class="footer-copyright">
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                        <div class="foot-contact">
                            <h2>Contact Us</h2>

                            <ul>
                                <li>Email: info.deertcreative@gmail.com</li>
                                <li>Phone: (+88) 111 555 666</li>
                                <li>Address: 40 Baria Sreet 133/2 NewYork City, US</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                        <div class="quick-links flex flex-wrap">
                            <h2 class="w-100">Quick Links</h2>

                            <ul class="w-50">
                                <li><a href="#">About </a></li>
                                <li><a href="#">Terms of Use </a></li>
                                <li><a href="#">Privacy Policy </a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>

                            <ul class="w-50">
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Forums</a></li>
                                <li><a href="#">Language Packs</a></li>
                                <li><a href="#">Release Status</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                        <div class="follow-us">
                            <h2>Follow Us</h2>

                            <ul class="follow-us flex flex-wrap align-items-center">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="download-apps flex flex-wrap justify-content-center justify-content-lg-start align-items-center">
                            <a href="#"><img src="site/images/app-store.png" alt=""></a>
                            <a href="#"><img src="site/images/play-store.png" alt=""></a>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                        <div class="footer-bar-nav">
                            <ul class="flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                                <li><a href="#">DPA</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
