<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="/img/logo-brando-61x61.png" class="brand-image elevation-3" style="opacity: .8" width="100%">
        <span class="brand-text font-weight-light"><strong>TRAINEE 2020</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/profile.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <b class="text-wihte">Programa vencendo a dor crônica </b>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="cd-accordion cd-accordion--animated margin-top-lg margin-bottom-lg">
                <li class="cd-accordion__item cd-accordion__item--has-children">
                    <input class="cd-accordion__input" type="checkbox" name ="group-1" id="group-1">
                    <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="group-1">
                        <span>Área para exercícios globais</span>
                    </label>

                    <ul id="vidlink" class="cd-accordion__sub cd-accordion__sub--l1">

                       {{--  <li class="cd-accordion__item cd-accordion__item--has-children">
                          <input class="cd-accordion__input" type="checkbox" name ="sub-group-1" id="sub-group-1">
                          <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="sub-group-1"><span>Sub Group 1</span></label>

                          <ul class="cd-accordion__sub cd-accordion__sub--l2">
                            <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                            <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                            <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                          </ul>
                        </li>
                        
                        <li class="cd-accordion__item cd-accordion__item--has-children">
                          <input class="cd-accordion__input" type="checkbox" name ="sub-group-2" id="sub-group-2">
                          <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="sub-group-2"><span>Sub Group 2</span></label>

                          <ul class="cd-accordion__sub cd-accordion__sub--l2">
                            <li class="cd-accordion__item cd-accordion__item--has-children">
                              <input class="cd-accordion__input" type="checkbox" name ="sub-group-level-3" id="sub-group-level-3">
                              <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="sub-group-level-3"><span>Sub Group Level 3</span></label>

                              <ul class="cd-accordion__sub cd-accordion__sub--l3">
                                <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                                <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                              </ul>
                            </li>
                            <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                          </ul>
                        </li> --}}
                        <li class="cd-accordion__item"><a id="myLink" class="cd-accordion__label cd-accordion__label--icon-img" href="https://www.youtube.com/watch?v=kkGeOWYOFoA"><span>Exercícios de reajustes articulares</span></a></li>
                        <li class="cd-accordion__item"><a id="myLink" class="cd-accordion__label cd-accordion__label--icon-img" href="https://www.youtube.com/watch?v=Ie8olvmaZug"><span>Exercícios de alongamentos musculares </span></a></li>
                        <li class="cd-accordion__item"><a id="myLink" class="cd-accordion__label cd-accordion__label--icon-img" href="https://vimeo.com/378327608?autoplay=1"><span>Exercícios de fortalecimento muscular </span></a></li>
                    </ul>
                </li>

                <li class="cd-accordion__item cd-accordion__item--has-children">
                    <input class="cd-accordion__input" type="checkbox" name ="group-2" id="group-2">
                    <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="group-2"><span>Área para exercícios específicos</span></label>

                    <ul class="cd-accordion__sub cd-accordion__sub--l1">
                        <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                        <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                    </ul>
                </li>

                <li class="cd-accordion__item cd-accordion__item--has-children">
                    <input class="cd-accordion__input" type="checkbox" name ="group-3" id="group-3">
                    <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="group-3"><span>Área para colocar os bônus</span></label>

                    <ul class="cd-accordion__sub cd-accordion__sub--l1">
                        <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                        <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                    </ul>
                </li>

                <li class="cd-accordion__item cd-accordion__item--has-children">
                    <input class="cd-accordion__input" type="checkbox" name ="group-4" id="group-4">
                    <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="group-4"><span>Group 4</span></label>

                    <ul class="cd-accordion__sub cd-accordion__sub--l1">
                        <li class="cd-accordion__item cd-accordion__item--has-children">
                            <input class="cd-accordion__input" type="checkbox" name ="sub-group-3" id="sub-group-3">
                            <label class="cd-accordion__label cd-accordion__label--icon-folder pl-2 pr-2" for="sub-group-3"><span>Sub Group 3</span></label>

                            <ul class="cd-accordion__sub cd-accordion__sub--l2">
                                <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                                <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                            </ul>
                        </li>
                        <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                        <li class="cd-accordion__item"><a class="cd-accordion__label cd-accordion__label--icon-img" href="#0"><span>Image</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>