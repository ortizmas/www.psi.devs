<div class="classroom-menu">
    <div class="card">
        <ul id="accordion" class="accordion">
            @if (isset($courses))
                @foreach ($courses as $key => $module)
                    @if ($module->classrooms->count() > 0)
                        <li>
                            <div class="link"><i class="fa fa-paint-brush"></i>{{ $module->name }}<i class="fa fa-chevron-down"></i></div>
                            <ul id="vidlink" class="submenu">
                                @foreach ($module->classrooms as $class)
                                        <li><a id="myLink" href="{{ $class->video }}">{{ $class->name }}</a></li>
                                        <input class="form-check-input" type="hidden" name="classroom_id[]" value="{{ $class->id }}" id="defaultCheck1">
                                        
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endif
            {{-- <li>
                <div class="link"><i class="fa fa-paint-brush"></i>Diseño web<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="#">Photoshop</a></li>
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">Maquetacion web</a></li>
                </ul>
            </li>
            <li class="default open">
                <div class="link"><i class="fa fa-code"></i>Desarrollo front-end<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="#">Javascript</a></li>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">Frameworks javascript</a></li>
                </ul>
            </li>
            <li>
                <div class="link"><i class="fa fa-mobile"></i>Diseño responsive<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="#">Tablets</a></li>
                    <li><a href="#">Dispositivos mobiles</a></li>
                    <li><a href="#">Medios de escritorio</a></li>
                    <li><a href="#">Otros dispositivos</a></li>
                </ul>
            </li>
            <li><div class="link"><i class="fa fa-globe"></i>Posicionamiento web<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                    <li><a href="#">Google</a></li>
                    <li><a href="#">Bing</a></li>
                    <li><a href="#">Yahoo</a></li>
                    <li><a href="#">Otros buscadores</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
	