<?php  
namespace App\Helpers;

use App\Page;
use App\Post;

class MyHelper
{
	public function menuTest() 
	{ ?>
		<ul class="navbar-nav">
            <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown3</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Service</a></li>
        </ul>
	<?php
	}

	public static function MenuHeader(){
		$menuHeader = new Page();
		foreach ($menuHeader->where('parent_id', 0)->where('enabled', 1)->get() as $key => $menu) {
			$c1=$menuHeader->where('parent_id', $menu->id)->count();
			if ( $c1 == 0 ) {
				if($menu->redirect==1)	{	?>
			   		<li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase font-weight-bold" target="<?php echo $menu->target ?>" href="<?php echo $menu->external_url ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				} else { ?>
					<li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase font-weight-bold" target="<?php echo $menu->target ?>" href="<?php echo $menu->slug ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				}
			}else{ ?>
				<li class="dropdown">
					<a class="dropdown-toggle text-dark text-uppercase font-weight-bold" href="#" id="navbarDropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $menu->title ?><span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
					 	foreach($menuHeader->where('parent_id', $menu->id)->where('enabled', 1)->get() as $submenu){
				            $c2=$menuHeader->where('parent_id', $submenu->id)->where('enabled', 1)->count();
				            if ( $c2 == 0 ) {
				            	if($submenu->redirect==1){ ?>
									<li><a target="<?php echo $submenu->target ?>" href="<?= $submenu->redirect ?>" title="Ir a <?= $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}else{ ?>
									<li><a target="<?php echo $submenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>" title="Ir a <?= $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}
				            }else { ?>
				            	<li class="dropdown">
				            		<a class="dropdown-toggle text-dark text-uppercase font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $submenu->title ?></a>
				            		<ul class="dropdown-menu" role="navbarDropdown">
				            			<?php
					            		foreach($menuHeader->where('parent_id', $submenu->id)->where('enabled', 1)->get() as $treemenu){
					            			$c3=$menuHeader->where('parent_id', $treemenu->id)->where('enabled', 1)->count();
					            			if  ($c3 == 0 ) {
					            				if($treemenu->redireccionar==1){ ?>
					            					<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="<?= $treemenu->redirect ?>" title="Ir a <?= $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
					            					<?php
					            				}else{ ?>
					            					<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>/<?=$treemenu->slug ?>" title="Ir a <?= $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
					            					<?php
					            				}
					            			} else { ?>
					            				<li class="dropdown">
					            					<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $treemenu->title ?></a>
					            					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							            				<?php foreach ($menuHeader->where('parent_id', $treemenu->id)->where('enabled', 1)->get() as $fourMenu): 
							            					if($fourMenu->redireccionar==1){ ?>
								            					<li><a tabindex="-1" target="<?php echo $fourMenu->target ?>" href="<?= $fourMenu->redirect ?>" title="Ir a <?= $fourMenu->title ?>"><?php echo $fourMenu->title ?></a></li>
								            					<?php
								            				}else{ ?>
								            					<li><a tabindex="-1" target="<?php echo $fourMenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>/<?=$fourMenu->slug ?>" title="Ir a <?= $fourMenu->title ?>"><?php echo $fourMenu->title ?></a></li>
								            					<?php
								            				}
							            				endforeach ?>
					            					</ul>
					            				</li>
					            			<?php
					            			}
					            		}
					            		?>
				            		</ul>
				            	</li>
				            <?php
				            }
				        }
			        	?>
					</ul>
				</li>
			<?php
			}
		}
	}

	public static function destaque(){
	    $destaques = Post::where('status', 1)->get();
	        
	    foreach ($destaques as $key => $value) {
            if ($value->redirect == 1) { ?>
	            <div class="carousel-item  <?php echo ($key == 0) ? 'active' : '' ?>">
	            	<a target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>" title="<?php echo $value->title ?>"><img class="img-fluid" src="uploads/images/<?php echo $value->image ?>" alt="<?php echo $value->title ?>"></a>
	            	<a target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>" title="<?php echo $value->title ?>"><div class="carousel-caption hidden-xs">
	            		<p><?php echo $value->resumen ?></p>
	            	</div></a>
	            </div>
            <?php
            }else{ ?>
				<div class="carousel-item  <?php echo ($key == 0) ? 'active' : '' ?>">
	            	<a href="<?php echo '/destaque/'.$value->urlpath ?>" title=""><img class="img-fluid" src="uploads/images/<?php echo $value->image ?>" alt="<?php echo $value->title ?>"></a>
	            	<a href="<?php echo '/destaque/'.$value->urlpath ?>" title=""><div class="carousel-caption hidden-xs">
	            		<p><?php echo $value->resumen ?></p>
	            	</div></a>
	            </div>
            <?php
	        }
	    } 
	}

}
