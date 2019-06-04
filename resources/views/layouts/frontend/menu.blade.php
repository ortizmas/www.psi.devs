<div id="menu_area" class="menu-area">
    <div class="container-fluid">
        <div class="container-page">
            <div class="row align-items-center">
                <div class="col-md-3 bg-logo">
                    <a class="navbar-brand d-none d-md-block" href="{{ route('inicio') }}"><img src="{{ asset('site/images/logo/logo-2.jpg') }}" alt="Logo" class="img-fluid" width="100%"></a>
                </div>
                <div class="col-md-9 align-items-center">
                    <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                        {{-- <a class="navbar-brand d-none d-md-block" href="#"><img src="{{ asset('site/images/logo/logo-2.jpg') }}" alt="Logo" class="img-fluid" width="200"></a> --}}
                        <a class="navbar-brand" href="#"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li></li>
                            </ul>

                            <ul class="navbar-nav">
                                {{ MyHelper::MenuHeader() }}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>        
    </div>
</div>