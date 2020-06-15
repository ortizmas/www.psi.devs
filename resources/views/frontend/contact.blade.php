@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="container-fluid pb-5">
        <div class="hero-show" id="home">
            <div class="hero-show-overlay ">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-show-wrap flex-column justify-content-center align-items-start">
                                <header class="entry-header pt-5">
                                    <h1>CONTATO</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="content-page pt-4">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                    <div class="card border-dark mb-4">
                        <div class="card-header bg-dark pb-0">
                            <p class="text-white float-left">Preencha o formulário abaixo para enviar a sua pergunta ou sugestão.</p>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>Success</strong> {{ session('success') }}
                                </div>
                            @endif
                            <form class="form-signin needs-validation" action="{{ route('send.contact') }}" method="POST" novalidate>
                                {{ csrf_field() }}
                                <div class="input-group pb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nome completo" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Digite um nome valido
                                    </div>
                                </div>

                                <div class="input-group pb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Digite um email valido
                                    </div>
                                </div>

                                <div class="input-group pb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="tel" name="phone" class="form-control" id="phone" placeholder="Telefone" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Digite um telefone valido
                                    </div>
                                </div>
                                <p class="text-left">Use esse espaço para fazer sugestões, reclamações e nos dar o seu ponto de vista sobre a sua
                                    experiência com a gente (seja ele qual for). Esse espaço é para você portando fique a vontade.</p>
                               <p class="text-left h5 text-primary"><span class="btn btn-primary btn-sm font-weight-bold">DICA </span> Quanto mais específico você for, mais poderemos te ajudar :)</p>
                               
                                <div class="input-group pb-2">
                                    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-edit"></i></span>
                                    </div>
                                    <textarea name="message" id="message" cols="" rows="5" class="form-control" required></textarea> 
                                    <div class="invalid-feedback">
                                        escreva sua mensagem
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-primary btn-block mb-1" type="submit">CONTE-NOS MAIS</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
@endsection



