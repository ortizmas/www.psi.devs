@extends('layouts.frontend.cursos')

@section('styles')
     
@endsection

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    {{-- <div class="container-fluid pl-0 pb-5 pr-0">
        <div class="hero-show" id="home">
            <div class="hero-show-overlay ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                                <header class="entry-header pt-5">
                                    <h1 class="text-white text-center">{{ $title }}</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="site-section">
        <div class="container">


            <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title-underline mb-3">
                <span>Cursos e Treinamentos</span>
                </h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p>
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
                                <div class="price">$99.00</div>
                                <div class="category"><h3>Mobile Application</h3></div>  
                                </figure>
                                <div class="course-1-content pb-4">
                                <h2>{{$course->name}}</h2>
                                <div class="rating text-center mb-3">
                                    <span class="icon-star2 text-warning"></span>
                                    <span class="icon-star2 text-warning"></span>
                                    <span class="icon-star2 text-warning"></span>
                                    <span class="icon-star2 text-warning"></span>
                                    <span class="icon-star2 text-warning"></span>
                                </div>
                                <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                                <p><a href="{{ route('cursos.show', $course->url) }}" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <a href="course-single.html"><img src="cursos/images/course_1.jpg" alt="Image" class="img-fluid"></a>
                        <div class="price">$99.00</div>
                        <div class="category"><h3>Mobile Application</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>How To Create Mobile Apps Using Ionic</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                        </div>
                    </div>
        
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <a href="course-single.html"><img src="cursos/images/course_2.jpg" alt="Image" class="img-fluid"></a>
                        <div class="price">$99.00</div>
                        <div class="category"><h3>Web Design</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>How To Create Mobile Apps Using Ionic</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                        </div>
                    </div>
        
                    <div class="course-1-item">
                        <figure class="thumnail">
                        <a href="course-single.html"><img src="cursos/images/course_3.jpg" alt="Image" class="img-fluid"></a>
                        <div class="price">$99.00</div>
                        <div class="category"><h3>Arithmetic</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>How To Create Mobile Apps Using Ionic</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                        <p><a href="courses-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                        </div>
                    </div>

                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="course-single.html"><img src="cursos/images/course_4.jpg" alt="Image" class="img-fluid"></a>
                        <div class="price">$99.00</div>
                        <div class="category"><h3>Mobile Application</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>How To Create Mobile Apps Using Ionic</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                        </div>
                    </div>
        
                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="course-single.html"><img src="cursos/images/course_5.jpg" alt="Image" class="img-fluid"></a>
                        <div class="price">$99.00</div>
                        <div class="category"><h3>Web Design</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>How To Create Mobile Apps Using Ionic</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                        </div>
                    </div>
        
                    <div class="course-1-item">
                        <figure class="thumnail">
                            <a href="course-single.html"><img src="cursos/images/course_6.jpg" alt="Image" class="img-fluid"></a>
                        <div class="price">$99.00</div>
                        <div class="category"><h3>Mobile Application</h3></div>  
                        </figure>
                        <div class="course-1-content pb-4">
                        <h2>How To Create Mobile Apps Using Ionic</h2>
                        <div class="rating text-center mb-3">
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                            <span class="icon-star2 text-warning"></span>
                        </div>
                        <p class="desc mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique accusantium ipsam.</p>
                        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In This Course</a></p>
                        </div>
                    </div>
        
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



