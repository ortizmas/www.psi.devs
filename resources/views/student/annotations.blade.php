@extends('layouts.classroom.classroom') 

@section('styles')
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />
    <link href="{{ asset('dist/css/menu-accordion.css') }}" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>  
@endsection

@section('content')

    <div class="content-wrapper bg-white">
        <section class="content p-0">
            <div class="content-header bg-dark p-0 m-0">
                <div class="container-fluid bg-dark p-0">
                    <div class="jumbotron jumbotron-fluid bg-dark m-0 p-3">
                        <div class="container-fluid">
                            <h1 class="text-white">{{ $data_course->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-content">
                <div class="row pt-2 pb-5">
                    <div class="col-md-12">
                        <div id="results" style="display: none;">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Anotação salva com sucesso</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @foreach ($classrooms as $item)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i> {{ $item->name }}
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool p-1" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <form action="{{ route('student.annotation') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Anotações</label>
                                            <textarea id="description" class="form-control" name="description" rows="3" required="">{{ old('name', $item->description) }}</textarea>
                                        </div>
                                        <input id="courseId" type="hidden" name="course_id" value="{{ $item->course_id }}" >
                                        <input id="classroomId" type="hidden" name="classroom_id" value="{{ $item->classroom_id }}">
                                        <div id="preloader" style="display: none;">
                                            Salvando...
                                        </div>
                                        <button id="saveBtn" type="submit" class="btn btn-dark pull-right">Salvar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
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
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="/dist/js/pages/dashboard.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        //const axios = require('axios');

        // axios.post('{{ route('student.course.axios') }}').then(respond => {
        //     document.getElementById('axios-test').innerHTML = respond.data;
        //     console.log(respond.data)
        // })
        
        $('#saveBtn').click(function (e) {
            e.preventDefault();

            let courseId = document.getElementById('courseId').value;
            let classroomId = document.getElementById('classroomId').value;
            let desc = document.getElementById('description').value;

            startPreloader ()

            axios.post('{{ route('student.classroom.axios') }}', {
                course_id: courseId,
                classroom_id: classroomId,
                description: desc
            })
            .then(function (response) {
                if (response.data.status == 200) {
                    document.getElementById('results').style.display = "block"
                }
                //$("div.flash-message").html(response.data);
                console.log(response.data.status);
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(() => endPreloader ());
        });

        function startPreloader () {
            // Exibe a div de preloader
            document.getElementById('preloader').style.display = 'block'
        }

        function endPreloader () {
            // Oculta a div de preloader
            document.getElementById('preloader').style.display = 'none'

            setTimeout(function() {
                //window.location = response.data.redirect;
                document.getElementById('results').style.display = "none"
            }, 3000);
        }
    </script>

@stop