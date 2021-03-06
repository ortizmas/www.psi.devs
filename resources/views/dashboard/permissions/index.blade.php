@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Lista de permisos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('permissions.create') }}"><i class="fas fa-plus-square" style="font-size: 48px;"></i></a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Permisos
                            @can('create permission')
                            <a href="{{ route('permissions.create') }}" title="Cadastrar permissions" class="btn btn-outline-info btn-sm w-25 float-right">Novo Permiso</a>
                            @endcan
                        </div>


                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif

                            @if (Session::has('success'))
                              <div class="alert alert-success">
                                  <strong>Oooh!</strong> {{ Session::get('success') }}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col" colspan="3">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <th scope="row">{{ $permission->id }}</th>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->slug }}</td>

                                            <td class="float-right">
                                                @can('delete permission', Model::class)
                                                {{-- {!! Form::open(['route' => ['permissions.destroy', $permission->id] , 'method' => 'DELETE']) !!}
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                {!! Form::close() !!} --}}
                                                <a href="{{ route('permissions.destroy', $permission->id) }}" class="btn-delete btn btn-outline-danger btn-sm" title="{{ $permission->title }}">
                                                  <i class="fas fa-trash" style="color:red;"></i>
                                                </a> 
                                                @endcan
                                            </td>

                                            <td class="float-right">
                                                @can('update permission', Model::class)
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>
                                                @endcan
                                            </td>

                                            <td class="float-right">
                                                @can('read permissions', Model::class)
                                                <a href="#" class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $permissions->render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
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

