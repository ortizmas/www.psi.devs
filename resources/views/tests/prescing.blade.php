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
                                    <h1>PRECING</h1>
                                </header>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container pricing">
        <div class="row flex-items-xs-middle flex-items-xs-center">

            <!-- Table #1  -->
            <div class="col-xs-12 col-lg-4">
                <div class="card text-xs-center">
                    <div class="card-header">
                        <h3 class="display-2"><span class="currency">$</span>19<span class="period">/month</span></h3>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title"> 
                            Basic Plan
                        </h4>
                        <ul class="list-group">
                            <li class="list-group-item">Ultimate Features</li>
                            <li class="list-group-item">Responsive Ready</li>
                            <li class="list-group-item">Visual Composer Included</li>
                            <li class="list-group-item">24/7 Support System</li>
                        </ul>
                        <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
                    </div>
                </div>
            </div>

            <!-- Table #1  -->
            <div class="col-xs-12 col-lg-4">
                <div class="card text-xs-center">
                    <div class="card-header">
                        <h3 class="display-2"><span class="currency">$</span>29<span class="period">/month</span></h3>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title"> 
                            Regular Plan
                        </h4>
                        <ul class="list-group">
                            <li class="list-group-item">Ultimate Features</li>
                            <li class="list-group-item">Responsive Ready</li>
                            <li class="list-group-item">Visual Composer Included</li>
                            <li class="list-group-item">24/7 Support System</li>
                        </ul>
                        <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
                    </div>
                </div>
            </div>

            <!-- Table #1  -->
            <div class="col-xs-12 col-lg-4">
                <div class="card text-xs-center">
                    <div class="card-header">
                        <h3 class="display-2"><span class="currency">$</span>39<span class="period">/month</span></h3>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title"> 
                            Premium Plan
                        </h4>
                        <ul class="list-group">
                            <li class="list-group-item">Ultimate Features</li>
                            <li class="list-group-item">Responsive Ready</li>
                            <li class="list-group-item">Visual Composer Included</li>
                            <li class="list-group-item">24/7 Support System</li>
                        </ul>
                        <a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container pricing pb-5">
        <div class="row flex-items-xs-middle flex-items-xs-center">

            <!-- Table #1  -->
            <div class="col-xs-12 col-lg-4">
                <div class="card text-center bg-gradient-success pt-5 pb-5">
                    <div class="card-header">
                        <h3 class="display-2"><span class="currency">R$</span>200,00<span class="period"> /Valor da sessão</span></h3>
                    </div>
                    <div class="card-block">
                        <h5 class="card-title"> 
                            SESSÃO INICIAL AVULSA   
                        </h5>
                        <div class="dropdown-divider"></div>
                        <ul class="list-group">
                            <li class="list-group-item font-weight-bold">Total por sessão: R$ 200,00</li>
                        </ul>
                        <p>Todos os serviços podem ser parcelados no cartão de crédito via pagseguro em até 12x.</p>
                        <a href="#" class="btn btn-gradient mt-2">ADQUIRIR</a>
                    </div>
                </div>
            </div>

            <!-- Table #1  -->
            <div class="col-xs-12 col-lg-4">
                <div class="card text-center bg-gradient-info pt-5 pb-5">
                    <div class="card-header">
                        <h3 class="display-2"><span class="currency">R$</span>180,00<span class="period"> /Valor da sesessão</span></h3>
                    </div>
                    <div class="card-block">
                        <h5 class="card-title"> 
                            PACOTE DE 5 SESSÕES
                        </h5>
                        <div class="dropdown-divider"></div>
                        <ul class="list-group">
                            <li class="list-group-item font-weight-bold">Total do pacote: R$ 900,00</li>
                        </ul>
                        <p>Todos os serviços podem ser parcelados no cartão de crédito via pagseguro em até 12x.</p>
                        <a href="#" class="btn btn-gradient mt-2">ADQUIRIR</a>
                    </div>
                </div>
            </div>

            <!-- Table #1  -->
            <div class="col-xs-12 col-lg-4">
                <div class="card text-center bg-gradient-warning pt-5 pb-5">
                    <div class="card-header">
                        <h3 class="display-2"><span class="currency">R$</span>160,00<span class="period"> /Valor da sesessão</span></h3>
                    </div>
                    <div class="card-block">
                        <h5 class="card-title"> 
                            PACOTE DE 10 SESSÕES
                        </h5>
                        <div class="dropdown-divider"></div>
                        <ul class="list-group">
                            <li class="list-group-item font-weight-bold">Total do pacote: R$ 1600,00</li>
                        </ul>
                        <p>Todos os serviços podem ser parcelados no cartão de crédito via pagseguro em até 12x.</p>
                        <a href="#" class="btn btn-gradient mt-2">ADQUIRIR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



