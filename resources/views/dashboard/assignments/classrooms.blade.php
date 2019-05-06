@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('assignments.index') }}" class="btn btn-info btn-sm">Lista de cursos</a></li>
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
                        @if (isset($classrooms))
                            @foreach ($classrooms as $class)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ $class->name }}</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ $class->description }}</p>
                                            <a href="{{ route('assignments.classrooms', $class->id) }}" title=""></a>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ route('assignments.index') }}" class="uppercase">Listado de cursos</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    
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