@extends('layouts.frontend.cursos')

@section('styles')
     
@endsection

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="container-fluid pl-0 pb-5 pr-0">
        <div class="hero-show" id="home">
            <div class="hero-show-overlay"> <!--full-width-streamer-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                                <header class="entry-header pt-5">
                                    <h1 class="text-white">{{$course->name}}</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section pt-0">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mb-5">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded">
                        {{-- <h2 class="section-title-underline mb-3">
                            <span>{{$course->name}}</span>
                        </h2> --}}
                        <p class="text-justify">{!! $course->description !!}</p>
                        <a href="{{ route('preregister.create', $course->url) }}" class="btn btn-outline-dark text-dark btn-sm w-100">Adquerir agora</a>
                    </div>
                </div>

                <div class="col-lg-4"> 
                    <h3 class="mb-3 text-grey">
                        <span>Detalhes do curso</span>
                    </h3>
                    <p><strong>Duração do curso: </strong> 15 horas</p>

                    <a href="{{ route('preregister.create', $course->url) }}" class="btn btn-outline-dark text-dark btn-sm w-100">Comprar agora</a>
                    <div class="text-center">
                        <span class="text-muted">Garantia de devolução do dinheiro em 30 dias</span>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-12">
                <div class="owl-slide-3 owl-carousel">
                    @if ($courses)
                        @foreach ($courses as $course)
                            <div class="course-1-item">
                                <figure class="thumnail">
                                <a href="course-single.html"><img src="{{ asset('storage/courses/'. $course->image) }}" alt="Image" class="img-fluid"></a>
                                <div class="price">R$ {{$course->price}}</div>
                                <div class="category"><h3>Cursos e Treinamentos</h3></div>  
                                </figure>
                                <div class="course-1-content pb-4">
                                <h2>{{$course->name}}</h2>
                                <p><a href="{{ route('cursos.show', $course->url) }}" class="btn btn-primary rounded-0 px-4">Mais detalher</a></p>
                                </div>
                            </div>
                        @endforeach
                    @endif        
                </div>
        
            </div>
            </div>

            
            
        </div>
        </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection

@section('scripts')
    <script>
    jQuery(document).ready(function($) {
        var siteCarousel = function () {

            if ( $('.hero-slide').length > 0 ) {
                $('.hero-slide').owlCarousel({
                    items: 1,
                    loop: true,
                    margin: 0,
                    autoplay: true,
                    nav: true,
                    dots: true,
                    navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                    smartSpeed: 1000
                });
            }

            if ( $('.owl-slide-3').length > 0 ) {
                $('.owl-slide-3').owlCarousel({
                    center: false,
                    items: 1,
                    loop: true,
                    stagePadding: 10,
                    margin: 30,
                    autoplay: true,
                    smartSpeed: 500,
                    nav: true,
                    dots: true,
                    navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                    responsive:{
                        600:{
                            items: 2
                        },
                        1000:{
                            items: 2
                        },
                        1200:{
                            items: 3
                        }
                    }
                });
            }

            if ( $('.owl-slide').length > 0 ) {
                $('.owl-slide').owlCarousel({
                center: false,
                items: 2,
                loop: true,
                    stagePadding: 0,
                margin: 30,
                autoplay: true,
                nav: true,
                    navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                responsive:{
                600:{
                    
                    nav: true,
                items: 2
                },
                1000:{
                    
                    stagePadding: 0,
                    nav: true,
                items: 2
                },
                1200:{
                    
                    stagePadding: 0,
                    nav: true,
                items: 2
                }
                }
                });
            }


            if ( $('.nonloop-block-14').length > 0 ) {
                $('.nonloop-block-14').owlCarousel({
                center: false,
                items: 1,
                loop: true,
                    stagePadding: 0,
                margin: 0,
                autoplay: true,
                nav: true,
                    navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
                responsive:{
                600:{
                    margin: 20,
                    nav: true,
                items: 2
                },
                1000:{
                    margin: 30,
                    stagePadding: 0,
                    nav: true,
                items: 2
                },
                1200:{
                    margin: 30,
                    stagePadding: 0,
                    nav: true,
                items: 3
                }
                }
                });
            }

            $('.slide-one-item').owlCarousel({
                center: false,
                items: 1,
                loop: true,
                stagePadding: 0,
                margin: 0,
                autoplay: true,
                pauseOnHover: false,
                nav: true,
                navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
            });
        };
        siteCarousel();
    });
    </script>
@endsection



