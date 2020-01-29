<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/img/logo-brando-61x61.png" class="brand-image elevation-3" style="opacity: .8" width="100%">
        <span class="brand-text font-weight-light"><strong>TRAINEE</strong></span>
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
                @role('super-admin')
                <li class="nav-item has-treeview {!! classActivePath(1,'dashboard') !!}">
                    <a href="{!! route('home') !!}" class="nav-link {!! classActiveSegment(1, 'dashboard') !!}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Painel
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="fas fa-user-tag"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>Permisos</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                  Usuários
                                  <i class="fa fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Todos os usuários</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.create') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Adicionar usuario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.show', Auth::id()) }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>Seu perfil</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    
                    </ul>
                </li>
                @endrole
                
                @role('super-admin|admin')
                <li class="nav-header">PAGES</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                          Páginas
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pages.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todas as páginas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pages.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar nova</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sections.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Seção</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>
                          Posts
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todos os posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('posts.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar novo</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Categorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Tags</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole

                @role('super-admin|admin|teacher')
                <li class="nav-header">SEÇÃO CURSOS ONLINE</li>

                <li class="nav-item">
                    <a href="{{ route('categories.courses') }}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Categorias</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                          Cursos
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('courses.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todos os cursos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('courses.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar novo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                          Modulos
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('modules.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todos os modulos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('modules.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar novo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                          Aulas
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('classrooms.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todas as aulas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('classrooms.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Nova aula</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                          Assignar aulas
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('assignments.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Lista de Aulas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('assignments.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar novo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">SEÇÕES INSCRIÇÕES</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Inscrições
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('inscriptions.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inscrições</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('inscriptions.paid') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Alunos</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">SEÇÃO INSTITUIÇÕES</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                          Universidade
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('universities.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todos as universidades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('universities.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar novo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                          Carreiras
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('careers.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todos os cursos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('careers.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar novo</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('periods.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Periodo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                          Trainee
                          <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trainees.index') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Todos os trainers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('trainees.create') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Adicionar novo</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole

                @role('super-admin')
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fas fa-circle-notch text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fas fa-circle-notch text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fas fa-circle-notch text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
                @endrole

                 @unlessrole('super-admin')
                <li class="nav-item">
                    <a href="{{ route('profiles.show', Auth::id()) }}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Seu perfil</p>
                    </a>
                </li>
                 @endrole

                @if (auth()->user()->name!=null)
                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fa fas fa-circle-notch text-danger"></i>
                            {{ __('Logout') }}
                            
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>