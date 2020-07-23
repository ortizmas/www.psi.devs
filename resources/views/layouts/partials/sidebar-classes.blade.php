<div class="classroom-menu">
    <div class="card">
        <ul id="accordion" class="accordion pl-0">
            @if (isset($courses))
                @foreach ($courses as $key => $module)
                    @if ($module->classrooms->count() > 0)
                        <li>
                            <div class="link"><i class="fa fa-file-video-o"></i>{{ $module->name }}<i class="fa fa-chevron-down"></i></div>
                            <ul class="submenu bg-primary pl-3">
                                @foreach ($module->classrooms as $class)
                                    @if ($class->description != null)
                                        <button href="#" class="btn btn-sm float-right mr-4" data-toggle="tooltip" data-html="true" title="<em>{{ $class->description }}</em>" style="box-shadow: none;">
                                            <i class="fa fa-question-circle text-white"></i>
                                        </button>
                                    @endif
                                    @if ($class->file == null)
                                        <li id="vidlink"><a id="myLink" class="pl-3"  href="{{ $class->video }}"> {{ $class->name  . $class->file}}</a></li>
                                        <input class="form-check-input" type="hidden" name="classroom_id[]" value="{{ $class->id }}" id="defaultCheck1">
                                    @else
                                        <li id="otherlink"><a target="_blank" class="pl-3"  href="{{ $class->file }}"> {{ $class->name }}</a></li>
                                        <input class="form-check-input" type="hidden" name="classroom_id[]" value="{{ $class->id }}" id="defaultCheck1">
                                    @endif
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
	