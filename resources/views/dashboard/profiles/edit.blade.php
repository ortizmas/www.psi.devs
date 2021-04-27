@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3 class="m-0 text-dark">Alterar seus dados</h3>
              </div><!-- /.col -->
              <div class="col-sm-6">
                @role('super-admin|admin')
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}" class="btn btn-info btn-sm">Lista de usuarios</a></li>
                </ol>
                @endrole
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          	<div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body register-card-body">
                                <p class="login-box-msg"><i class='fa fa-user-plus'></i> Alterar {{$user->name}}</p>

                                {{ Form::model($user, array('route' => array('profiles.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

                                    <div class="form-group @if ($errors->has('name')) is-invalid @endif">
                                        {{ Form::label('name', 'Name') }}
                                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span> 
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('email')) is-invalid @endif">
                                        {{ Form::label('email', 'Email') }}
                                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span> 
                                        @endif
                                    </div>
                                    
                                    @role('super-admin|admin')
                                    <h5><b>Assignar Rol para usuario</b></h5>

                                    <div class="form-group @if ($errors->has('roles')) is-invalid @endif">
                                        @foreach ($roles as $role)
                                            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                                        @endforeach

                                    </div>
                                    @endrole

                                    <div class="form-group @if ($errors->has('password')) is-invalid @endif">
                                        {{ Form::label('password', 'Password') }}<br>
                                        {{ Form::password('password', array('class' => 'form-control')) }}

                                    </div>

                                    <div class="form-group @if ($errors->has('password')) is-invalid @endif">
                                        {{ Form::label('password', 'Confirm Password') }}<br>
                                        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span> 
                                        @endif
                                    </div>

                                    {{ Form::submit('Alterar', array('class' => 'btn btn-primary')) }}

                                {{ Form::close() }}
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