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
                <p class="lead"><strong>Modulos:</strong> {{count($modules)}} | <strong>Aulas: </strong> {{ $count }}</p>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          	<div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        @if (isset($modules))
                            @foreach ($modules as $module)
                                
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <h3 class="card-title">{{ $module->name }}</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            @foreach ($module->classrooms as $class)
                                                <div class="form-check">
                                                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                  <label class="form-check-label" for="defaultCheck1">
                                                    {{ $class->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                        {{-- <div class="card-footer text-center">
                                            <a class="btn btn-primary btn-sm w-100" href="{{ route('assignments.classrooms', $module->id) }}" title="Classrooms">Ver aulas do modulo</a>
                                        </div> --}}
                                    </div>
                                
                            @endforeach
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