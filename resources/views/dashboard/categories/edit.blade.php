@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Alterar categoria</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" class="btn btn-info btn-sm">Listar dados</a></li>
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
                            <div class="card-body register-card-body">
                                <form action="{{ route('categories.update', $category->id) }}" method="post" novalidate="">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <input id="name" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $category->name }}" placeholder="Categoria" required autofocus> 
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span> 
                                        @endif
                                    </div>

                                    <div class="input-group mb-3">
                                        <input id="permalink" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ $category->slug }}" placeholder="Slug" required autofocus>
                                        @if ($errors->has('slug'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </span> 
                                        @endif
                                    </div>

                                    <div class="input-group mb-3">
                                        <select id="section" name="section" class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}">
                                            <option value="{{ $category->section }}" selected="">{{ ($category->section == 'page') ? 'Pagina' : 'Cursos' }}</option>
                                            <option value="page">Pagina</option>
                                            <option value="course">Cursos</option>
                                        </select>
                                        @if ($errors->has('section'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('section') }}</strong>
                                            </span> 
                                        @endif
                                    </div>

                                    <div class="input-group mb-3">
                                        <select id="enabled" name="enabled" class="form-control{{ $errors->has('enabled') ? ' is-invalid' : '' }}">
                                            <option value="{{ $category->enabled }}" selected="">{{ ($category->enabled == 1) ? 'Ativo' : 'Inativo' }}</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                        @if ($errors->has('enabled'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('enabled') }}</strong>
                                            </span> 
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
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
    <!--StringToSlug-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/speakingurl/13.0.0/speakingurl.min.js" type="text/javascript"></script>
    <script src="/dist/plugins/stringToSlug/jquery.stringtoslug.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="/dist/js/demo.js"></script>

    <script>
        $(document).ready( function() {
            $(".basic-usage").stringToSlug();
        });
    </script>
@stop