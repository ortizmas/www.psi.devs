@extends('layouts.errors') 

@section('content')
	<section class="content">
		<div class="container-fluid">
			<div class="row bg-danger align-items-center">
				<div class="col-6 text-right">
					<h1>Erro 403</h1>
					<h2>{{ __('Forbidden') }}</h2>
					<p>{{ __('Sorry, you are not authorized to access this page.') }}</p>
					<a href="{{ route('home') }}" title="Home" class="btn btn-dark btn-lg">VOLTAR NO INICIO</a>
				</div>
				<div class="col-6 pr-0">
					{{-- <div style="background-image: url({{ asset('/svg/404.svg') }});" class="img-fluid"></div> --}}
					<img src="{{ asset('/svg/404.svg') }}" alt="404" class="img-fluid">
				</div>
			</div>
		</div>
	</section>
@endsection