@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Universidades</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('universities.index') }}" class="btn btn-info btn-sm">Lista de universidades</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
            <form action="{{ route('universities.store') }}" method="post" novalidate="">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <input id="initials" type="text" class="basic-usage form-control{{ $errors->has('initials') ? ' is-invalid' : '' }}" name="initials" value="{{ old('initials') }}" placeholder="SIGLA" required autofocus> 
                                    @if ($errors->has('initials'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('initials') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group mb-3">
                                    <input id="title" type="text" class="basic-usage form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="UNIVERSIDADE" required autofocus> 
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <textarea id="tinymce_um" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Resumo...">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span> 
                            @endif
                            <samll id="edescriptionHelp" class="form-text text-muted">Resumos são pequenas descrições opcionais do conteúdo do seu post feitas manualmente, que podem ser usadas em seu tema. <a target="_blank" href="https://codex.wordpress.org/pt-br:Resumo" title="Resumo">Aprenda mais sobre resumos manuais.</a></small>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="address" required autofocus>
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
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
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/demo.js"></script>

    <script src="/vendor/filemanagerjs/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script>
        var BASE_URL = "/"; // use your own base url
        tinymce.init({
            selector: "textarea#tinymce_um",
            // theme: "modern",width: 1200,height: 60,
            relative_urls: false,
            remove_script_host: false,
            plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste responsivefilemanager textcolor code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| link unlink anchor | responsivefilemanager | image media | forecolor backcolor  | print preview code ",
            image_advtab: true,
            relative_urls: false,

            external_filemanager_path: BASE_URL + "vendor/filemanagerjs/filemanager/",
            filemanager_title: "Media Gallery",
            external_plugins: { "filemanager": BASE_URL + "vendor/filemanagerjs/filemanager/plugin.min.js" }

        });
        
    </script> 

@stop