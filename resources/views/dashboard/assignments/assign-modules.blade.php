@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-4"><strong>Curso: </strong>{{ @$modules[0]->course->name }}</h1>
                <p class="lead"><a href="{{ route('assign.courses', $userId) }}" title="Modulos"><strong>Modulos:</strong> {{count($modules)}}</a> | <strong>Aulas: </strong> {{ $count }}</p>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          	<div class="container-fluid pb-5">
                <form action="{{ route('assignments.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $userId }}">
                    <div class="row">
                        <div class="col-md-8 bg-light p-4">

                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>Hoo!</strong> {{ Session::get('success') }}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (isset($modules))

                                @foreach ($modules as $module)
                                    
                                        <div class="card">
                                            <div class="card-header bg-dark">
                                                <h3 class="card-title">{{ $module->name }}</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="list-group">
                                                    @foreach ($module->classrooms as $class)
                                                        @if( in_array( $class->id, $classromId ) )
                                                            <div class="list-group-item">
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="checkbox" name="classroom_id[]" value="{{ $class->id }}" checked="checked" id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        {{ $class->name}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="list-group-item">
                                                                <div class="form-check">
                                                                  <input class="form-check-input" type="checkbox" name="classroom_id[]" value="{{ $class->id }}" id="defaultCheck1">
                                                                    <label class="form-check-label" for="defaultCheck1">
                                                                        {{ $class->name}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <input type="hidden" name="class_id[]" value="{{ $class->id }}">
                                                        
                                                    @endforeach
                                                </div>
                                            </div>
                                            {{-- <div class="card-footer text-center">
                                                <a class="btn btn-primary btn-sm w-100" href="{{ route('assignments.classrooms', $module->id) }}" title="Classrooms">Ver aulas do modulo</a>
                                            </div> --}}
                                        </div>
                                @endforeach

                                <button type="submit" class="btn btn-success btn-lg float-right">Assignar aulas</button>

                            @endif

                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Title</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Description</p>
                                    
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-primary btn-sm w-100" href="#" title="Classrooms">Ver aulas do modulo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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