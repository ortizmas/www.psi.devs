@extends('layouts.classroom') 

@section('styles')
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <!--<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>-->
@endsection

@section('content')

    <div class="content-wrapper bg-white">
        <div class="content-header p-0 m-0">
            <div class="container-fluid">
                <div class="jumbotron jumbotron-fluid bg-light m-0 p-3">
                    <div class="container-fluid">
                        <h1 class="display-4">Programa vencendo a dor crônica </h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-content">
            <div class="row pt-5 pb-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <video id="vid1" class="video-js vjs-default-skin vjs-fluid" controls width="100" height="264"></video>

                            {{-- <h2>Load Video:</h2>
                            <form id="vsg-loadvideo">
                                Video URL:
                                <br>
                                <input type="text" name="vidurl" id="vsg-vurl" style="width:450px" value="https://www.youtube.com/watch?v=xDMP3i36naA" placeholder="Enter Youtube URL">
                                <br>
                                <br>
                                <input type="submit" value="Load video">
                            </form> --}}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    @if (isset($courses))
                        @foreach ($courses as $key => $module)
                            
                            @if ($module->classrooms->count() > 0)
                                <div class="card mb-0 pb-0 {{ ($key == 0) ? '' : 'collapsed-card' }}">
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

    <script src="{{ asset('js/videojs.js') }}"></script>
    <script src="{{ asset('js/Youtube.min.js') }}"></script>
    <!--<script src="https://vjs.zencdn.net/7.6.6/video.js"></script>
    <script src="{{ asset('js/videojs-vimeo.min.js') }}"></script>-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/videojs-vimeo-v2@2.0.2/src/Vimeo.min.js"></script> --}}

    <script>
        /* VIDEOJS */
        // declare object for video
        var vgsPlayer, poster;
        /*
        vgsPlayer = videojs('vid1', {
        techOrder: ['youtube'],
        autoplay: false,
        sources: [{
            type: "video/youtube",
            src: "https://www.youtube.com/watch?v=xjS6SftYQaQ"
        }]
        });
        */

        vgsPlayer = videojs('vid1', {
            techOrder: ["html5", "youtube", "vimeo"],
            autoplay: false,
            youtube: { "iv_load_policy": 3 },
            sources: [{
                type: "video/mp4",
                src: "http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4"
            }]
        });

        console.log(vgsPlayer.options().autoplay);

        vgsPlayer.poster('https://img.youtube.com/vi/aqz-KE-bpKQ/maxresdefault.jpg');
        //vgsPlayer.poster("http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4")

        //videojs("vid1").ready(function() {
        //  vgsPlayer = this;
        //});

        jQuery(function($) {

        // vsgLoadVideo("https://www.youtube.com/watch?v=r1H98REH0c0");
        // Video on page load

        //jQuery(document).ready(function($) {

        $("#vsg-loadvideo").submit(function(e) {
            e.preventDefault();

            var vidURL = $("#vsg-vurl").val();

            vsgLoadVideo(vidURL);

        });

        }); // jQuery(function($) END


        function vsgLoadVideo(vidURL, poster) {

            if (ytVidId(vidURL) !== false) {
                ext = "youtube"
                // alert(getId(vidURL)) // Youtube video ID
                //var yvID = getId(vidURL);
                //vidURL = "https://www.youtube.com/watch?v="+yvID;

            } else if (vimeo_parser(vidURL) !== false){
                ext = "vimeo";
                vgsPlayer.options({
                    autoplay: true
                });
            } else {
                //$("#vid1 iframe, #vid1 .vjs-iframe-blocker").remove();
                if (!ext)
                    ext = "mp4";

                var ext = vidURL.split('.').pop();
            }

            console.log(vgsPlayer.options().autoplay);

            vgsPlayer.src({
                //"techOrder": ['youtube'],
                "type": "video/" + ext,
                "src": vidURL
                //"youtube": { "iv_load_policy": 3 }

            });


            if (poster)
                vgsPlayer.poster(poster);

            vgsPlayer.play();
        }



        function ytVidId(url) {
            //var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
            var p = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            return (url.match(p)) ? RegExp.$1 : false;
        }

        /*Vimeo https://vimeo.com/378327608 explode vimeo*/

        function getVimeoId(url) {
            var m = url.match(/^.+vimeo.com\/(.*\/)?([^#\?]*)/);
            return m ? m[2] || m[1] : null;
        }

        function vimeo_parser(url){
            // var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
            var regExp = /^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/))?([0-9]+)/;
            var match = url.match(regExp);
            var vimeoName = (match&&match[1]) ? match[1] : false;

            //return vimeoName;

            if (vimeoName == false){
                return false;
            } else{
                var fetchVimeoNameArr = vimeoName.split('.');
                return fetchVimeoNameArr[0];
            }
        }

        /**/
        function getId(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }

        /********* LOAD URL *********/
        $('#vidlink li a').on('click', function(e) {
            e.preventDefault();
            var vidlink = $(this).attr('href');
            vsgLoadVideo(vidlink);
            $('#vsg-vurl').val(vidlink);
        });

    </script>
@stop