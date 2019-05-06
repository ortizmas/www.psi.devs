@extends('layouts.frontend.app')

@section('content')
	<div class="hero-show" id="home">
        @include('layouts.frontend.menugt', ['some' => 'data'])

        <div class="hero-show-overlay pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                            <header class="entry-header pt-5">
                                @if ($pages != null)
                                    <h1>{{ $pages->title }}</h1>
                                @endif
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-12 col-lg-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                @if ($pages != null)
                    {!! $pages->content !!}
                @endif
			</div>
		</div>
	</div>

    <!--Formulario de envio de Documentação -->
    <section class="inscription-section pt-5 pb-5" id="inscricao">
        <div class="container">
            <div class="titulo_principal pb-4">
                <h3 class="text-dark">Enviar Documentação</h3>
            </div>
            
            <form class="needs-validation"  action="{{ route('send.email') }}" method="post" enctype="multipart/form-data" id="needs-validation"  novalidate>
                @csrf
                
                <div class="row">
                    <div class="input-group mb-3 col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nome completo" required> 
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> 
                        @endif
                    </div>

                    <div class="input-group mb-3 col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required> 
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> 
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-group col-12">
                        <select name="perfil" required="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required>
                            <option value="">Selecione seu perfil</option>
                            <option value="Ex-aluno">Ex-aluno</option>
                            <option value="Outros">Outros</option>
                        </select>
                        @if ($errors->has('perfil'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('perfil') }}</strong>
                        </span> 
                        @endif
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="form-group col-12">
                        <label for="inputEmail3" class="control-label font-weight-bold">Assinale abaixo a opção de seu interesse:</label>
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interesse" value="Docência - Ensino Básico" required> 
                                <label class="form-check-label">Docência - Ensino Básico </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interesse" value="Docência - Ensino Superior" required>
                                <label class="form-check-label"> Docência - Ensino Superior </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interesse" value="Outros" required>
                                <label class="form-check-label"> Outros (especifique abaixo na caixa de mensagem)</label>
                            </div>
                        </div>
                        @if ($errors->has('interesse'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('interesse') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="input-group mb-3 col-12">
                        <div class="custom-file">
                            <input type="file" name="arquivo" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : ''}}" id="customFile" lang="pt-BR" required>
                            <label class="custom-file-label" for="customFile">Seu curriculo</label>
                        </div>
                        @if ($errors->has('arquivo'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('arquivo') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="input-group mb-3 col-md-12">
                        <textarea rows="5" name="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" required>{{ old('email') }}</textarea>
                        @if ($errors->has('message'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span> 
                        @endif
                    </div>



                    <div class="col-md-4 align-items-center">
                        <button type="submit" class="btn btn-dark btn-block btn-flat text-white">Enviar</button>
                    </div>
                </div>
            </form>

        </div>

       {{--  <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <section class="seccion-contacto">
                        <div class="card">
                          <div class="card-header">
                            Contactarnos
                        </div>
                        <div class="card-body">
                            @if (session('estado'))
                            <div class="alert alert-success">
                                {{ session('estado') }}
                            </div>
                            @endif
                            <form method="POST" action="/enviar" class="contact-form {{ (Session::get('errors')) ? 'was-validated' : '' }}"  role="form" id="contact-form" class="">
                                @csrf
                                <div class="messages"></div>

                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nombre">Tu nombre *</label>
                                                <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Por favor ingresa tu nobre" required="required" data-error="El nombre es requerido.">

                                                @if($errors->has('nombre'))
                                                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email *</label>
                                                <input id="email" type="text" name="email" class="form-control" placeholder="Por favor ingresa tu email" required="required" data-error="Email es requerido.">
                                                @if($errors->has('email'))
                                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="mensaje">Mensaje *</label>
                                                <textarea id="mensaje" name="mensaje" class="form-control" placeholder="Tu mensaje" rows="4" required="required" data-error="Por favor incluye un mensaje."></textarea>
                                                @if($errors->has('mensaje'))
                                                <div class="invalid-feedback">{{ $errors->first('mensaje') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success btn-send" value="Enviar tu mensaje">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-4">
                                            <p class="text-muted">
                                                <strong>*</strong> Campos requeridos.</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </section>
                </div>
            </div>
        </div> --}}
    </section>

    <footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="col-12 col-lg-3">
                        <div class="follow-us">
                            <ul class="follow-us flex flex-wrap align-items-center">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        // Mostrar o arquivo no input
        (function ($) {
            $('.custom-file-input').on('change', function() { 
                let fileName = $(this).val().split('\\').pop(); 
                $(this).next('.custom-file-label').addClass("selected").html(fileName); 
            });
        })(jQuery);
        

        //Validar formulario
        (function($) {
            'use strict';

            window.addEventListener('load', function() {
                // Busque todos os formulários que queremos aplicar estilos de validação Bootstrap personalizados para
                var forms = document.getElementsByClassName('needs-validation');
                // Faça um loop sobre eles e impeça a submissão
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection