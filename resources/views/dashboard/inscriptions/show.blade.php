@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dados do inscrito</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('inscriptions.index') }}" class="btn btn-info btn-sm">Lista de inscritos</a></li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Inscrito</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                  <li class="item">
                                        <div class="product-img">
                                            <img src="/img/default-150x150.png" alt="Product Image" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">{{ $inscription->name }}</a>
                                            <a href="{{ route('inscriptions.edit', $inscription->id) }}" title="Alterar Usuario"><span class="badge badge-warning float-right"><i class="fas fa-edit"></i></span></a>
                                            <span class="product-description">
                                                {{ $inscription->email_inscription }}
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="pl-3">
                                    <strong>CPF: </strong>{{ $inscription->cpf }} <br>
                                    <strong>Telefone: </strong>{{ $inscription->phone }} <br>
                                    <strong>CEP: </strong>{{ $inscription->cep }} <br>
                                    <strong>Estado: </strong>{{ $inscription->state }} <br>
                                    <strong>Cidade: </strong>{{ $inscription->city }} <br>
                                    <strong>Bairro: </strong>{{ $inscription->neighborhood }} <br>
                                    <strong>Rua: </strong>{{ $inscription->street }} <br>
                                    <hr>
                                    <strong>Empresa: </strong>{{ $inscription->company }} <br>
                                    <strong>Telefone da empresa: </strong>{{ $inscription->company_phone }} <br>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cursos</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                                          <strong></strong> {{ session('success') }}
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="m-4">
                                    <ul class="list-group ">
                                        @foreach ($inscription->courses as $course)
                                            <li class="list-group-item">
                                                {{ $course->name }} <sapn class="ml-3 mr-3">|</sapn>
                                                @php
                                                    $total = $course->pivot->amount * $course->pivot->price
                                                @endphp
                                                <strong>Total: </strong><b class="badge badge-success"> R$ {{ $total }}</b>

                                                {{-- <span class="badge badge-pill badge-{{ ($course->pivot->status == 1) ?  'success text-white w-25' : 'warning text-white w-25' }} float-right">{{ getStatusPaymentCourse($course->pivot->status) }}</span> --}}
                                                <form action="{{ route('inscription.course.update') }}" method="post" class="form-inline float-right">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="form-group pb-0 mb-0">
                                                        <select name="status" class="form-control" id="status">
                                                            <option value="1" {{ ($course->pivot->status == 1) ? 'selected' : '' }}>Aprovada</option>
                                                            <option value="2" {{ ($course->pivot->status == 2) ? 'selected' : '' }}>Cancelada</option>
                                                            <option value="3" {{ ($course->pivot->status == 3) ? 'selected' : '' }}>Em análise</option>
                                                            <option value="4" {{ ($course->pivot->status == 4) ? 'selected' : '' }}>Aguardando pagto.</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group ml-2 pb-0 mb-0">
                                                        <input type="hidden" name="inscription_id" value="{{ $inscription->id }}">
                                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                        <button type="submit" class="btn btn-success">Alterar</button>
                                                    </div>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                
                            </div>
                        </div>
                        <!-- /.card -->
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

    <script>

        const status = $('#status').val();
        console.log(status);
    </script>
@stop