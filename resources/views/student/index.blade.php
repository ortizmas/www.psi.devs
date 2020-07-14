@extends('layouts.master') 

@section('content')

    <div class="content-wrapper bg-white">
        <div class="content-header p-0 m-0">
            <div class="container-fluid">
                <div class="jumbotron jumbotron-fluid bg-dark m-0">
                    <div class="container">
                        <h1 class="display-4">Meus cursos</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container bg-content">
            <div class="row pt-5 pb-5">
                @if (session()->has('success'))
                    <div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hoops</strong> {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                @foreach ($courses as $course)
                    <div class="col-md-3">
                        <div class="card">
                            <a href="{{ route('learn.lecture', [$course->url, $course->id]) }}" title="{{ $course->name }}">
                                <img src="{{ asset('storage/courses/' . $course->image) }}" class="card-img-top" alt="{{ $course->name }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->name }}</h5>
                                {{-- <p class="card-text">{{ $course->description }}</p> --}}
                                <a class="btn btn-success float-left w-100 mt-3" href="{{ route('learn.lecture', [$course->url, $course->id]) }}">Ver curso</a>
                            </div>
                        </div>
                    </div>
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