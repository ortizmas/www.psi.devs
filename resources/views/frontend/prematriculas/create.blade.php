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
                                    <h1>MINHA CONTA</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <form action="{{ route('login') }}" method="post" novalidate="">
                        <div class="card mt-4">
                            <div class="card-header pt-3 pb-1">
                                <h5 class="card-title">Fazer lpgin</h5>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    <div class="input-group-append">
                                        <span class="fa fa-envelope input-group-text"></span> 
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <div class="input-group-append">
                                        <span class="fas fa-lock input-group-text" style="font-weight: 900;"></span> 
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert" style="display: block;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="checkbox icheck">
                                            <label>
                                                <input type="checkbox"> Lembrar acesso
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">ENTRAR</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <form action="{{ route('preregister.store') }}" method="post" novalidate="">
                        @csrf
                        <div class="card mt-4">
                            <div class="card-header pt-3 pb-1">
                                <h5 class="card-title">Ainda não tem uma conta? <strong>Cadastre-se agora</strong></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input id="name_user" type="text" class="form-control{{ $errors->has('name_user') ? ' is-invalid' : '' }}" name="name_user" value="{{ old('name_user') }}" placeholder="Nome completo"
                                            required autofocus> 
                                            <div class="input-group-append">
                                                <span class="fas fa-user input-group-text" style="font-weight: 900;"></span>
                                            </div>
                                            @if ($errors->has('name_user'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name_user') }}</strong>
                                                </span> 
                                            @endif
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input id="email_user" type="email" class="form-control{{ $errors->has('email_user') ? ' is-invalid' : '' }}" name="email_user" value="{{ old('email_user') }}" placeholder="E-mail">
                                            <div class="input-group-append">
                                                <span class="fas fa-envelope input-group-text" style="font-weight: 900;"></span> 
                                            </div>
                                            @if ($errors->has('email_user'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email_user') }}</strong>
                                                </span>
                                            @endif
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input id="password_user" type="password" class="form-control{{ $errors->has('password_user') ? ' is-invalid' : '' }}" name="password_user" placeholder="Senha" required>
                                            <div class="input-group-append">
                                              <span class="fas fa-lock input-group-text" style="font-weight: 900;"></span>
                                            </div>
                                        </div>
                                        <b class="text-info">* Senha minimo 6 carateres</b>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input id="password_user-confirm" type="password" class="form-control" name="password_user_confirmation" placeholder="Senha de confirmação" required>
                                            <div class="input-group-append">
                                                <span class="fas fa-lock input-group-text" style="font-weight: 900;"></span> 
                                            </div>
                                        </div>
                                        @if ($errors->has('password_user'))
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong>{{ $errors->first('password_user') }}</strong>
                                            </span>
                                        @endif

                                    </div>

                                </div>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-success btn-block btn-flat">REGISTRAR <i class="fas fa-angle-double-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

            $(document).on('keyup', '#name', function() {
                $('#name_user').val($(this).val());
            });

            $(document).on('keyup', '#email_inscription', function() {
                $('#email').val($(this).val());
            });
        })(jQuery);
    </script>
@endsection



