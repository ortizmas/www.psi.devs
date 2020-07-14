@extends('layouts.app')

@section('styles')
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <!--<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>-->
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <video
                        id="vid1"
                        class="video-js vjs-theme-city"
                        width="640" height="264"
                        data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "https://vimeo.com/378327608"}], "vimeo": { "color": "#fbc51b"} }'
                    >
                    </video> --}}


                    <video id="vid1" class="video-js vjs-default-skin vjs-fluid" controls width="100" height="264"></video>
                    <!--   <video id="vid1" class="video-js vjs-default-skin vjs-fluid" controls width="640" height="264" data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "https://www.youtube.com/watch?v=xjS6SftYQaQ"}] }'>
                        </video> -->

                    <h2>Load Video:</h2>
                    <form id="vsg-loadvideo">
                        Video URL:
                        <br>
                        <input type="text" name="vidurl" id="vsg-vurl" style="width:450px" value="https://www.youtube.com/watch?v=xDMP3i36naA" placeholder="Enter Youtube URL">
                        <br>
                        <br>
                        <input type="submit" value="Load video">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul id="vidlink">
                        <li><a id="myLink" title="Click video" href="https://www.youtube.com/watch?v=kkGeOWYOFoA">Play Youtube 1</a></li>
                        <li><a id="myLink" title="Click video" href="https://www.youtube.com/watch?v=Ie8olvmaZug">Play Youtube 2</a></li>
                        <li><a id="myLink" title="Click video" href="https://vimeo.com/378327608?autoplay=1">Vimeo</a></li>
                        <li><a id="myLink" title="Click video" href="https://www.youtube.com/watch?v=x4ZTpNPL_dc">Youtube</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ mix('js/videojs.js') }}"></script>
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


@endsection
