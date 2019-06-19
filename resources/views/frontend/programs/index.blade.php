@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="container-fluid pl-0 pb-5 pr-0">
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

        
        <div class="container page-content pt-5">
            @foreach ($programs as $value)
                @if ($value->redirect == 1)
                    <div class="card mb-3" >
                        <div class="row no-gutters">
                            <div class="col-md-6 d-flex align-items-center pt-3 pl-3">
                                <img src="{{ asset('uploads/images/'.$value->image) }}" class="card-img rounded-0" alt="{{ $value->title }}">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $value->title }}</h5>
                                    <p class="card-text">{!! $value->description !!}</p>
                                    <a target="{{ $value->target }}" class="btn btn-yellow btn-xs pt-3 pl-4 pb-3 pr-4" href="{{ $value->external_url }}" title="{{ $value->title }}"> Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card mb-3" >
                        <div class="row no-gutters">
                            <div class="col-md-6 d-flex align-items-center pt-3 pl-3">
                                <img src="{{ asset('uploads/images/'.$value->image) }}" class="card-img rounded-0" alt="{{ $value->title }}">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $value->title }}</h5>
                                    <p class="card-text">{!! $value->description !!}</p>
                                    <a target="{{ $value->target }}"  class="btn btn-dark btn-sm" href="{{ url($value->category->slug .'/' .$value->slug ) }}" title="{{ $value->title }}"> Saiba mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach   
                        
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



