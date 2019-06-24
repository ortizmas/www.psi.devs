@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="container-fluid pl-0 pb-5 pr-0">
        <div class="hero-show" id="home">
            <div class="hero-show-overlay ">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                                <header class="entry-header text-center pt-5">
                                    <h1>INSCREVA-SE</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="container page-content">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-xl-10">
                    <div class="shadow-lg p-4 mb-5 bg-white rounded">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('inscription.store') }}" method="post">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-3">
                                                <input id="name" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="NOME" required autofocus> 
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <input id="cpf" type="text" class="basic-usage form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" placeholder="CPF" required autofocus> 
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
                                                <input id="cep" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cep" value="{{ old('cep') }}" placeholder="CEP" required autofocus> 
                                                @if ($errors->has('cep'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('cep') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mb-3">
                                                <input id="rua" type="text" class="basic-usage form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street') }}" placeholder="ENDEREÇO" required autofocus> 
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
                                                <input id="bairro" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="neighborhood" value="{{ old('neighborhood') }}" placeholder="BAIRRO" required autofocus> 
                                                @if ($errors->has('neighborhood'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('neighborhood') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <input id="cidade" type="text" class="basic-usage form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" placeholder="CIDADE" required autofocus> 
                                                @if ($errors->has('city'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <input id="uf" type="text" class="basic-usage form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" placeholder="UF" required autofocus> 
                                                @if ($errors->has('state'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('state') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group mb-3">
                                                <input id="ibge" type="text" class="basic-usage form-control{{ $errors->has('ibge') ? ' is-invalid' : '' }}" name="ibge" value="{{ old('ibge') }}" placeholder="IBGE" required autofocus> 
                                                @if ($errors->has('ibge'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('ibge') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-3">
                                                <input id="email" type="email" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-MAIL" required autofocus> 
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <input id="phone" type="tel" class="basic-usage form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="TELEFONE" required autofocus> 
                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-3">
                                                <input id="company" type="text" class="basic-usage form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" placeholder="EMPRESA" required autofocus> 
                                                @if ($errors->has('company'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('company') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <input id="company_phone" type="tel" class="basic-usage form-control{{ $errors->has('company_phone') ? ' is-invalid' : '' }}" name="company_phone" value="{{ old('company_phone') }}" placeholder="TELEFONE DA EMPRESSA" required autofocus> 
                                                @if ($errors->has('company_phone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('company_phone') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <input id="program" type="text" class="form-control{{ $errors->has('program') ? ' is-invalid' : '' }}" name="program" value="{{ old('program', $slug) }}" placeholder="PROGRAMA REFERENTE" required autofocus>
                                                @if ($errors->has('program'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('program') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                    <input type="text" name="payment_link" value="{{ $payment_link }}">

                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">INSCREVA-SE</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection

@section('scripts')
    <!--Mask jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" type="text/javascript"></script>

    <script>
        (function( $ ) {
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
        })(jQuery);
    </script>
@endsection



