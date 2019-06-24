@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="container-fluid pl-0 pb-5 pr-0">
        <div class="hero-show" id="home">
            <div class="hero-show-overlay ">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                                <header class="entry-header text-center pt-5">
                                    <h1>{{ $post->title }}</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="container page-content">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">
                    <div class="shadow-lg p-4 mb-5 bg-white rounded">
                        {!! $post->content !!}

                        <div class="row pt-4 justify-content-center">
                            <div class="col-xs-12 col-md-5 text-center">
                                <a target="_blank" class="btn btn-primary btn-lg text-white" href="{{ route('inscription.create', $post->slug ) }}" title="Inscreva-se"><h4>ADQUIRIR</h4></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



