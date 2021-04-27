@extends('layouts.frontend.psi')

@section('content')

    @include('layouts.frontend.menu', ['some' => 'data'])
    
    <div class="container-fluid pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- <video controls>
                    <source src="http://learn.shayhowe.com/assets/misc/courses/html-css/adding-media/earth.ogv" type="video/ogg">
                    <source src="http://learn.shayhowe.com/assets/misc/courses/html-css/adding-media/earth.mp4" type="video/mp4">
                    Please <a href="http://learn.shayhowe.com/assets/misc/courses/html-css/adding-media/earth.mp4" download>download</a> the video.
                </video> --}}

                {{-- <video width="320" height="240" 
                 poster="https://drive.google.com/uc?id=1HZxdPw9aHt_0glEWYiqVaWY99s3HL66h" controls controlslist="nodownload">
                    <source src="https://drive.google.com/uc?id=1KuqlIJfmNN6bQW7bYtPvZ3oOkW4mdJ-x" type="video/mp4">
                </video> --}}

                <video width="320" height="240" 
                 poster="https://raw.githubusercontent.com/morejust/store/master/images/bg01.jpg" controls controlslist="nodownload">
                    <source src="https://raw.githubusercontent.com/webfadba/fadbafiles/master/files/VESTIBULAR%2020.mp4" type="video/mp4">
                </video>

                <video controls="controls">
                    <source src="https://drive.google.com/uc?export=download&id=1KuqlIJfmNN6bQW7bYtPvZ3oOkW4mdJ-x" type='video/mp4'/>
                </video>


            </div>
        </div>
    </div>

    @include('frontend.partials.footer', ['some' => 'data'])
    
@endsection



