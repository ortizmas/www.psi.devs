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
                        <div class="col-md-12">
                            <div class="card collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $course->name }}</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-header pb-2">
                                        <h3 class="card-title text-info font-weight-bold">MODULOS</h3>
                                    </div>
                                    @foreach ($course->modules as $module)
                                        <div class="card collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ $module->name }}</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-header pb-2">
                                                    <h3 class="card-title text-info font-weight-bold">AULAS</h3>
                                                </div>
                                                @foreach ($module->classrooms as $class)
                                                    {{ $class->name }}
                                                @endforeach
                                            </div>
                                            <div class="card-footer text-center">
                                                <a class="btn btn-dark btn-sm w-100" href="{{ route('assignments.classrooms', $module->id) }}" title="Classrooms">Ver aulas do modulo</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-primary btn-sm w-100" href="{{ route('assignments.classrooms', $course->id) }}" title="Classrooms">Ver aulas do modulo</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="card">
                                <img src="{{ asset('site/images/1.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                    <p class="card-text">{{ $course->description }}</p>
                                    <a class="btn btn-dark btn-sm w-100" href="{{ route('assignments.modules', $course->id) }}" title="Modulos">Ver modulos</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div> --}}
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
		
    <script>
      $('body').on('click', '.btn-delete', function (event) {
          event.preventDefault();

          var me = $(this),
              url = me.attr('href'),
              title = me.attr('title'),
              csrf_token = $('meta[name="csrf-token"]').attr('content');

          swal({
              title: 'Tem certeza que deseja excluir! ' + title + ' ?',
              text: 'você não poderá reverter isso!',
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sim, excluir!'
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url: url,
                      type: "POST",
                      data: {
                          '_method': 'DELETE',
                          '_token': csrf_token
                      },
                      success: function (response) {
                            //$('#datatable').DataTable().ajax.reload();
                            swal({
                                  type: 'success',
                                  title: 'Success!',
                                  text: 'Os dados foram excluídos!'
                            }),window.setTimeout(function(){window.location.reload()}, 3000);

                      },
                      error: function (xhr) {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Algo deu errado!'
                            });
                      }
                  });
              }
          });
      });
    </script>
@stop