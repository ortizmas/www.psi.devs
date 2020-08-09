@extends('layouts.classroom.classroom') 

@section('styles')
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />
    <link href="{{ asset('dist/css/menu-accordion.css') }}" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script> 

    <style>
        .card-module::before {
            position:absolute;
            content:'';
            background: linear-gradient(#007bff, #007bff);
            width:6px;
            height:100%;
            border-radius:4px 0 0 4px;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper bg-white">
        <section class="content p-0">
            <div class="content-header bg-dark p-0 m-0">
                <div class="container-fluid bg-dark p-0">
                    <div class="jumbotron jumbotron-fluid bg-dark m-0 p-3 shadow">
                        <div class="container-fluid">
                            <h1 class="text-white">{{ $data_course->name }}</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid bg-content">
                <div class="row pt-3 pb-5">
                    <div class="col-md-12">
                        <div id="results" style="display: none;">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Anotação salva com sucesso</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @foreach ($courses[0]->modules as $key => $module)
                            @if ($module->classrooms->count() > 0)
                            <div class="card card-module">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa fa-folder-open text-primary mr-1"></i> {{ $module->name }}
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool p-1" data-card-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    @foreach ($module->classrooms as $class)
                                    <div class="card collapsed-card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="ion ion-clipboard mr-1"></i> {{ $class->name }}
                                            </h3>
                                    
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool bg-success" data-card-widget="collapse">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool bg-light" data-card-widget="collapse">
                                                    <i class="fa fa-check {{ (isset($class->annotation['description'])) ? 'text-success' : 'text-dark'  }}"></i>
                                                </button>
                                            </div>
                                        </div>
                                    
                                        <div class="card-body">
                                            <form class="form_anotacao" action="#">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="course_id" value="{{ $module->course_id }}">
                                                    <input type="hidden" name="classroom_id" value="{{ $class->id }}">
                                                    <textarea id="description" class="form-control" name="description" rows="2"
                                                        required="">{{ old('description', @$class->annotation['description']) }}</textarea>
                                                    <span class="msg_salvou_anotacao badge badge-success p-2" style="display: none; color: #fff;">Anotação
                                                        salva com sucesso</span>
                                                </div>
                                                <div class="form-group end-xs">
                                                    <button class="btn btn-success pull-right save_anotation" type="submit">
                                                        Salvar
                                                        <div class="spinner_button spinner-border" role="status" style="display: none">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    </button>
                                                </div>
                                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="/dist/js/pages/dashboard.js"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        $('#description').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100,
            toolbar: [
                ['font', ['bold', 'clear']],
                ['para', ['ul', 'ol']],
                ['color', ['color']],
                ['view', ['codeview']]
            ]
        });
    </script>

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

            axios.post('{{ route('student.classroom.axios')}}', {
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

    <script>
        var url = '{{ route('student.classroom.axios')}}';

        $('.save_anotation').click(function (event) {
            event.preventDefault();
            // Mostrar loading in the button
            $('.spinner_button').show();

            var current_form = $(this).closest('.form_anotacao');

            $.post(url, current_form.serialize())
                .done(function (data) {
                    if (data.status == 200)
                        current_form.find('.msg_salvou_anotacao')
                            .css("color", "#fff")
                            .text("Anotação salva com sucesso!")
                            .show().delay(3000).hide(200);
                    else
                        current_form.find('.msg_salvou_anotacao')
                            .css("color", "red")
                            .text("Erro ao salvar a anotação!")
                            .show().delay(3000).hide(200);

                    // Ocultar loading in the button
                    $('.spinner_button').hide();
                })
                .fail(function () {
                    current_form.find('.msg_salvou_anotacao')
                        .css("color", "red")
                        .text("Erro ao salvar a anotação!")
                        .show().delay(3000).hide(200);

                    // Ocultar loading in the button
                    $('.spinner_button').hide();
                });
        });
    </script>

@stop