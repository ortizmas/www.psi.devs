@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark"></h1>
          </div>
          @role('super-admin')
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('inscriptions.index') }}" class="btn btn-info btn-sm">Lista de Inscritos</a></li>
            </ol>
          </div>
          @endrole
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('profiles.inscription.update', $inscription->id) }}" method="post" >
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Alterar informações gerais</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="name" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $inscription->name ) }}" placeholder="NOME" required autofocus> 
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="email_inscription" type="email" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email_inscription" value="{{ old('email_inscription', $inscription->email_inscription ) }}" placeholder="E-MAIL" required autofocus> 
                                    @if ($errors->has('email_inscription'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email_inscription') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="cpf" type="text" class="basic-usage form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf', $inscription->cpf) }}" placeholder="CPF" required autofocus> 
                                    @if ($errors->has('cpf'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cpf') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
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
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                <div class="form-group mb-3">
                                    <input id="cep" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cep" value="{{ old('cep', $inscription->cep ) }}" placeholder="CEP" required autofocus> 
                                    @if ($errors->has('cep'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cep') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-9 col-xl-9 pt-2"><a target="_blank" href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm" title="Não sei meu CEP" class="text-primary"><b>Não sei meu CEP</b></a></div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="rua" type="text" class="basic-usage form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street', $inscription->street ) }}" placeholder="ENDEREÇO" required autofocus> 
                                    @if ($errors->has('street'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="bairro" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="neighborhood" value="{{ old('neighborhood', $inscription->neighborhood ) }}" placeholder="BAIRRO" required autofocus> 
                                    @if ($errors->has('neighborhood'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('neighborhood') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="cidade" type="text" class="basic-usage form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city', $inscription->city ) }}" placeholder="CIDADE" required autofocus> 
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="uf" type="text" class="basic-usage form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state', $inscription->state ) }}" placeholder="UF" required autofocus> 
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>

                        <input id="ibge" type="hidden" name="ibge" value="{{ old('ibge') }}">

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="company" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="company" value="{{ old('company', $inscription->company ) }}" placeholder="EMPRESA" required autofocus> 
                                    @if ($errors->has('company'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group mb-3">
                                    <input id="company_phone" type="tel" class="basic-usage form-control{{ $errors->has('company_phone') ? ' is-invalid' : '' }}" name="company_phone" value="{{ old('company_phone', $inscription->company_phone ) }}" placeholder="TELEFONE DA EMPRESSA" required autofocus> 
                                    @if ($errors->has('company_phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('company_phone') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>

                            {{-- @if (session()->has('item_buy'))
                                <input id="program" type="hidden" name="program_session" value="{{ old('program', session('item_buy', 'default')) }}" readonly="">
                            @else
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <select id="program" name="program" class="form-control{{ $errors->has('program') ? ' is-invalid' : '' }}" required="required">
                                            <option value="" >-- Selecionar um curso --</option>
                                            @foreach ($programs as $program)
                                                <option value="{{ $program->id }}" {{ old('program', $inscription->courses[0]->id)==$program->id  ? 'selected' : ''  }}>{{ $program->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('program'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('program') }}</strong>
                                            </span> 
                                        @endif
                                    </div>
                                </div>
                            @endif --}}

                            @role('super-admin')
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
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
                            @endrole
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Alterar dados</button>
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

    <!--Mask jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" type="text/javascript"></script>
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/demo.js"></script>

    <script>
        $(document).ready(function() {
            $(function() {
                $("#phone").mask("(00) 90000-0000");
                $("#company_phone").mask("(00) 90000-0000");
                //$("#goal").mask("0000.00");
                $("#data_of_birth").mask("99/99/9999");
                $("#delivery_date").mask("99/99/9999");
                $("#start_date").mask("99/99/9999");
                $("#end_date").mask("99/99/9999");
                //$("#phone").mask("(99) 999-9999");
                $("#cep").mask("99.999-999");
                //$("#cpf").mask("99.999.999-99");
                //$("#txtCnpjPesquisa").mask("99.999.999/9999-99");
                
                $("#cpf").mask("999.999.999-99");
                $('#cpf').blur(function () {
                    var id=$(this).attr("id");
                    var val=$(this).val();
                    var pattern = new RegExp(/[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}/);

                    if(val.match(pattern) == null){
                        $("#"+id+"_error").html("Digite um CPF válido");
                    }
                });
            });

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>
@stop