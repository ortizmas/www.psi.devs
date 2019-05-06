@extends('layouts.frontend.app') 

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row bg-danger align-items-center">
				<div class="col-6 text-right">
					<h1>Erro 404</h1>
					<h2>{{ __('Page Not Found') }}</h2>
					<p>{{ __('Sorry, the page you are looking for could not be found !!.') }}</p>
					<a href="{{ route('inicio') }}" title="Home" class="btn btn-info btn-lg">Voltar para Inicio</a>
				</div>
				<div class="col-6 pr-0">
					{{-- <div style="background-image: url({{ asset('/svg/404.svg') }});" class="img-fluid"></div> --}}
					<img src="{{ asset('/svg/404.svg') }}" alt="404" class="img-fluid">
				</div>
			</div>
		</div>
	</section>
@endsection