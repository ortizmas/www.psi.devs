 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>

    </ul>

    @if (auth()->user()->name!=null)
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-circle fa-2x mr-2"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('profiles.show', Auth::id()) }}">
                        <i class="nav-icon fa fas fa-user-o text-primary mr-2"></i>
                        Ver perfil
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fas fa-circle-notch text-danger mr-2"></i>
                        {{ __('Logout') }}
                        
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    @endif
</nav>