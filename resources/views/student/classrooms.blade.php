@extends('layouts.classroom') 

@section('styles')
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />

    <style>
        .classroom-menu {
            
        }
        .classroom-menu ul {
                list-style-type: none;
            }

            .classroom-menu a {
                color: #b63b4d;
                text-decoration: none;
            }

            /** =======================
            * Contenedor Principal
            ===========================*/
            .classroom-menu h1 {
                color: #FFF;
                font-size: 24px;
                font-weight: 400;
                text-align: center;
                margin-top: 80px;
            }

            .classroom-menu h1 a {
                color: #c12c42;
                font-size: 16px;
            }

            .classroom-menu .accordion {
                width: 100%;
                max-width: 360px;
                margin: 30px auto 20px;
                background: #FFF;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
            }

            .classroom-menu .accordion .link {
                cursor: pointer;
                display: block;
                padding: 15px 15px 15px 42px;
                color: #4D4D4D;
                font-size: 14px;
                font-weight: 700;
                border-bottom: 1px solid #CCC;
                position: relative;
                -webkit-transition: all 0.4s ease;
                -o-transition: all 0.4s ease;
                transition: all 0.4s ease;
            }

            .classroom-menu .accordion li:last-child .link {
                border-bottom: 0;
            }

            .classroom-menu .accordion li i {
                position: absolute;
                top: 16px;
                left: 12px;
                font-size: 18px;
                color: #595959;
                -webkit-transition: all 0.4s ease;
                -o-transition: all 0.4s ease;
                transition: all 0.4s ease;
            }

            .classroom-menu .accordion li i.fa-chevron-down {
                right: 12px;
                left: auto;
                font-size: 16px;
            }

            .classroom-menu .accordion li.open .link {
                color: #b63b4d;
            }

            .classroom-menu .accordion li.open i {
                color: #b63b4d;
            }
            .classroom-menu .accordion li.open i.fa-chevron-down {
                -webkit-transform: rotate(180deg);
                -ms-transform: rotate(180deg);
                -o-transform: rotate(180deg);
                transform: rotate(180deg);
            }

            .classroom-menu .accordion li.default .classroom-menu .submenu {display: block;}
            /**
            * Submenu
            -----------------------------*/
            .classroom-menu .submenu {
                display: none;
                background: #444359;
                font-size: 14px;
            }

            .classroom-menu .submenu li {
                border-bottom: 1px solid #4b4a5e;
            }

            .classroom-menu .submenu a {
                display: block;
                text-decoration: none;
                color: #d9d9d9;
                padding: 12px;
                padding-left: 42px;
                -webkit-transition: all 0.25s ease;
                -o-transition: all 0.25s ease;
                transition: all 0.25s ease;
            }

            .classroom-menu .submenu a:hover {
                background: #b63b4d;
                color: #FFF;
            }

            /*Buuton*/
            .content-wrapper {
                margin: 0 auto;
                max-width: 100%;
            }
            .video-container {
                height: 0;
                max-width: 100%;
                overflow: hidden;
                padding-bottom: 56.25%;
                position: relative;
            }
            .video-container img {
                display: block;
            }
            .video-container iframe,
            .video-container object,
            .video-container embed,
            .video-container img {
                height: 100%;
                left: 0;
                position: absolute;
                top: 0;
                width: 100%;
            }

            .video-play-button {
                position: absolute;
                z-index: 10;
                top: 50%;
                left: 50%;
                -webkit-transform: translateX(-50%) translateY(-50%);
                        transform: translateX(-50%) translateY(-50%);
                box-sizing: content-box;
                display: block;
                width: 32px;
                height: 44px;
                /* background: #fa183d; */
                border-radius: 50%;
                padding: 18px 20px 18px 28px;
                }

                .video-play-button:before {
                content: "";
                position: absolute;
                z-index: 0;
                left: 50%;
                top: 50%;
                -webkit-transform: translateX(-50%) translateY(-50%);
                        transform: translateX(-50%) translateY(-50%);
                display: block;
                width: 80px;
                height: 80px;
                background: #ba1f24;
                border-radius: 50%;
                -webkit-animation: pulse-border 1500ms ease-out infinite;
                        animation: pulse-border 1500ms ease-out infinite;
                }

                .video-play-button:after {
                content: "";
                position: absolute;
                z-index: 1;
                left: 50%;
                top: 50%;
                -webkit-transform: translateX(-50%) translateY(-50%);
                        transform: translateX(-50%) translateY(-50%);
                display: block;
                width: 80px;
                height: 80px;
                background: #fa183d;
                border-radius: 50%;
                -webkit-transition: all 200ms;
                transition: all 200ms;
                }

                .video-play-button:hover:after {
                background-color: #da0528;
                }

                .video-play-button img {
                position: relative;
                z-index: 3;
                max-width: 100%;
                width: auto;
                height: auto;
                }

                .video-play-button span {
                display: block;
                position: relative;
                z-index: 3;
                width: 0;
                height: 0;
                border-left: 32px solid #fff;
                border-top: 22px solid transparent;
                border-bottom: 22px solid transparent;
                }

                @-webkit-keyframes pulse-border {
                0% {
                    -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                    opacity: 0;
                }
                }

                @keyframes pulse-border {
                0% {
                    -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                    opacity: 1;
                }
                100% {
                    -webkit-transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                            transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                    opacity: 0;
                }
                }
                .video-overlay {
                position: fixed;
                z-index: -1;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(0, 0, 0, 0.8);
                opacity: 0;
                -webkit-transition: all ease 500ms;
                transition: all ease 500ms;
                }

                .video-overlay.open {
                position: fixed;
                z-index: 1000;
                opacity: 1;
                }

                .video-overlay-close {
                position: absolute;
                z-index: 1000;
                top: 15px;
                right: 20px;
                font-size: 36px;
                line-height: 1;
                font-weight: 400;
                color: #fff;
                text-decoration: none;
                cursor: pointer;
                -webkit-transition: all 200ms;
                transition: all 200ms;
                }

                .video-overlay-close:hover {
                color: #fa183d;
                }

                .video-overlay iframe {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translateX(-50%) translateY(-50%);
                        transform: translateX(-50%) translateY(-50%);
                /* width: 90%; */
                /* height: auto; */
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.75);
                }

                /*toolstip*/
                .classroom-menu  .wrapper{
                    position: relative;
                }
                .classroom-menu .tooltip:hover span {
                    opacity: 1;
                    filter: alpha(opacity=100);
                    top: -6em;
                    left: 20em;
                    z-index: 99;
                    -webkit-transition: all 0.2s ease;
                    -moz-transition: all 0.2s ease;
                    -o-transition: all 0.2s ease;
                    transition: all 0.2s ease;
                    }

                    .classroom-menu .box b {
                    color: #fff;
                    }

                    .classroom-menu .tooltip span {
                        background: none repeat scroll 0 0 #222; /*-- some basic styling */
                        color: #F0B015;
                        font-family: 'Helvetica';
                        font-size: 0.8em;
                        font-weight: normal;
                        line-height: 1.5em;
                        padding: 16px 15px;
                        width: 240px;
                        top: -4em;  /*-- this is the original position of the tooltip when it's hidden */
                        left: 20em;
                        margin-left: 0;	
                        /*-- set opacity to 0 otherwise our animations won't work */
                        opacity: 0;
                        filter: alpha(opacity=0);  	
                        position: absolute;
                        text-align: center;	
                        z-index: 2;
                        text-transform: none;
                        -webkit-transition: all 0.3s ease;
                        -moz-transition: all 0.3s ease-in-out;
                        -o-transition: all 0.3s ease;
                        transition: all 0.3s ease-in-out;
                    }

                    .classroom-menu .tooltip span:after {
                        border-color: #222 rgba(0, 0, 0, 0);
                        border-style: solid;
                        border-width: 15px 15px 0;
                        bottom: -15px;
                        content: "";
                        display: block;
                        left: 31px;
                        position: absolute;
                        width: 0;
                    }

                
    </style>
