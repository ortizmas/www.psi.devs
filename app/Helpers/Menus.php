<?php  
namespace App\Helpers;

use App\Page;

class Menus
{
	public static function globalMenu($value='')
	{
		$pages = Page::get();
		foreach ($pages as $value) {
			
		}
		return $pages;
	}

	public static function MenuHeader(){
		$menuHeader = Page::where('parent_id', 0)->where('enabled', 1)->get();
		foreach ($menuHeader as $key => $menu) {
			$c1=$menuHeader->where('parent_id', $menu->id)->count();
			if ($c1==0) {
				if($menu->redirect==1)	{	?>
			   		<li class="nav-link <?php echo ($key==0) ? '' : '' ?>"><a class="nav-link text-dark text-uppercase font-weight-bold" target="<?php echo $menu->target ?>" href="<?php echo $menu->external_url ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				} else { ?>
					<li class="nav-link  <?php echo ($key==0) ? '' : '' ?>"><a class="nav-link text-dark text-uppercase font-weight-bold" target="<?php echo $menu->target ?>" href="<?php echo $menu->slug ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				}
			}else{ ?>
				<li class="nav-link dropdown">
					<a class="nav-link text-dark text-uppercase font-weight-bold" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $menu->title ?><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php
					 	foreach($menuHeader->where('parent_id', $menu->id)->where('enabled', 1)->get() as $submenu){
				            $c2=$menuHeader->where('parent_id', $submenu->id)->where('enabled', 1)->count();
				            if ($c2==0) {
				            	if($submenu->redirect==1){ ?>
									<li class="dropdown-item"><a target="<?php echo $submenu->target ?>" href="<?= $submenu->redirect ?>" title="Ir a <?= $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}else{ ?>
									<li class="dropdown-item"><a target="<?php echo $submenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>" title="Ir a <?= $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}
				            }else { ?>
				            	<li class="dropdown-submenu">
				            		<a tabindex="0" class="dropdown-toggle"  data-toggle="dropdown" href="#"><?php echo $submenu->title ?></a>
				            		<ul class="dropdown-menu" role="menu">
				            			<?php
					            		foreach($menuHeader->where('parent_id', $submenu->id)->where('enabled', 1)->get() as $treemenu){
					            			if($treemenu->redireccionar==1){ ?>
												<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="<?= $treemenu->redirect ?>" title="Ir a <?= $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
											<?php
											}else{ ?>
												<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>/<?=$treemenu->slug ?>" title="Ir a <?= $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
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

}

?>