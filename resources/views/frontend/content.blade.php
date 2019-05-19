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
                                    <h1>{{ $post->title }}</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="content-page pt-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                    {!! $post->content !!}

                    <div class="row pt-4 justify-content-center">
                        <div class="col-md-4">
                            <a class="btn btn-primary btn-lg text-white" href="#" title="Inscreva-se">CLICK AQUI <br> <h4>INSCREVA-SE</h4></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="card border-dark text-center mb-4">
                        <div class="card-header bg-dark pb-0">
                            <p class="text-white text-uppercase">LOGIN {!! $post->title !!}</p>
                        </div>
                      <div class="card-body">
                            <form class="form-signin">
                                <div class="input-group pb-2">
                                    <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                                      </div>
                                      <input type="text" class="form-control" id="validationCustomUsername" placeholder="Usuario" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                          Please choose a username.
                                      </div>
                                </div>

                                <div class="input-group pb-2">
                                    <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock"></i></span>
                                      </div>
                                      <input type="password" class="form-control" id="validationCustomUsername" placeholder="Senha" aria-describedby="inputGroupPrepend" required>
                                      <div class="invalid-feedback">
                                          Please choose a username.
                                      </div>
                                </div>
                                <button class="btn btn-sm btn-primary btn-block mb-1" type="submit">Sign in</button>
                                <label class="checkbox float-left">
                                  <input type="checkbox" value="remember-me">
                                  Remember me
                                </label>
                                <a href="#" class="float-right">Need help?</a>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                EMPREENDEDORES DE SUCESSO
                            </div>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><a href="#" title="">Empreendedor one</a></li>
                                <li><a href="#" title="">Empreendedor two</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



