@extends('layouts.master') 

@section('content')

    <div class="content-wrapper bg-white">
        <div class="content-header p-0 m-0">
            <div class="container-fluid">
                <div class="jumbotron jumbotron-fluid bg-dark m-0">
                    <div class="container">
                        <h1 class="display-4">Aulas</h1>
                        <p class="lead">Lista de modulos e aulas</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container bg-content">
            <div class="row pt-5 pb-5">
                <div class="col-md-8">

                </div>

                <div class="col-md-4">
                    @if (isset($courses))
                        @foreach ($courses as $module)
                            @if ($module->classrooms->count() > 0)
                                <div class="card mb-0 pb-0">
                                    <div class="card-header bg-dark">
                                        <h3 class="card-title">{{ $module->name }}</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            @foreach ($module->classrooms as $class)
                                                <div class="list-group-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="classroom_id[]" value="{{ $class->id }}" id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            {{ $class->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="class_id[]" value="{{ $class->id }}">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
 
@section('javascript')
<!-- jQuery -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="/dist/js/pages/dashboard.js"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
@stop