@extends('layouts.frontend.app')

@section('content')
	<div class="hero-show" id="home">
        @include('layouts.frontend.menujt-show', ['some' => 'data'])

        <div class="hero-show-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h1>JOVENS TALENTOS</h1>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-12 col-lg-6">
				<img src="{{ asset('uploads/trainees/'. $trainee->image) }}" alt="{{ $trainee->name }}" class="img-fluid">
			</div>
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title">{{ $trainee->name }}</h2>
						<p class="card-text float-right"><strong>Idade: </strong>{{ $trainee->age }}</p>
						<p class="card-text"><strong>E-mail: </strong>{{ $trainee->email }}</p>
						<p class="card-text float-right "><strong>Sexo: </strong>{{ ($trainee->gender == 'F') ? 'Femenino' : 'Masculino' }}</p>
						<p class="card-text"><strong>Estado civil: </strong>{{ $trainee->marital_status }}</p>
						
					</div>
					<div class="card-body">
						<p class="card-text">{!! $trainee->content !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

    {{-- <section class="inscription-section pt-5 pb-5" id="inscricao">
        <div class="container">
            <div class="titulo_principal pb-4">
                <h3 class="text-dark">Enviar e-mail para {{ $trainee->name }}</h3>
            </div>

            <form class="needs-validation"  action="{{ route('inscription.store') }}" method="post" enctype="multipart/form-data" id="needs-validation"  novalidate>
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

                <div class="row justify-content-center">
                    <div class="input-group mb-3 col-12">
                        <input id="permalink" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ old('slug') }}" placeholder="URL do trainee" required>
                        @if ($errors->has('slug'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span> 
                        @endif
                    </div>

                    <div class="input-group mb-3 col-12">
                        <div class="custom-file">
                            <input type="file" name=" " class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : ''}}" id="customFile" lang="pt-BR" required>
                            <label class="custom-file-label" for="customFile">Selecionar imagem</label>
                        </div>
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-md-4 align-items-center">
                        <button type="submit" class="btn btn-dark btn-block btn-flat text-white">Enviar</button>
                    </div>
                </div>
            </form>

        </div>
    </section> --}}

	<!--- Jovens Talentos -->
    <section class="courses-listing bg-gray pt-5" id="nominata">
        <div class="container pt-4">
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
                                @if (isset($cursos))
                                    @foreach ($cursos as $curso)
                                        <button class="dropdown-item" data-toggle="portfilter" data-target="{{ $curso->slug }}">
                                            {{ $curso->name }}
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </header>
                </div>

                @if (isset($trainees))
                    @foreach ($trainees as $trainee)
                        <div class="col-lg-4 col-md-6" data-tag="{{ $trainee->course->slug }}">
                            <div class="course">
                                <div class="course-image">
                                    <img src="{{ asset('uploads/trainees/'. $trainee->image) }}" alt="{{ $trainee->name }}" class="img-fluid">
                                    <div class="overlay flex-column d-flex align-items-center justify-content-center">
                                        <div class="instructor-avatar">
                                            <img src="{{ asset('uploads/trainees/'. $trainee->image) }}" alt="{{ $trainee->name }}">
                                        </div>
                                        <div class="instructor-name"><a href="#" class="no-anchor-style"><strong>{{ $trainee->name }}</strong></a></div>
                                        <ul class="instructor-rate list-inline">
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        </ul><a href="#" class="watch-btn"><i class="fa fa-eye">       </i>Watch Now</a>
                                    </div>
                                </div>
                                <div class="course-header p-3">
                                    <a href="{{ route('info.show', $trainee->slug) }}" class="no-anchor-style">
                                        <h3 class="h5">{{ $trainee->name }}</h3>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="category"><i class="fa fa-tags"></i><a href="#">{{ $trainee->course->name }}</a></div>
                                        <div class="price"><strong><small>ANO </small> {{ $trainee->period->year }}</strong></div>
                                    </div>
                                </div>
                                <div class="course-body pl-3 pr-3">
                                    <p class="text-justify">{{ $trainee->description }}</p>
                                </div>
                                <hr>
                                <div class="course-footer d-flex align-items-center justify-content-between pt-0 pl-3 pr-3 pb-3">
                                    <div class="user"><i class="icon-users"></i><span>{{ $trainee->age }} Anos</span></div>
                                    <div class="comments"><i class="icon-chat"></i><span>{{ $trainee->email }}</span></div>
                                    <div class="duration"><i class="icon-clock-1"></i><span>{{ LongTimeFilter($trainee->created_at) }}</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="col-12 px-25 flex justify-content-center pt-4 pb-5">
                <button class="btn btn-small bg-lilas text-white" data-toggle="portfilter" data-target="all">
                    Ver todos
                </button>
            </div>
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
        // (function() {
        //   'use strict';
        //   window.addEventListener('load', function() {
        //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //     var forms = document.getElementsByClassName('needs-validation');
        //     // Loop over them and prevent submission
        //     var validation = Array.prototype.filter.call(forms, function(form) {
        //       form.addEventListener('submit', function(event) {
        //         if (form.checkValidity() === false) {
        //           event.preventDefault();
        //           event.stopPropagation();
        //         }
        //         form.classList.add('was-validated');
        //       }, false);
        //     });
        //   }, false);
        // })();
        (function() {
            "use strict";
            window.addEventListener("load", function() {
                var form = document.getElementById("needs-validation");
                form.addEventListener("submit", function(event) {
                    if (form.checkValidity() == false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                }, false);
            }, false);

            //$("#telefone").mask("(00) 0000-00000");
        }());
    </script>
@endsection