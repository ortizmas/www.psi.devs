@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Alterar Inscrito</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="javascript:history.back()" class="btn btn-info btn-sm">Lista de Inscritos</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('inscriptions.update', $inscription->id) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <input id="name" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $inscription->name ) }}" placeholder="NOME" required autofocus> 
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <input id="cpf" type="text" class="basic-usage form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf', $inscription->cpf) }}" placeholder="CPF" required autofocus> 
                                    @if ($errors->has('cpf'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cpf') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <input id="cep" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cep" value="{{ old('cep', $inscription->cep ) }}" placeholder="CEP" required autofocus> 
                                    @if ($errors->has('cep'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cep') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group mb-3">
                                    <input id="rua" type="text" class="basic-usage form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street', $inscription->street ) }}" placeholder="ENDEREÇO" required autofocus> 
                                    @if ($errors->has('street'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <input id="bairro" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="neighborhood" value="{{ old('neighborhood', $inscription->neighborhood ) }}" placeholder="BAIRRO" required autofocus> 
                                    @if ($errors->has('neighborhood'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('neighborhood') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <input id="cidade" type="text" class="basic-usage form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city', $inscription->city ) }}" placeholder="CIDADE" required autofocus> 
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <input id="uf" type="text" class="basic-usage form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state', $inscription->state ) }}" placeholder="UF" required autofocus> 
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <input id="ibge" type="text" class="basic-usage form-control{{ $errors->has('ibge') ? ' is-invalid' : '' }}" name="ibge" value="{{ old('ibge', $inscription->ibge ) }}" placeholder="IBGE" required autofocus> 
                                    @if ($errors->has('ibge'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ibge') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <input id="email_inscription" type="email" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email_inscription" value="{{ old('email_inscription', $inscription->email_inscription ) }}" placeholder="E-MAIL" required autofocus> 
                                    @if ($errors->has('email_inscription'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email_inscription') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <input id="phone" type="tel" class="basic-usage form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $inscription->phone ) }}" placeholder="TELEFONE" required autofocus> 
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <input id="company" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="company" value="{{ old('company', $inscription->company ) }}" placeholder="EMPRESA" required autofocus> 
                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <input id="company_phone" type="tel" class="basic-usage form-control{{ $errors->has('company_phone') ? ' is-invalid' : '' }}" name="company_phone" value="{{ old('company_phone', $inscription->company_phone ) }}" placeholder="TELEFONE DA EMPRESSA" required autofocus> 
                                    @if ($errors->has('company_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_phone') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <select id="status" name="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}">
                                        <option value="1" {{ old('status', $inscription->status )=='1' ? 'selected' : ''  }}>Ativo</option>
                                        <option value="0" {{ old('status', $inscription->status)=='0' ? 'selected' : ''  }}>Inativo</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        {{-- <div class="row">
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <select id="course_id" name="course_id" class="form-control{{ $errors->has('course_id') ? ' is-invalid' : '' }}">
                                        <option value=""> -- SELECIONAR UM CURSO --</option>}
                                        option
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}" {{ old('course_id', $inscription->courses[0]->id )== $course->id  ? 'selected' : ''  }}>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('program'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('program') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            
                        </div> --}}

                            <div class="row justify-content-end">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-dark btn-block btn-flat">Alterar</button>
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