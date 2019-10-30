<?php  
namespace App\Helpers;

use App\Page;
use App\Post;

class MyHelper
{
	public static function menuTest() 
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

	public static function menuTestTwo() 
	{ 
		$page = Page::with('ds')
					->where('parent_id', 0)
					->where('enabled', 1)->orderBy('order', 'ASC')
					->select('id', 'parent_id', 'title', 'slug')
					->get(); ?>

		<?php foreach ($page as $key => $firstmenu): ?>
			
			<?php if ( count($firstmenu->ds) == 0): ?>
				<li class="active"><a class="text-dark text-uppercase" href="#"><?php echo $firstmenu->title ?></a></li>
			<?php else: ?>
				<li class="dropdown">
                	<a class="dropdown-toggle text-dark text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $firstmenu->title ?></a>
                	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                		<?php foreach ($firstmenu->ds as $key => $secondmenu): ?>
                			
                			<?php if ( count($secondmenu->ds) == 0): ?>
                				<li><a href="#"><?php echo $secondmenu->title ?></a></li>
                			<?php else: ?>
                				<li class="dropdown">
			                        <a class="dropdown-toggle text-dark text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $secondmenu->title ?></a>
			                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			                            <?php foreach ($secondmenu->ds as $key => $thirdmenu): ?>
				                			<?php if ( $thirdmenu->redirect == 1): ?>
				                				<li><a href="#"><?php echo $thirdmenu->title ?></a></li>
				                			<?php else: ?>
				                				<li><a href="#"><?php echo $thirdmenu->title ?></a></li>
				                			<?php endif ?>
				                		<?php endforeach ?>
			                        </ul>
			                    </li>
                			<?php endif ?>
                		<?php endforeach ?>
                	</ul>
                </li>
			<?php endif ?>
		<?php endforeach ?>

            <!-- <li class="active"><a class="text-dark text-uppercase" href="#">Home <span class="sr-only">(current)</span></a></li>
            <li><a class="text-dark text-uppercase js-scroll-trigger" href="#">Link</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle text-dark text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle text-dark text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2</a>
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
            <li><a class="text-dark text-uppercase" href="#">Service</a></li> -->
        
	<?php
	}

	public static function globalMenu()
	{
		$menuHeader = new Page();
		$page = Page::with('ds')->where('parent_id', 0)->where('enabled', 1)->orderBy('order', 'ASC')->get(['id', 'parent_id', 'title', 'slug']);

		return $page;
	}

