@extends('layouts.master')

@section('styles')
    <style>
        .bg-login {
            min-height: 100vh;
            background-image: url('{{ asset('/site/images/bg/bg-login.jpeg') }}');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }
        .bg-login:after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(4, 9, 30, 0.6);
        }
        .login-box{
            z-index: 999!important;
        }
        .text-white:hover{
            color: rgb(19, 188, 218)!important;
        }
        .card {
            box-shadow: 0 0 2px rgb(16, 188, 220),0 1px 3px rgb(37, 189, 197);
        }
    </style>
@endsection
@section('content')

<section class="bg-login">
    <div class="login-box">
        <div class="login-logo">
            <img src="https://prosaudeintegral.com.br/site/images/logo/logo-top.png" alt="Logo" class="img-fluid" width="100%">
        </div>
        <div class="card border-1 bg-transparent">
            <div class="card-body login-card-body pt-3">
                {{-- <p class="login-box-msg">{{ __('Login') }}</p> --}}
                <form action="{{ route('login') }}" method="post" class="pt-3">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                        <div class="input-group-append">
                            <span class="fa fa-envelope input-group-text"></span> 
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>
                        <div class="input-group-append">
                            <span class="fa fa-lock input-group-text"></span> 
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="checkbox icheck">
                                <label class="text-white">
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            
                            @if (Route::has('password.request'))
                                <label class="float-lg-right">
                                    <a href="{{ route('password.request') }}" class="text-white">{{ __('Forgot Your Password?') }}</a>
                                </label>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 pt-3">
                            <button type="submit" class="btn btn-info w-100">Fazer Login</button>
                        </div>
                    </div>
                </form>
                {{-- <p class="mb-0">
                    <a href="{{route('register')}}" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
        </div>
    </div>
</section>

@endsection