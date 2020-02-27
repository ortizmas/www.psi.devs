@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Lista de usuarios</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">{{ __('Register') }}</p>
                            <form action="{{ route('users.store') }}" method="post" novalidate="">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nome completo" required autofocus> 
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> 
                                    @endif
                                    <div class="input-group-append">
                                        <span class="fa fa-user input-group-text"></span>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Seu endereço de email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> 
                                    @endif
                                    <div class="input-group-append">
                                        <span class="fa fa-envelope input-group-text"></span> 
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Sua Senha" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                    @endif
                                    <div class="input-group-append">
                                        <span class="fa fa-lock input-group-text"></span>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Senha de confirmação" required>
                                    {{-- @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                    @endif --}}
                                    <div class="input-group-append">
                                        <span class="fa fa-lock input-group-text"></span> 
                                    </div>
                                </div>

                                <div class="form-group @if ($errors->has('roles')) is-invalid @endif">
                                    @if ($errors->has('roles'))
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $errors->first('roles') }}</strong>
                                        </span> 
                                    @endif
                                    @foreach ($roles as $role)
                                        {!! Form::checkbox('roles[]',  $role->id ) !!}
                                        {!! Form::label($role->name, ucfirst($role->name)) !!}<br>
                                    @endforeach
                                    
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      	</div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('javascript')
     <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="/dist/js/demo.js"></script>
@stop