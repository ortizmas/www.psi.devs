@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Alterar Cursos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('courses.index') }}" class="btn btn-info btn-sm">Lista de cursos</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data"  novalidate="">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input id="name" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $course->name) }}" placeholder="CURSO" required autofocus> 
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <input id="url" type="text" class="basic-usage form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url', $course->url) }}" placeholder="Url do curso" required autofocus> 
                                            @if ($errors->has('url'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('url') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? ' is-invalid' : ''}}" id="customFile" lang="pt-BR">
                                                <label class="custom-file-label" for="customFile">{{ $course->image }}</label>
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <input id="video" type="text" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" value="{{ old('video', $course->video) }}" placeholder="Link do video" required autofocus> 
                                                @if ($errors->has('video'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('video') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea rows="10" id="description" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Resumo...">{{ old('description', $course->description ) }}</textarea>
                                            <samll id="edescriptionHelp" class="form-text text-muted">Resumos são pequenas descrições opcionais do conteúdo do seu post feitas manualmente, que podem ser usadas em seu tema. <a target="_blank" href="https://codex.wordpress.org/pt-br:Resumo" title="Resumo">Aprenda mais sobre resumos manuais.</a></small>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="input-group mb-3">
                                            <select id="CategoryId" name="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                                                @foreach ($categories as $value)
                                                    <option value="{{ $value->id }}" {{ old('category_id', $course->category_id)== $value->id ? 'selected' : ''  }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="input-group-btn">
                                                <button class="category-modal btn btn-outline-dark" type="button" data-toggle="modal" data-target="#modalForm"><i class="fa fa-plus fa-fw"></i></button>
                                            </span>
                                            @if ($errors->has('university_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('university_id') }}</strong>
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
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <label class=""  for="price">Preço atual do curso</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">R$</div>
                                    </div>
                                    <input id="price" type="text" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal="," class="basic-usage form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price', $course->price ) }}" placeholder="00,00" required autofocus> 
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                <label for="price_old">Preço antigo do curso (Promoção) <strong>Opcional</strong></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">R$</div>
                                    </div>
                                    <input id="price_old" type="text" class="basic-usage form-control{{ $errors->has('price_old') ? ' is-invalid' : '' }}" name="price_old" value="{{ old('price_old', $course->price_old) }}" placeholder="00,00" required autofocus> 
                                    @if ($errors->has('price_old'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price_old') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="total_hours">Total horas do curso</label>
                                    <input id="total_hours" type="text" class="basic-usage form-control{{ $errors->has('total_hours') ? ' is-invalid' : '' }}" name="total_hours" value="{{ old('total_hours', $course->total_hours) }}" placeholder="00:00" required autofocus> 
                                    @if ($errors->has('total_hours'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('total_hours') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                <label for="free">Curso livre (OPCIONAL)</label>
                                <div class="input-group mb-3">
                                    <select id="free" name="free" class="form-control{{ $errors->has('free') ? ' is-invalid' : '' }}">
                                        <option value="1" {{ old('free', $course->free)=='1' ? 'selected' : ''  }}>Curso pago</option>
                                        <option value="0" {{ old('free', $course->free)=='0' ? 'selected' : ''  }}>Curso free</option>
                                    </select>
                                    @if ($errors->has('free'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('free') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                <label for="published">Publicar curso</label>
                                <div class="input-group mb-3">
                                    <select id="published" name="published" class="form-control{{ $errors->has('published') ? ' is-invalid' : '' }}">
                                        <option value="1" {{ old('published', $course->published)=='1' ? 'selected' : ''  }}>Publicar</option>
                                        <option value="0" {{ old('published', $course->published)=='0' ? 'selected' : ''  }}>Despublicar</option>
                                    </select>
                                    @if ($errors->has('published'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('published') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Alterar curso</button>
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

    <!--Mask Money-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> 
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="/dist/js/demo.js"></script>

    <script>
        $(document).ready( function() {
            //$("#basic-usage").stringToSlug();
            $("#name").stringToSlug({
                 getPut: '#slug',
            });

            // $(function() {
            //     $('#price').maskMoney();
            // })

            $('#price').mask('#.##0,00', {reverse: true});
            $('#price_old').mask('#.##0,00', {reverse: true});
            $('#total_hours').mask('00:00');
        });

        $('.custom-file-input').on('change', function() { 
            let fileName = $(this).val().split('\\').pop(); 
            $(this).next('.custom-file-label').addClass("selected").html(fileName); 
        });
    </script>

    <script src="/vendor/filemanagerjs/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script>
        var BASE_URL = "/"; // use your own base url
        tinymce.init({
            selector: "textarea#description",
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