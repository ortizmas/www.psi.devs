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
                                    <h1>Fale Conosco</h1>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Formulario de envio de Documentação -->
    <section class="inscription-section pt-5 pb-5" id="inscricao">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            
            <form class="needs-validation"  action="{{ route('faleconosco.email') }}" method="post" enctype="multipart/form-data" id="needs-validation"  novalidate>
                @csrf
                
                <div class="row">
                    <div class="input-group mb-3 col-md-4">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nome completo" required> 
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> 
                        @endif
                    </div>

                    <div class="input-group mb-3 col-md-4">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required> 
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> 
                        @endif
                    </div>

                    <div class="input-group mb-3 col-md-4">
                        <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" placeholder="Telefone" required> 
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span> 
                        @endif
                    </div>
                </div>

                <div class="row justify-content-center">
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

            $("#phone").mask("(00) 0000-00000");
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