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
                                    <h1>CARTÃO CLUBE DE VANTAGENS</h1>
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
                        <div class="container pricing pb-5">
                            <div class="row flex-items-xs-middle flex-items-xs-center">

                                <div class="col-xs-12 col-lg-4">
                                    <div class="card text-center bg-gradient-success pt-5 pb-5">
                                        <div class="card-header">
                                            <h5 class="card-title">PLANO INDIVIDUAL</h5>
                                            <h3 class="display-2"><span class="currency">R$</span>220,00</h3>
                                            <span class="period">Valor por 1 ano</span><br><br>
                                            <a target="_blank" href="https://pag.ae/7V17nCEw6" class="btn btn-gradient mt-2">ADQUIRIR</a>
                                        </div>
                                        <div class="card-block">
                                            <div class="dropdown-divider" style="border-top: 5px solid #e4a71f;"></div>
                                            <div class="card-header">
                                                <h3 class="display-2"><span class="currency">R$</span>396,00</h3>
                                                <span class="period">Valor por 2 ano</span>
                                            </div>
                                            
                                            <ul class="list-group">
                                                <li class="list-group-item font-weight-bold">PARA AQUISIÇÃO DE DUAS</li>
                                                <li class="list-group-item font-weight-bold">ANUIDADES TEM 20% DE</li>
                                                <li class="list-group-item font-weight-bold">DESCONTO NA 2ª ANUIDADE</li>
                                            </ul>
                                            <p>Esse serviço pode ser parcelado no cartão de crédito em até 12X.</p>
                                            <a target="_blank" href="https://pag.ae/7V17rYVjr" class="btn btn-gradient mt-2">ADQUIRIR</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="card text-center bg-gradient-info pt-5 pb-5">
                                        <div class="card-header">
                                            <h5 class="card-title">PLANO 2 PESSOAS</h5>
                                            <h3 class="display-2"><span class="currency">R$</span>396,00</h3>
                                            <span class="period">+ 20% de desconto no 2º cadastro</span>
                                            <span class="period">Valor por 1 ano</span> <br>
                                            <a target="_blank" href="https://pag.ae/7V17rYVjr" class="btn btn-gradient mt-2">ADQUIRIR</a>
                                        </div>
                                        <div class="card-block">
                                            <div class="dropdown-divider" style="border-top: 5px solid #e4a71f;"></div>
                                            <div class="card-header">
                                                <h3 class="display-2"><span class="currency">R$</span>633,60</h3>
                                                <span class="period">Valor por 2 ano</span>
                                            </div>
                                            
                                            <ul class="list-group">
                                                <li class="list-group-item font-weight-bold">PARA AQUISIÇÃO DE DUAS</li>
                                                <li class="list-group-item font-weight-bold">ANUIDADES TEM 20% DE</li>
                                                <li class="list-group-item font-weight-bold">DESCONTO NA 2ª ANUIDADE</li>
                                            </ul>
                                            <p>Esse serviço pode ser parcelado no cartão de crédito em até 12X.</p>
                                            <a target="_blank" href="https://pag.ae/7V17t2Kjo" class="btn btn-gradient mt-2">ADQUIRIR</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    <div class="card text-center bg-gradient-warning pt-5 pb-5">
                                        <div class="card-header">
                                            <h5 class="card-title">PLANO 3 PESSOAS</h5>
                                            <h3 class="display-2"><span class="currency">R$</span>528,00</h3>
                                            <span class="period">+ 30% de desconto no 2º e 3º cadastro</span>
                                            <span class="period">Valor por 1 ano</span> <br>
                                            <a target="_blank" href="https://pag.ae/7V17wbpYJ" class="btn btn-gradient mt-2">ADQUIRIR</a>
                                        </div>
                                        
                                        <div class="card-block">
                                            <div class="dropdown-divider" style="border-top: 5px solid #e4a71f;"></div>
                                            <div class="card-header">
                                                <h3 class="display-2"><span class="currency">R$</span>739,20</h3>
                                                <span class="period">Valor por 2 ano</span>
                                            </div>
                                            
                                            <ul class="list-group">
                                                <li class="list-group-item font-weight-bold">PARA AQUISIÇÃO DE DUAS</li>
                                                <li class="list-group-item font-weight-bold">ANUIDADES TEM 20% DE</li>
                                                <li class="list-group-item font-weight-bold">DESCONTO NA 2ª ANUIDADE</li>
                                            </ul>
                                            <p>Esse serviço pode ser parcelado no cartão de crédito em até 12X.</p>
                                            <a target="_blank" href="https://pag.ae/7V17xpMzm" class="btn btn-gradient mt-2">ADQUIRIR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



