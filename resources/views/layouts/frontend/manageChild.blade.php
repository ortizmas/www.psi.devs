@foreach (MyHelper::globalMenu() as $key => $menu)
    @if ($menu->redirect == 1)
        <li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase js-scroll-trigger" target="<?php echo $menu->target ?>" href="<?php echo $menu->external_url ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
    @else
        <li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase" target="<?php echo $menu->target ?>" href="<?php echo $menu->slug ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
    @endif
    
    @if(! empty($menu->ds))
        @include('layouts.frontend.manageChild', ['childs' => $menu->ds])
    @endif
@endforeach
<li class="dropdown">
	<a class="text-dark text-uppercase" href="#" id="navbarDropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $menu->title ?> <i class="fas fa-angle-down pl-2" style="float: right;padding-top: 5px;"> </i></a>
	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		@foreach($childs as $child)
			@if ($child->redirect == 1)
                <li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase js-scroll-trigger" target="<?php echo $child->target ?>" href="<?php echo $child->external_url ?>" ><?php echo $child->title ?><span class="sr-only"></span></a></li>
            @else
                <li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase" target="<?php echo $child->target ?>" href="<?php echo $child->slug ?>" ><?php echo $child->title ?><span class="sr-only"></span></a></li>
            @endif
			
			   
			@if(! empty($child->ds))
		        @include('layouts.frontend.manageChild',['childs' => $child->ds])
		    @endif
		@endforeach
	</ul>
</li>