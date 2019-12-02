@extends('layouts.frontend.cursos')

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

    <div class="site-section pt-4">
        <div class="container">
            <div class="row mt-1 justify-content-center text-center">
                <div class="col-lg-6 mb-3">
                    <h3 class="mb-1">
                        <span>Conheça nosso projeto</span>
                    </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p>
                </div>
            </div>

            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 mb-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/c0KHS_p_mNU"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 mb-0">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/c0KHS_p_mNU"></iframe>
                    </div>
                </div>
            </div>

            <div class="row mb-3 justify-content-center text-center">
                <div class="col-lg-6">
                    <h2 class="section-title-underline mb-2">
                    <span>CURSOS E TREINAMENTOS</span>
                    </h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p>
                </div>
            </div>

            <div class="row">

                @foreach ($courses as $course)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-4">
                        <div class="course-1-item h-100">
                            <figure class="thumnail">
                                <a href="{{ route('cursos.show', $course->url) }}">
                                    <img src="{{ asset('storage/courses/' . $course->image) }}" alt="Image" class="img-fluid">
                                </a>
                            </figure>
                            <div class="course-1-content p-2">
                                <a href="{{ route('cursos.show', $course->url) }}">
                                    <h2 class="mt-2 mb-2">{{ $course->name }}</h2>
                                </a>
                                <p>
                                    <span class="text-muted font-italic float-right pb-3 pr-2"><s>{{ ($course->price_old > 0) ? 'R$ ' . $course->price_old : '' }}</s> <b>R$ {{ $course->price }}</b></span>
                                    <a href="{{ route('cursos.show', $course->url) }}" class="btn btn-primary rounded-0 w-100">SAIBA MASI</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection




