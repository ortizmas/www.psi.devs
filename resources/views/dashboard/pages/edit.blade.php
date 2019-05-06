@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Paginas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('pages.index') }}" class="btn btn-info btn-sm">Lista de paginas</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('pages.update', $page->id) }}" method="post" novalidate="">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body register-card-body">
                                @csrf
                                 @method('PUT')
                                <div class="input-group mb-3">
                                    <input id="title" type="text" class="basic-usage form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $page->title }}" placeholder="Nome do menu" required autofocus> 
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <input id="permalink" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ $page->slug }}" placeholder="URL da pagina" required autofocus>
                                    @if ($errors->has('slug'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                
                                <div class="form-group mb-3">
                                    <textarea id="textarea-um" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Resumo (Opcional)">
                                        {{ $page->description }}
                                    </textarea>
                                    <samll id="edescriptionHelp" class="form-text text-muted">Resumos são pequenas descrições opcionais do conteúdo do seu post feitas manualmente, que podem ser usadas em seu tema. <a target="_blank" href="https://codex.wordpress.org/pt-br:Resumo" title="Resumo">Aprenda mais sobre resumos manuais.</a></small>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <textarea id="textarea-dois" name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="Resumo (Opcional)" rows="10">
                                        {{ $page->content }}
                                    </textarea>
                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span> 
                                    @endif
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body register-card-body">

                                <div class="input-group mb-3">
                                    <select id="parent_id" name="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}">
                                        <option value="0">Pagina pai</option>
                                        @foreach ($pagesParents as $value)
                                            <option value="{{ $value->id }}" {{ ( $page->parent_id == $value->id ) ? 'selected' : ''  }}>{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                    {{-- {!! Form::select('parent_id', $pagesParents, null, ['class' => 'form-control', 'placeholder' =>'-- Selecione uma Categoria --', 'required']) !!} --}}
                                    @if ($errors->has('parent_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <select id="section_id" name="section_id" class="form-control{{ $errors->has('section_id') ? ' is-invalid' : '' }}">
                                        <option value="">Seção no site</option>
                                        @foreach ($sections as $value)
                                            <option value="{{ $value->id }}" {{ ( $page->section_id == $value->id ) ? 'selected' : ''  }}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('section_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('section_id') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <label for="">Têm url externa? </label>
                                <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="redirect" id="redirectYes"  value="1" {{ $page->redirect == 1 ? 'checked' : ''}} />
                                      <label class="form-check-label" for="redirect"> Sim</label>
                                </div>
                                <div class="form-check form-check-inline pt-2 pb-4">
                                      <input class="form-check-input" type="radio" name="redirect" id="redirectNo"  value="0" {{ $page->redirect == 0 ? 'checked' : ''}} />
                                      <label class="form-check-label" for="redirect"> Não</label>

                                </div>

                                <div class="input-group mb-3">
                                    <input id="external_url" type="text" class="form-control{{ $errors->has('external_url') ? ' is-invalid' : '' }}" name="external_url" value="{{ $page->external_url }}" placeholder="Url externa se tiver (opcional)" required autofocus> 
                                    @if ($errors->has('external_url'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('external_url') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <select id="target" name="target" class="form-control{{ $errors->has('target') ? ' is-invalid' : '' }}">
                                        <option value="_parent" {{ $page->target == '_parent' ? 'selected' : ''  }}>Abrir link na mesma aba</option>
                                        <option value="_blank" {{ $page->target == '_blank' ? 'selected' : ''  }}>Abrir link em uma nova aba</option>
                                    </select>
                                    @if ($errors->has('redirect'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('redirect') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3 w-25">
                                    <input id="order" type="text" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="{{ $page->order }}" placeholder="Ordem" required autofocus> 
                                    @if ($errors->has('order'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('order') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <select id="enabled" name="enabled" class="form-control{{ $errors->has('enabled') ? ' is-invalid' : '' }}">
                                        <option value="1" {{ $page->enabled == 1 ? 'selected' : ''  }}>Ativo</option>
                                        <option value="0" {{ $page->enabled == 0 ? 'selected' : ''  }}>Inativo</option>
                                    </select>
                                    @if ($errors->has('enabled'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('enabled') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Alterar pagina</button>
                                </div>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/speakingurl/13.0.0/speakingurl.min.js" type="text/javascript"></script>
    <script src="/dist/plugins/stringToSlug/jquery.stringtoslug.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="/dist/js/demo.js"></script>

    <script src="/vendor/filemanagerjs/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script>
        var BASE_URL = "/"; // use your own base url
        tinymce.init({
            selector: "textarea#textarea-um",
            // theme: "modern",width: 1200,height: 60,
            relative_urls: false,
            remove_script_host: false,
            plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste responsivefilemanager textcolor code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",

        });

        tinymce.init({
            selector: "textarea#textarea-dois",
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

    <script>
        $(document).ready( function() {
            $(".basic-usage").stringToSlug();
        });
    </script>
@stop