	public static function MenuHeader(){
		$menuHeader = new Page();
		$menus = $menuHeader->where('parent_id', 0)->where('enabled', 1)->orderBy('order', 'ASC')->get(['id', 'parent_id', 'title', 'slug']);

		foreach ($menus as $key => $menu) {
			//$count_1 = $menuHeader->where('parent_id', $menu->id)->count();
			
			if ( count($menu->childs)== 0 ) {
				if($menu->redirect==1)	{	?>
			   		<li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase js-scroll-trigger" target="<?php echo $menu->target ?>" href="<?php echo $menu->external_url ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				} else { ?>
					<li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase" target="<?php echo $menu->target ?>" href="<?php echo $menu->slug ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				}
			}else{ ?>
				<li class="dropdown">
					<a class="text-dark text-uppercase" href="#" id="navbarDropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $menu->title ?> <i class="fas fa-angle-down pl-2" style="float: right;padding-top: 5px;"> </i></a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
					 	foreach($menuHeader->where('parent_id', $menu->id)->where('enabled', 1)->get() as $submenu){
					 		//$c2=$menuHeader->where('parent_id', $submenu->id)->where('enabled', 1)->count();
				            if ( count($submenu->childs) == 0 ) {
				            	if($submenu->redirect==1){ ?>
									<li><a target="<?php echo $submenu->target ?>" href="<?php echo $submenu->redirect ?>" title="Ir a <?php echo $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}else{ ?>
									<li><a target="<?php echo $submenu->target ?>" href="/<?php echo $menu->slug ?>/<?php echo $submenu->slug ?>" title="Ir a <?php echo $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}
				            }else { ?>
				            	<li class="dropdown">
				            		<a class="text-dark text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $submenu->title ?> <i class="fas fa-angle-down" style="float: right;padding-top: 8px;"> </i></a>
				            		<ul class="dropdown-menu" role="navbarDropdown">
				            			<?php
					            		foreach($menuHeader->where('parent_id', $submenu->id)->where('enabled', 1)->get() as $treemenu){
					            			//$c3=$menuHeader->where('parent_id', $treemenu->id)->where('enabled', 1)->count();
					            			if  (count($treemenu->childs) == 0 ) {
					            				if($treemenu->redireccionar==1){ ?>
					            					<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="<?php echo $treemenu->redirect ?>" title="Ir a <?php echo $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
					            					<?php
					            				}else{ ?>
					            					<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>/<?=$treemenu->slug ?>" title="Ir a <?php echo $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
					            					<?php
					            				}
					            			} else { ?>
					            				<li class="dropdown">
					            					<a class="" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $treemenu->title ?> <i class="fas fa-angle-down" style="float: right;padding-top: 8px;"> </i></a>
					            					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							            				<?php foreach ($menuHeader->where('parent_id', $treemenu->id)->where('enabled', 1)->get() as $fourMenu): 
							            					if($fourMenu->redireccionar==1){ ?>
								            					<li><a tabindex="-1" target="<?php echo $fourMenu->target ?>" href="<?php echo $fourMenu->redirect ?>" title="Ir a <?php echo $fourMenu->title ?>"><?php echo $fourMenu->title ?></a></li>
								            					<?php
								            				}else{ ?>
								            					<li><a tabindex="-1" target="<?php echo $fourMenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>/<?=$fourMenu->slug ?>" title="Ir a <?php echo $fourMenu->title ?>"><?php echo $fourMenu->title ?></a></li>
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

	public static function MenuHeaderOne(){
		$menuHeader = new Page();
		$menus = $menuHeader->with('ds')->where('parent_id', 0)->where('enabled', 1)->orderBy('order', 'ASC')->get(['id', 'parent_id', 'title', 'slug', 'enabled', 'redirect', 'external_url', 'target', 'order']);

		foreach ($menus as $key => $menu) {
			if ( count($menu->ds)== 0 ) {
				if($menu->redirect == 1)	{	?>
			   		<li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase js-scroll-trigger" target="<?php echo $menu->target ?>" href="<?php echo $menu->external_url ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				} else { ?>
					<li class="<?php echo ($key==0) ? 'active' : '' ?>"><a class="text-dark text-uppercase" target="<?php echo $menu->target ?>" href="<?php echo $menu->slug ?>" ><?php echo $menu->title ?><span class="sr-only"></span></a></li>
				<?php
				}
			}else{ ?>
				<li class="dropdown">
					<a href="#" id="navbarDropdown" class="dropdown-toggle text-dark text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $menu->title ?> <i class="fas fa-angle-down pl-2" style="float: right;padding-top: 5px;"> </i></a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php
					 	foreach($menu->ds as $submenu){
				            if ( count($submenu->ds) == 0 ) {
				            	if($submenu->redirect==1){ ?>
									<li><a target="<?php echo $submenu->target ?>" href="<?php echo $submenu->redirect ?>" title="Ir a <?php echo $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}else{ ?>
									<li><a target="<?php echo $submenu->target ?>" href="/<?php echo $menu->slug ?>/<?php echo $submenu->slug ?>" title="Ir a <?php echo $submenu->title ?>"><?php echo $submenu->title ?></a></li>
								<?php
								}
				            }else { ?>
				            	<li class="dropdown">
				            		<a class="text-dark text-uppercase" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $submenu->title ?> <i class="fas fa-angle-down" style="float: right;padding-top: 8px;"> </i></a>
				            		<ul class="dropdown-menu" role="navbarDropdown">
				            			<?php
					            		foreach($submenu->ds as $treemenu){
					            			//$c3=$menuHeader->where('parent_id', $treemenu->id)->where('enabled', 1)->count();
					            			if  (count($treemenu->ds) == 0 ) {
					            				if($treemenu->redireccionar==1){ ?>
					            					<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="<?php echo $treemenu->redirect ?>" title="Ir a <?php echo $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
					            					<?php
					            				}else{ ?>
					            					<li><a tabindex="-1" target="<?php echo $treemenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>/<?=$treemenu->slug ?>" title="Ir a <?php echo $treemenu->title ?>"><?php echo $treemenu->title ?></a></li>
					            					<?php
					            				}
					            			} else { ?>
					            				<li class="dropdown">
					            					<a class="" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $treemenu->title ?> <i class="fas fa-angle-down" style="float: right;padding-top: 8px;"> </i></a>
					            					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							            				<?php foreach ($treemenu->ds  as $fourMenu): 
							            					if($fourMenu->redireccionar==1){ ?>
								            					<li><a tabindex="-1" target="<?php echo $fourMenu->target ?>" href="<?php echo $fourMenu->redirect ?>" title="Ir a <?php echo $fourMenu->title ?>"><?php echo $fourMenu->title ?></a></li>
								            					<?php
								            				}else{ ?>
								            					<li><a tabindex="-1" target="<?php echo $fourMenu->target ?>" href="/<?=$menu->slug ?>/<?=$submenu->slug ?>/<?=$fourMenu->slug ?>" title="Ir a <?php echo $fourMenu->title ?>"><?php echo $fourMenu->title ?></a></li>
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
	    $destaques = Post::where('status', 1)->where('category_id', 2)->get();
	        
	    foreach ($destaques as $key => $value) {
            if ($value->redirect == 1) { ?>
	            <div class="carousel-item  <?php echo ($key == 0) ? 'active' : '' ?>">
	            	<a target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>" title="<?php echo $value->title ?>"><img class="img-fluid" src="uploads/images/<?php echo $value->image ?>" alt="<?php echo $value->title ?>"></a>
	            	<a target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>" title="<?php echo $value->title ?>"><div class="carousel-caption">
	            		<p><?php echo $value->description ?></p>
	            	</div></a>
	            </div>
            <?php
            }else{ ?>
				<div class="carousel-item  <?php echo ($key == 0) ? 'active' : '' ?>">
	            	<a href="<?php echo '/destaque/'.$value->slug ?>" title=""><img class="img-fluid" src="uploads/images/<?php echo $value->image ?>" alt="<?php echo $value->title ?>"></a>
	            	
	            	<div class="carousel-caption">
	            		<p><?php echo ($value->description != '') ? $value->description : '' ?></p>
	            		<a class="btn btn-psi btn-lg" href="<?php echo '/destaque/'.$value->slug ?>" title="<?php echo $value->title; ?>">Saiba mais</a>
	            	</div>
	            </div>
            <?php
	        }
	    } 
	}

	public static function treinamentosOne(){
        $trinamentos = Post::where('status', 1)->where('category_id', 3)->orderBy('order', 'ASC')->get();
	    foreach ($trinamentos as $key => $value) {
	        if ($value->redirect == 1) { ?>
	            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 pb-3">
	            	<div class="card h-100" style="max-width: 18rem;">
		            	<a class="img-card" target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>">
	                        <img class="card-img-top img-fluid" src="uploads/images/<?php echo $value->image	?>" alt="<?php echo $value->title ?>">
	                    </a>

	                    <div class="card-body">
                            <h4 class="card-title">
                                <a target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>"><?php echo $value->title ?></a>
                            </h4>
                            <!-- <p class="">
                                <?php //echo $value->description; ?>
                            </p> -->
                        </div>

                        <!-- <div class="card-read-more">
                            <a target="<?php //echo $value->target ?>" href="<?php //echo $value->external_url ?>"> class="btn btn-link btn-block">
                                Lêr mais
                            </a>
                        </div> -->
					</div>
					
				</div>
	        <?php
	        }else{ ?>
	            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 pb-3">
	            	<div class="card h-100" style="max-width: 26rem;">
	            		<a class="img-card" target="<?php echo $value->target ?>" href="<?php echo 'treinamento/'.$value->slug ?>">
	                        <img class="card-img-top img-fluid" src="uploads/images/<?php echo $value->image	?>" alt="<?php echo $value->title ?>">
	                    </a>

	                    <div class="card-body">
                            <h4 class="card-title text-center">
                                <a class="text-muted" target="<?php echo $value->target ?>" href="<?php echo 'treinamento/'.$value->slug ?>"><?php echo $value->title ?></a>
                            </h4>
                            <!-- <p class="card-text">
                                <?php //echo $value->description; ?>
                            </p> -->
                        </div>
	                    <!-- <div class="card-read-more">
                            <a target="<?php //echo $value->target ?>" href="<?php //echo 'treinamento/'.$value->slug ?>" class="btn btn-link btn-block">
                                Lêr mais
                            </a>
                        </div> -->
	            	</div>
				</div>

	        <?php
	        }
	    }
	}

	public static function treinamentosTwo(){
        $trinamentos = Post::where('status', 1)->where('category_id', 3)->orderBy('order', 'ASC')->limit(4)->get();
	    foreach ($trinamentos as $key => $value) {
	        if ($value->redirect == 1) { ?>
	            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 hover-mask">
	            	<a class="img-card" target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>">
                        <img class="img-fluid" src="uploads/images/<?php echo $value->image	?>" alt="<?php echo $value->title ?>">
                        <h2 class="text-white"><span class="fas fa-plus"></span></h2>
                    </a>
				</div>
	        <?php
	        }else{ ?>
	            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 hover-mask">
            		<a class="img-card" target="<?php echo $value->target ?>" href="<?php echo 'treinamento/'.$value->slug ?>">
                        <img class="img-fluid" src="uploads/images/<?php echo $value->image	?>" alt="<?php echo $value->title ?>">
                        <h2 class="text-white"><span class="fas fa-plus"></span></h2>
                    </a>
				</div>

	        <?php
	        }
	    }
	}

	public static function palestras(){
        $palestras = Post::where('status', 1)->where('category_id', 4)->get();
        if( $palestras->count() > 0 )
        {
        	foreach ($palestras as $key => $value) {
		        if ($value->redirect == 1) { ?>
		            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 pb-3">
						<div class="card">
		            		<div class="image">
		            			<img class="card-img-top img-fluid" src="uploads/images/<?php echo $value->image; ?>" alt="<?php echo $value->title ?>">
		            		</div>
		            		<div class="details">
		            			<div class="center">
		            				<a target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>"><h1><?php echo $value->title ?></h1></a>
		            				<p><?php echo $value->description; ?></p>
		            				<a class="btn btn-outline-blue btn-sm" target="<?php echo $value->target ?>" href="<?php echo $value->external_url ?>"><i class="fa fa-plus"> </i> INFO</a>
		            			</div>
		            		</div>
		            	</div>
					</div>
		        <?php
		        }else{ ?>
		            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 pb-3">
		            	<div class="card">
		            		<div class="image">
		            			<img class="card-img-top img-fluid" src="uploads/images/<?php echo $value->image; ?>" alt="<?php echo $value->title ?>">
		            		</div>
		            		<div class="details">
		            			<div class="center">
		            				<a target="<?php echo $value->target ?>" href="<?php echo 'palestra/'.$value->slug ?>"><h1><?php echo $value->title ?></h1></a>
		            				<p><?php echo $value->description; ?></p>
		            				<a class="btn btn-outline-blue btn-sm" target="<?php echo $value->target ?>" href="<?php echo 'palestra/'.$value->slug ?>"><i class="fa fa-plus"> </i> INFO</a>
		            			</div>
		            		</div>
		            	</div>
					</div>
		        <?php
		        }
		    }
        } else {
    		return false;
    	}
    }

}
