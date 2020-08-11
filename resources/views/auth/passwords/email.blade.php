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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 login-box">
                <div class="card bg-transparent">
                    <div class="card-header text-light">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right text-light">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info w-100">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
