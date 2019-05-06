@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cursos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('courses.create') }}"><i class="fas fa-plus-square" style="font-size: 48px;"></i></a></li>
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
      		<div class="table-responsive">
      			@if (session('success'))
	      			<div class="alert alert-success alert-dismissible fade show" role="alert">
	      				<strong>{{ session('success') }}</strong>
	      				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	      					<span aria-hidden="true">&times;</span>
	      				</button>
	      			</div>
      			@endif
      			<table class="table table-striped">
      				<thead>
      					<tr>
      						<th>#</th>
      						<th>Nome</th>
      						<th>Slug</th>
                  <th>Universidade</th>
                  <th>Estado</th>
      						<th colspan="2" rowspan="">Ações</th>
      					</tr>
      				</thead>
      				<tbody>
      					
                        @foreach ($courses as $key => $value)
                        <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>{{ $value->name }}</td>
                           <td>{{ $value->url }}</td>
                           <td>{{ $value->category->name }}</td>
                           {{-- @foreach ($value->modules  as $value)
                             <td>|{{ $value->name  }} |</td>
                           @endforeach --}}
                           <td>{{ ( $value->status == 1 ) ? 'Ativo' : 'Inativo' }}</td>
                           <td><a href="{{ route('courses.edit', $value->id) }}" title="Alterar"><i class="fas fa-edit"></i></a></td>
                           <td>
                                <a href="{{ route('courses.destroy', $value->id) }}" class="btn-delete" title="{{ $value->name }}">
                                  <i class="fas fa-trash" style="color:red;"></i>
                              </a>        
                          </td>
                    </tr>
                    @endforeach
              </tbody>
      			</table>
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