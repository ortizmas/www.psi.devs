@extends('layouts.pdf') 
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> --}}

@section('styles')

    
    <style>
        /* .panel-module::before {
            position:absolute;
            content:'';
            background: linear-gradient(#007bff, #007bff);
            width:6px;
            height:100%;
            border-radius:4px 0 0 4px;
        } */
        /* .page-break {
            page-break-inside: avoid;
            page-break-after: always;
        } */
        .ft-ms-100{
            font-family: 'Montserrat', sans-serif;
            font-weight: 100;
        }
        .ft-ms-200{
            font-family: 'Montserrat', sans-serif;
            font-weight: 200;
        }
        .ft-ms-300{
            font-family: 'Montserrat', sans-serif;
            font-weight: 300;
        }
        .ft-ms-400{
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
        }
        .ft-ms-500{
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
        }
        .ft-ms-600{
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }
        .ft-ms-700{
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }
        .ft-ms-800{
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
        }
        .ft-ms-900{
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
        }
        
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="text-uppercase">{{ $courses[0]['name'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach ($courses[0]->modules as $key => $module)
                    @if ($module->classrooms->count() > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-folder-open text-primary mr-1"></i>{{ $key + 1 }} - {{ $module->name }}
                            </h3>
                        </div>
                        
                        <div class="panel-body">
                            @foreach ($module->classrooms as $key2 => $class)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        {{ $key + 1 }} . {{ $key2+1 }} - {{ $class->name }}
                                    </h3>
                                </div>
                            
                                <div class="panel-body">
                                    <div style="min-height: 100px;">
                                        {!! @$class->annotation['description'] !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
 
@section('javascript')
    <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
@stop