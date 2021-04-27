<div class="classroom-menu">
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
                                    <li class="{{ request()->is('course/class/' . $class->slug . '/learn/11') ? 'bg-info' : '' }}">
                                        <span class="handle">
                                            <i class="fa fa-ellipsis-v"></i>
                                            <i class="fa fa-ellipsis-v"></i>
                                        </span>
                                        <input type="checkbox" value="" name="" {{ request()->is('course/class/' . $class->slug . '/learn/11') ? 'checked' : '' }}>
                                        <span class="text"><a id="myLink" class="pl-3"  href="{{ route('learn.play', ['url'=>$class->slug, 'id'=>$course_id]) }}"> {{ $class->name }}</a></span>
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
                                        <input type="checkbox" value="" name="" {{ request()->is('course/class/' . $class->slug . '/learn/11') ? 'checked' : '' }}>
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
</div>
