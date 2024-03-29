@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
                @if (Session::has('idModule'))
                    <h4 class="m-0 text-dark">
                        <strong>Modulo: </strong> {{ $modules->name }}
                    </h4>
                @else
                    <h4 class="m-0 text-dark">CRIAR AULA </h4>
                @endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                @if (Session::has('idModule'))
                    <li class="breadcrumb-item"><a href="{{ route('classrooms.index.param', Session::get('idModule')) }}" class="btn btn-info btn-sm">Listar aulas</a></li>
                @else
                    <li class="breadcrumb-item"><a href="{{ route('classrooms.index') }}" class="btn btn-info btn-sm">Listar aulas</a></li>
                @endif
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
            <form action="{{ route('classrooms.store') }}" method="post" novalidate="">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input id="name" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Titulo da aula" required autofocus> 
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <input id="slug" type="text" class="basic-usage form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                        name="slug" value="{{ old('slug') }}" placeholder="Titulo da aula" required autofocus>
                                    @if ($errors->has('slug'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <textarea name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Descrição...">{{ old('description') }}</textarea>
                                    <samll id="edescriptionHelp" class="form-text text-muted">Resumos são pequenas descrições opcionais do conteúdo do seu post feitas manualmente, que podem ser usadas em seu tema. <a target="_blank" href="https://codex.wordpress.org/pt-br:Resumo" title="Resumo">Aprenda mais sobre resumos manuais.</a></small>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <input id="video" type="text" class="basic-usage form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" value="{{ old('video') }}" placeholder="Video" required autofocus> 
                                    @if ($errors->has('video'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('video') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <input id="file" type="text" class="basic-usage form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" name="file" value="{{ old('file') }}" placeholder="file" required autofocus> 
                                    @if ($errors->has('file'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                @if (session()->has('idModule'))
                                    <input type="text" name="module_id" value="{{ Session::get('idModule') }}">
                                @else
                                <div class="input-group mb-3">
                                    <select id="ModuleId" name="module_id" class="form-control{{ $errors->has('module_id') ? ' is-invalid' : '' }}">
                                        <option value="">Selecionar Modulo</option>
                                        @foreach ($modules as $value)
                                        <option value="{{ $value->id }}" {{ old('module_id')== $value->id ? 'selected' : ''  }}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('module_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('module_id') }}</strong>
                                    </span> 
                                    @endif
                                </div>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <input id="order" type="text" class="basic-usage form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="{{ old('order') }}" placeholder="Ordem"> 
                                    @if ($errors->has('order'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('order') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <select id="status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                        <option value="1" {{ old('status')=='1' ? 'selected' : ''  }}>Ativo</option>
                                        <option value="0" {{ old('status')=='0' ? 'selected' : ''  }}>Inativo</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar modulo</button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
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
   {{--  <script src="//cdnjs.cloudflare.com/ajax/libs/speakingurl/13.0.0/speakingurl.min.js" type="text/javascript"></script>
    <script src="/dist/plugins/stringToSlug/jquery.stringtoslug.min.js"></script> --}}
    <script src="/dist/plugins/stringToSlug/jquery.stringToSlug.1.3.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <script type="text/javascript" src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script> --}}

    <script src="/dist/js/demo.js"></script>

    <script>
        $(document).ready( function() {
            //$("#basic-usage").stringToSlug();
            $("#name").stringToSlug({
                 getPut: '#slug',
            });
        });

        $('.custom-file-input').on('change', function() { 
            let fileName = $(this).val().split('\\').pop(); 
            $(this).next('.custom-file-label').addClass("selected").html(fileName); 
        });

        // Select2
        //$(document).ready(function() { $("#ModuleId").select2(); });
        $( "#ModuleId" ).select2({
            theme: "bootstrap4"
        });
    </script>

@stop