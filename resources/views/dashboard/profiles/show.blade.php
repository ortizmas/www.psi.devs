@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3 class="m-0 text-dark">SEU PERFIL</h3>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @role('super-admin|admin')
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}" class="btn btn-info btn-sm">Lista de usuarios</a></li>
                    @endrole
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
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <!-- PRODUCT LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Usuario atual</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                  <li class="item">
                                        <div class="product-img">
                                            <img src="/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                          <a href="javascript:void(0)" class="product-title">{{ $user->name }}</a>
                                            <a href="{{ route('profiles.edit', $user->id) }}" title="Alterar Usuario"><span class="badge badge-warning float-right">Altera usuario <i class="fas fa-edit"></i></span></a>
                                            <span class="product-description">
                                                {{ $user->email }}
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                @role('super-admin|admin')
                                <a href="{{ route('users.index') }}" class="uppercase">Listado de Usuarios</a>
                                @endrole
                            </div>
                        </div>
                    </div>

                    @if ($user->inscriptions)
                        <div class="col-md-6">
                            <!-- ENDEREÇO LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informações gerais</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                            <div class="product-img">
                                                <img src="/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                            </div>
                                            <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">{{ $user->inscriptions[0]->name }}</a>
                                                <a href="{{ route('profiles.inscription.edit', $user->inscriptions[0]->id) }}" title="Alterar Usuario"><span class="badge badge-warning float-right">Alterar dados <i class="fas fa-edit"></i></span></a>
                                                <span class="product-description">
                                                    <b>CPF: </b>{{ $user->inscriptions[0]->cpf}} - 
                                                    <b>Telefone: </b>{{ $user->inscriptions[0]->cpf}}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="item">
                                            <strong>CEP: </strong>{{ $user->inscriptions[0]->cep}}
                                        </li>
                                        <li class="item">
                                            <strong>Endereço: </strong>{{ $user->inscriptions[0]->street}}
                                        </li>
                                        <li class="item">
                                            <strong>Barrio: </strong>{{ $user->inscriptions[0]->neighborhood}}
                                        </li>
                                        <li class="item">
                                            <strong>Estado: </strong>{{ $user->inscriptions[0]->state}}  <strong>Cidade: </strong>{{ $user->inscriptions[0]->city}}
                                        </li>
                                        <li class="item">
                                            <strong>Empressa: </strong>{{ $user->inscriptions[0]->company}}
                                        </li>
                                        <li class="item">
                                            <strong>Telefone da empressa: </strong>{{ $user->inscriptions[0]->company_phone}}
                                        </li>
                                    </ul>
                                </div>
                            
                            </div>
                        </div>
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