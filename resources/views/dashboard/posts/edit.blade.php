@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/dist/plugins/pickadate/compressed/default.css">
    <link rel="stylesheet" href="/dist/plugins/pickadate/compressed/default.date.css">
    <link rel="stylesheet" href="/dist/plugins/pickadate/compressed/default.time.css">

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('posts.index') }}" class="btn btn-info btn-sm">Lista de posts</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('posts.update', $post->id) }}" method="post" novalidate="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body register-card-body">
                                @csrf
                                @method('PUT')

                                <div class="input-group mb-3">
                                    <input id="title" type="text" class="basic-usage form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $post->title }}" placeholder="Nome do menu" required autofocus> 
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <input id="permalink" type="text" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" value="{{ $post->slug }}" placeholder="URL da pagina" required autofocus>
                                    @if ($errors->has('slug'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('slug') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : ''}}" id="customFile" lang="pt-BR">
                                        <label class="custom-file-label" for="customFile">{{ $post->image }}</label>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group mb-3">
                                    <textarea id="textarea-um" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Resumo...">{{ $post->description }}</textarea>
                                    <samll id="edescriptionHelp" class="form-text text-muted">Resumos são pequenas descrições opcionais do conteúdo do seu post feitas manualmente, que podem ser usadas em seu tema. <a target="_blank" href="https://codex.wordpress.org/pt-br:Resumo" title="Resumo">Aprenda mais sobre resumos manuais.</a></small>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <textarea id="textarea-dois" name="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="Conteudo do post" rows="10">{{ $post->content }}</textarea>
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
                                    <select id="CategoryId" name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                        <option value="{{ $post->category_id }}">{{ $post->category->name }}</option>
                                        @foreach ($categories as $value)
                                            <option value="{{ $value->id }}" {{ old('category_id')== $value->id ? 'selected' : ''  }}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="category-modal btn btn-outline-info" type="button" data-toggle="modal" data-target="#modalForm"><i class="fa fa-plus fa-fw"></i></button>
                                    </span>
                                    @if ($errors->has('category_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_start">Data inicio</label>
                                            <div class="input-group">
                                                <input type="text" name="date_start" class="start-input form-control{{ $errors->has('date_start') ? ' is-invalid' : ''}}" value="{{ classCoverterDate($post->date_start) }}"/>
                                                <span class="input-group-btn">
                                                    <button class="date-start btn btn-default" type="button"><i class="fa fa-calendar fa-fw"></i></button>
                                                </span>
                                                @if ($errors->has('date_start'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('date_start') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_start">Data final</label>
                                            <div class="input-group">
                                                <input type="text" name="date_end" class="end-input form-control{{ $errors->has('date_end') ? ' is-invalid' : ''}}" value="{{ classCoverterDate($post->date_end) }}"/>
                                                <span class="input-group-btn">
                                                    <button class="date-end btn btn-default" type="button"><i class="fa fa-calendar fa-fw"></i></button>
                                                </span>
                                                @if ($errors->has('date_end'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('date_end') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label for="">Têm url externa? </label>
                                <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="redirect" id="redirectYes"  value="1" {{ ( $post->redirect == 1) ? 'checked' : ''}} />
                                      <label class="form-check-label" for="redirect"> Sim</label>
                                </div>
                                <div class="form-check form-check-inline pt-2 pb-4">
                                      <input class="form-check-input" type="radio" name="redirect" id="redirectNo"  value="0" {{ ($post->redirect == 0 ) ? 'checked' : ''}} />
                                      <label class="form-check-label" for="redirect"> Não</label>

                                </div>

                                <div class="input-group mb-3">
                                    <input id="external_url" type="text" class="form-control{{ $errors->has('external_url') ? ' is-invalid' : '' }}" name="external_url" value="{{ $post->external_url }}" placeholder="Url externa se tiver (opcional)" required autofocus> 
                                    @if ($errors->has('external_url'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('external_url') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <select id="target" name="target" class="form-control{{ $errors->has('target') ? ' is-invalid' : '' }}">
                                        <option value="_parent" {{ ($post->target == '_parent' ) ? 'selected' : ''  }}>Abrir link na mesma aba</option>
                                        <option value="_blank" {{ ($post->target == '_blank' ) ? 'selected' : ''  }}>Abrir link em uma nova aba</option>
                                    </select>
                                    @if ($errors->has('redirect'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('redirect') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <input id="author" type="text" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}" name="author" value="{{ $post->author }}" placeholder="Autor do post" required autofocus> 
                                    @if ($errors->has('author'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('author') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3 w-25">
                                    <input id="order" type="text" class="form-control{{ $errors->has('order') ? ' is-invalid' : '' }}" name="order" value="{{ $post->order }}" placeholder="Ordem" required autofocus> 
                                    @if ($errors->has('order'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('order') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="input-group mb-3">
                                    <select id="status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                        <option value="1" {{ ( $post->status == 1 ) ? 'selected' : ''  }}>Ativo</option>
                                        <option value="0" {{ ( $post->status == 0 ) ? 'selected' : ''  }}>Inativo</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span> 
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->

    <!--mODAL INFO-->
    <div class="modal modal-info fade" id="modalForm">
        <div class="modal-dialog">
            <form action="{{ route('ajax.create') }}" method="post" novalidate="" id="frm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">Nova categoria</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="float-right">&times;</span>
                        </button>


                    </div>
                    <div class="modal-body">

                        @include('dashboard.categories.helpers.categoria-modal', ['some' => 'data'])
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger pull-left" data-dismiss="modal">Fechar</button>
                        <button type="submitalvar categoria" class="btn btn-outline-info">Salvar categoria</button>
                    </div>
                </div>

            <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

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
    <!--Bootstrap 4 DatePicker-->
    {{-- <script src="/dist/plugins/pickadate/legacy.js"></script> --}}
    <script src="/dist/plugins/pickadate/picker.js"></script>
    <script src="/dist/plugins/pickadate/picker.date.js"></script>
    <script src="/dist/plugins/pickadate/picker.time.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('js/ajax-crud-modal-form.js') }}"></script>
    
    <script src="/dist/js/demo.js"></script>

    <script>
        $(document).ready( function() {
            $(".basic-usage").stringToSlug();
            $(".modal-category").stringToSlug({
                getPut: '#slug-modal',
            });
        });

        $('.custom-file-input').on('change', function() { 
            let fileName = $(this).val().split('\\').pop(); 
            $(this).next('.custom-file-label').addClass("selected").html(fileName); 
        });

        //$('.datepicker').pickadate();
        //$('#date_start').pickadate();
        
        //Satrt Date
        var input = $('.start-input').pickadate({
            editable: true,
            monthsFull: [ 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro' ],
            monthsShort: [ 'jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez' ],
            weekdaysFull: [ 'domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado' ],
            weekdaysShort: [ 'dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sab' ],
            selectMonths: true,
            selectYears: true,
            format: 'dd/mm/yyyy',
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar',
        });

        var picker = input.pickadate('picker');

        $('.start-input').off('click focus');
        
        $('.date-start').on('click', function(e) {
            if (picker.get('open')) { 
                picker.close()
            } else {
                picker.open()
            }
            e.stopPropagation()    
        });

        //End date
        var end = $('.end-input').pickadate({
            editable: true,
            monthsFull: [ 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro' ],
            monthsShort: [ 'jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez' ],
            weekdaysFull: [ 'domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado' ],
            weekdaysShort: [ 'dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sab' ],
            selectMonths: true,
            selectYears: true,
            format: 'dd/mm/yyyy',
            today: 'Hoje',
            clear: 'Limpar',
            close: 'Fechar',
        });
        var picker2 = end.pickadate('picker');
        $('.end-input').off('click focus');

        $('.date-end').on('click', function(e) {
            if (picker2.get('open')) { 
                picker2.close()
            } else {
                picker2.open()
            }
            e.stopPropagation()    
        });
        
    </script>

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


    <!--Funciona com laravel-filemanager-->
    {{-- <script src="{{ asset('/dist/plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea#content",
            //selector: "textarea.my-editor",
            plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script> --}}
@stop