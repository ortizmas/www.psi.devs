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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body p-0 rounded-0">
                                <div id="first_video" class="w-100">
                                    <div class="video-container w-100">
                                        <img src="{{ asset('storage/courses/' . $data_course->image) }}" alt="" class="img-fluid">
                                        <a class="video-play-button" href="{{ $data_course->video }}" target="_blank"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('layouts.classroom.menu-playlist', ['courses' => $courses, 'course_id' => $data_course->id])
                    </div>

                    <div class="col-md-4">
                        <div class="card bg-light" id="notas">
                            {{-- @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif --}}

                            {{-- <div class="flash-message"></div> --}}
                            <div id="results" style="display: none;">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Anotação salva com sucesso</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <form action="{{ route('student.annotation') }}" method="post">
                                    @csrf --}}
                                <form id="annotationsForm">
                                    <div class="form-group">
                                        <label>Quadro para notações</label>
                                        <textarea id="description" class="form-control" name="description" rows="6" required="">{{ old('description', isset($annotation) ? $annotation->description : '') }}</textarea>
                                    </div>
                                    <input id="courseId" type="hidden" name="course_id" value="{{ $data_course->id }}" >
                                    <div id="preloader" style="display: none;">
                                        Salvando...
                                    </div>
                                    <button id="saveBtn" type="submit" class="btn btn-dark pull-right">Salvar</button>
                                </form>

                                <div id="axios-test"></div>
                            </div>
                        </div>

                        {{-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fa fa-file mr-1"></i> Minhas Anotações
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool p-1" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="todo-list">
                                    @foreach ($annotations as $note)
                                        <li>
                                            <span class="text">{{ $note->description }}</span>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
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

    <script src="{{ asset('js/videojs.js') }}"></script>
    <script src="{{ asset('js/Youtube.min.js') }}"></script>

    {{-- <script src="https://player.vimeo.com/api/player.js"></script> --}}

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
            let desc = document.getElementById('description').value;
            
            startPreloader ()

            axios.post('{{ route('student.course.axios') }}', {
                course_id: courseId,
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
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <script>
        let playButton = document.querySelector('.video-container a');
        playButton.addEventListener('click', playVideo);

        function playVideo(e) {
            e.preventDefault();
            let videoContainer = this.parentNode;
            let videoUrl = this.href;
            let videoId = videoUrl.split('.com/')[1];
            let iframeUrl;

            if(videoUrl.includes('vimeo')) {
                // vimeo
                videoId = videoId.split('?')[0];
                iframeUrl = `//player.vimeo.com/video/${videoId}?autoplay=1`;
            } else {
                // youtube
                videoId = videoId.split('v=')[1];
                iframeUrl = `//www.youtube.com/embed/${videoId}?autoplay=1`;
            }
            
            videoContainer.innerHTML = `<iframe src="${iframeUrl}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>`;
        }
        
    </script>
@stop