@endsection

@section('content')

    <div class="bg-white">
        <div class="content-header p-0 m-0">
            <div class="container-fluid">
                <div class="jumbotron jumbotron-fluid bg-light m-0 p-3">
                    <div class="container-fluid">
                        <h1 class="display-4">{{ $data_course->name }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-content">
            <div class="row pt-5 pb-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div id="first_video" class="content-wrapper w-100">
                                <div class="video-container w-100">
                                    <img src="{{ asset('storage/courses/' . $data_course->image) }}" alt="" class="img-fluid">
                                    <a class="video-play-button" href="{{ $data_course->video }}" target="_blank"><span></span></a>
                                </div>
                            </div>

                            <video 
                                id="vid1"
                                class="video-js vjs-default-skin vjs-fluid"
                                controls width="640" height="264"
                            >
                            </video>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    @include('layouts.partials.sidebar-classes', ['courses' => $courses])
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

    {{-- <script src="https://player.vimeo.com/api/player.js"></script> --}}


    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            //$('[rel=tooltip]').tooltip();
        })
        $(function() {
            var Accordion = function(el, multiple) {
                this.el = el || {};
                this.multiple = multiple || false;

                // Variables privadas
                var links = this.el.find('.link');
                // Evento
                links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
            }

            Accordion.prototype.dropdown = function(e) {
                var $el = e.data.el;
                    $this = $(this),
                    $next = $this.next();

                $next.slideToggle();
                $this.parent().toggleClass('open');

                if (!e.data.multiple) {
                    $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
                };
            }	

            var accordion = new Accordion($('#accordion'), false);
        });
    </script>

    <script>
        /********* LOAD URL *********/
        /* VIDEOJS */
        // declare object for video
        let vgsPlayer, poster;

        let playButton = document.querySelector('.video-container a');
        playButton.addEventListener('click', playVideo);

        document.getElementById('vid1').style.display = "none";

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
        

        vgsPlayer = videojs('vid1', {
            techOrder: ["html5", "youtube", "vimeo"],
            autoplay: false,
            youtube: { "iv_load_policy": 3 },
        });

        vgsPlayer.poster('{{ asset('storage/courses/' . $data_course->image) }}');
        //vgsPlayer.poster("http://clips.vorwaerts-gmbh.de/big_buck_bunny.mp4")

        jQuery(function($) {
            $("#vsg-loadvideo").submit(function(e) {
                e.preventDefault();
                var vidURL = $("#vsg-vurl").val();
                vsgLoadVideo(vidURL);
            });
        });

        function vsgLoadVideo(vidURL, poster) {
            vgsPlayer.initChildren();
            if (ytVidId(vidURL) !== false) {
                ext = "youtube"
                //alert(getId(vidURL)) // Youtube video ID
                //var yvID = getId(vidURL);
                //vidURL = "https://www.youtube.com/watch?v="+yvID;
            } else if (vimeo_parser(vidURL) !== false){
                ext = "vimeo";
                vgsPlayer.options({
                    autoplay: true
                });
            } else {
                if (!ext)
                    ext = "mp4";
                var ext = vidURL.split('.').pop();
            }

            vgsPlayer.src({
                //"techOrder": ['youtube'],
                "type": "video/" + ext,
                "src": vidURL,
                
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

            if (vimeoName == false){
                return false;
            } else{
                var fetchVimeoNameArr = vimeoName.split('.');
                return fetchVimeoNameArr[0]; // return vimeo
            }
        }

        function getId(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }

        $('#vidlink a').on('click', function(e) {
            e.preventDefault();
            var vidlink = $(this).attr('href');
            vsgLoadVideo(vidlink);
            $('#vsg-vurl').val(vidlink);

            document.getElementById('vid1').style.display = "block";

            var node = document.getElementById("first_video");
            if (node != null) {
                if (node.parentNode) {
                    node.parentNode.removeChild(node);
                }
            }
        });
    </script>
@stop