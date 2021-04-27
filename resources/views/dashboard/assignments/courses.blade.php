@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">LISTA DE CURSOS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('classrooms.create') }}"><i class="fas fa-plus-square" style="font-size: 48px;"></i></a></li>
              {{-- <li class="breadcrumb-item active">Dashboard v2</li> --}}
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
                <div class="col-md">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                @if (isset($courses))
                    @foreach ($courses as $course)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-4 jQueryEqualHeight3">
                            <div class="card">
                                <div class="card-header">
                                    <img class="card-img-top" src="{{ asset('storage/courses/' . $course->image) }}" alt="{{ $course->title }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-primary btn-sm w-100" href="{{ route('assignments.modules.user', [$course->id , $userId]) }}" title="Classrooms">Modulos do curso</a>
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

    <!-- Sweetalert2 -->
    <script src="{{ asset('/dist/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <script src="/dist/js/demo.js"></script>
		
    <script src="{{ asset('site/js/jquery-equal-height.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            function equal_height() {
                // Equal Card Height
                $('.jQueryEqualHeight1').jQueryEqualHeight();

                // Equal Card Height and Text Height
                $('.jQueryEqualHeight2').jQueryEqualHeight('.card .card-body .card-text');
                $('.jQueryEqualHeight2').jQueryEqualHeight('.card');

                // Equal Card Height, Text Height and Title Height
                $('.jQueryEqualHeight3').jQueryEqualHeight('.card .card-body .card-title');
                $('.jQueryEqualHeight3').jQueryEqualHeight('.card .card-body .card-text');
                $('.jQueryEqualHeight3').jQueryEqualHeight('.card');
                
                // $('.jQueryEqualHeight3').jQueryEqualHeight('.course-1-item .course-1-content .course-title');
                // $('.jQueryEqualHeight3').jQueryEqualHeight('.course-1-item .course-1-content .course-text');
                // $('.jQueryEqualHeight3').jQueryEqualHeight('.course-1-item');
            }
            $(window).on('load', function(event) {
                equal_height();
            });
            $(window).resize(function(event) {
                equal_height();
            });
        });
    </script>
@stop