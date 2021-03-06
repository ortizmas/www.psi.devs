<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/img/logo-brando-61x61.png" class="brand-image elevation-3" style="opacity: .8" width="100%">
        <span class="brand-text font-weight-light"><strong>Pró Saúde Integral</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{auth()->user()->name!=null ? auth()->user()->name : "Administrator"}} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('my.courses') }}" class="nav-link">
                        <i class="fa fa-book nav-icon"></i>
                        <p>Meus cursos</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.annotations', $data_course->id) }}" class="nav-link">
                        <i class="fa fa-edit nav-icon"></i>
                        <p>Anotações</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('student.pdf', $data_course->id) }}" class="nav-link">
                        <i class="fa fa-edit nav-icon"></i>
                        <p>Exportar anotações</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>