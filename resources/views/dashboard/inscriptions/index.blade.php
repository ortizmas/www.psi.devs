@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h1 class="m-0 text-dark">Inscritos</h1>
          </div>
          <div class="col-sm-9">
            <form action="{{ route('inscriptions.index')}}" method="get" class="form-inline">
              <input type="text" name="search" class="form-control mb-2 mr-sm-2 w-75" id="search" placeholder="Pesquisar por nome, cpf ou e-mail">
              <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-search"></i></button>
            </form>
          </div>
          <div class="col-sm-1">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('inscriptions.create') }}"><i class="fas fa-plus-square" style="font-size: 48px;"></i></a></li>
            </ol>
          </div>
        </div>
      </div>
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
      						<th>CPF</th>
                  <th>E-mail</th>
                  <th>Qtd. Cursos</th>
                  <th>Assignar aulas</th>
      						<th colspan="3" rowspan="">Ações</th>
      					</tr>
      				</thead>
      				<tbody>
                @foreach ($inscriptions as $key => $value)
                  <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->cpf }}</td>
                      <td>{{ $value->email_inscription }}</td>
                      <td>
                        <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#exampleModal" onclick="getCourses({{ $value->courses }})">
                          {{ $value->courses->count() }}
                        </a>
                      </td>
                      <td><a href="{{ route('assign.courses', $value->user_id) }}" title="Alterar" class="badge badge-pill badge-primary pt-1 pb-1 pl-2 pr-2">
                        <i class="fas fa-edit"></i> Assignar</a>
                      </td>
                      <td>
                          <span class="badge badge-pill badge-{{ ($value->status == 1) ?  'success text-white w-100' : 'danger w-100' }}">
                              {{ getStatusInscription($value->status) }}
                          </span>
                      </td>
                      <td><a href="{{ route('inscriptions.show', $value->id) }}" title="Cursos"><i class="fas fa-eye"></i></a></td>
                      <td><a href="{{ route('inscriptions.edit', $value->id) }}" title="Alterar"><i class="fas fa-edit"></i></a></td>
                      <td>
                          <a href="{{ route('inscriptions.destroy', $value->id) }}" class="btn-delete" title="{{ $value->name }}">
                            <i class="fas fa-trash" style="color:red;"></i>
                        </a>        
                    </td>
                  </tr>
                @endforeach
                
              </tbody>
      			</table>
      		</div>

          <div class="row">
            <div class="col-md-12">
              <div class="float-right">{!! $inscriptions->links() !!}</div>
            </div>
          </div>

      	</div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cursos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <ul class="list-group">
                  <div id="courses"></div>
                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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

    <!-- Sweetalert2 -->
    <script src="{{ asset('/dist/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

    <script src="/dist/js/demo.js"></script>
		
    <script>
      function getCourses(data) {
        var dataAll = '';
        var courseData = data.map((course) => {
          return `<li class="list-group-item d-flex justify-content-between align-items-center">
            ${course.name } 
            ${getStatus(course.pivot.status)}
            </li>`;
        });
        document.getElementById('courses').innerHTML = courseData.join('');
        
      }

      function getStatus(value) {
        
        var pagStatus = '';
        switch (value) {
          case '1':
            pagStatus = `<span class="badge badge-primary badge-pill">Aprovado</span>`;
            break;
          case '2':
            pagStatus = `<span class="badge badge-danger badge-pill">Cancelado</span>`;
            break;
          case '3':
            pagStatus = `<span class="badge badge-dark badge-pill">Em análise</span>`;
            break;
          case '4':
            pagStatus = `<span class="badge badge-warning badge-pill">Aguardando pagto.</span>`;
            break;
          case '5':
            pagStatus = `<span class="badge badge-success badge-pill">Pago</span>`;
            break;
        }
        return pagStatus;
      }

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