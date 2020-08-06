<div class="classroom-menu">
    {{-- <div class="card">
        <ul id="accordion" class="accordion pl-0">
            @if (isset($courses))
                @foreach ($courses as $key => $module)
                    @if ($module->classrooms->count() > 0)
                        <li class="{{ ($key == 0) ? 'open' : '' }}">
                            <div class="link"><i class="fa fa-file-video-o"></i>{{ $module->name }}<i class="fa fa-chevron-down"></i></div>
                            <ul class="submenu bg-primary pl-3">
                                @foreach ($module->classrooms as $class)
                                    @if ($class->description != null)
                                        <button href="#" class="btn btn-sm float-right mr-4" data-toggle="tooltip" data-html="true" title="<em>{{ $class->description }}</em>" style="box-shadow: none;">
                                            <i class="fa fa-question-circle text-white"></i>
                                        </button>
                                    @endif
                                    @if ($class->file == null)
                                        <li id="vidlink"><a id="myLink" class="pl-3"  href="{{ route('learn.play', ['url'=>$class->slug, 'id'=>$course_id]) }}"> {{ $class->name  . $class->file}}</a></li>
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
        </ul>
    </div> --}}

    @if (isset($courses))
        @foreach ($courses as $key => $module)
            @if ($module->classrooms->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-video mr-1"></i> {{ $module->name }}
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool p-1" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="todo-list">
                            @foreach ($module->classrooms as $class)
                                @if ($class->description != null)
                                    <button href="#" class="btn btn-sm float-right mr-4" data-toggle="tooltip" data-html="true" title="<em>{{ $class->description }}</em>" style="box-shadow: none;">
                                        <i class="fa fa-question-circle text-dark"></i>
                                    </button>
                                @endif
                                @if ($class->file == null)
                                    <li>
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text"><a id="myLink" class="pl-3"  href="{{ route('learn.play', ['url'=>$class->slug, 'id'=>$course_id]) }}"> {{ $class->name  . $class->file}}</a></span>
                                        {{-- <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 mins</small> --}}
                                        <div class="tools">
                                            <i class="fa fa-play-circle"></i>
                                            {{-- <i class="fa fa-trash-o"></i> --}}
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="" name="">
                                        <span class="text">
                                            <a target="_blank" class="pl-3"  href="{{ $class->file }}"> {{ $class->name }}</a>
                                        </span>
                                        {{-- <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 mins</small> --}}
                                        <div class="tools">
                                            <i class="fa fa-file-video-o"></i>
                                            {{-- <i class="fa fa-trash-o"></i> --}}
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    
    {{-- <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i> Meus cursos
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool p-1" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        
        <div class="card-body">
            <ul class="todo-list">
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Design a nice theme</span>
                  <small class="badge badge-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Make the theme responsive</span>
                  <small class="badge badge-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="badge badge-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="badge badge-success"><i class="fa fa-clock-o"></i> 3 days</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Check your messages and notifications</span>
                  <small class="badge badge-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <span class="handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                  </span>
                  <input type="checkbox" value="" name="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="badge badge-secondary"><i class="fa fa-clock-o"></i> 1 month</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
            </ul>
        </div>
        <div class="card-footer clearfix">
          <button type="button" class="btn btn-info float-right"><i class="fa fa-plus"></i> Add item</button>
        </div>
    </div> --}}
</div>
