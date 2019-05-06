@extends('layouts.frontend.app')

@section('styles')
	{{-- <style>
		body{
			background: #f3f3f3;  
		}

		.categories ul {
			list-style:none;
			padding:0;
			margin:0;
			margin-bottom:20px;
			text-align:center;

		}

		.categories ul li{
			display:inline-block;
			padding:0;
			line-height:24px;
			background:transparent;
			margin:0;
			margin-left:5px;
			margin-bottom:10px;
		}

		.categories ul li a{
			display:block;
			font-size:18px;
			font-weight:500;
			padding:10px 20px;
			border-radius:5px;
			border:2px solid transparent;
			-webkit-transition:all .2s ease-out;
			transition:all .2s ease-out;
		}

		.categories ul li a,
		.categories ul li a:active,
		.categories ul li a:hover{
			line-height:24px;
			background:#fff;
			color:#4E5961;
			text-decoration:none;
		}

		.categories ul li a:hover,
		.categories ul li.active a{
			color:#fff;
			background:#5cc9df;
		}

		.projects-container .row{
			-webkit-transition:height .5s ease-out;
			transition:height .5s ease-out;
		}

		.portfolio-item {
			position:relative;
			margin-bottom:30px;
			-webkit-transform:scale(1);
			transform:scale(1);
			opacity:1;
			-webkit-transition:all .4s ease-out;
			transition:all .4s ease-out;
		}

		.portfolio-item.filtered {
			-webkit-transform:scale(0.5);
			transform:scale(0.5);
			opacity:0.2;
			cursor:default;
		}

		.no-opacity .portfolio-item.filtered {
			display:none;
		}

		.portfolio-item.filtered a{
			cursor:default;
		}

		.portfolio-item.filtered .enlarge,
		.portfolio-item.filtered .link,
		.portfolio-item.filtered .overlay-mask,
		.portfolio-item.filtered .project-title{
			display:none;
		}

		.portfolio-thumb {
			display:block;
			position:relative;
			box-shadow:0 2px 5px rgba(0,0,0,0.08);
			overflow:hidden;
		}

		.scrollimation .portfolio-thumb {
			-webkit-transform:translateY(100px);
			transform:translateY(100px);
			opacity:0;
			-webkit-transition:opacity .4s ease-out, -webkit-transform .4s ease-out;
			transition:opacity .4s ease-out, transform .4s ease-out;
		}

		.touch .scrollimation .portfolio-thumb,
		.scrollimation .portfolio-thumb.in {
			-webkit-transform:translateY(0px);
			transform:translateY(0px);
			opacity:1;
		}

		.portfolio-thumb .overlay-mask{
			position:absolute;
			top:0;
			left:0;
			width:100%;
			height:100%;
			background:#5CC9DF;
			opacity:0;
			filter:alpha(opacity=0);
			z-index:1;
			-webkit-transition:opacity .3s ease-out;
			transition:opacity .3s ease-out;
		}


		.portfolio-thumb:hover .overlay-mask {
			opacity:0.8;
			filter:alpha(opacity=80);
		}

		.portfolio-thumb .enlarge,
		.portfolio-thumb .link{
			display:inline-block;
			margin:0;
			margin-top:-25px;
			font-size:50px;
			line-height:50px;
			color:#fff;
			opacity:0;
			filter:alpha(opacity=0);
			position:absolute;
			height:50px;
			width:64px;
			top:40%;
			left:50%;
			text-align:center;
			z-index:3;

		}

		.portfolio-thumb .enlarge{
			margin-left:-84px;
			-webkit-transform:translateX(-200px);
			transform:translateX(-200px);
			-webkit-transition:all .3s ease-out;
			transition:all .3s ease-out;
		}

		.portfolio-thumb:hover .enlarge{
			-webkit-transform:translateX(0);
			transform:translateX(0);
			opacity:1;
			filter:alpha(opacity=100);
			-webkit-transition:all .3s ease-out .3s;
			transition:all .3s ease-out .3s;
		}

		.portfolio-thumb .link{
			margin-left:20px;
			-webkit-transform:translateX(200px);
			transform:translateX(200px);
			-webkit-transition:all .3s ease-out;
			transition:all .3s ease-out;
		}

		.portfolio-thumb:hover .link{
			-webkit-transform:translate(0);
			transform:translate(0);
			opacity:1;
			filter:alpha(opacity=100);
			-webkit-transition:all .3s ease-out .6s;
			transition:all .3s ease-out .6s;
		}

		.portfolio-thumb .enlarge.centered,
		.portfolio-thumb .link.centered{
			margin-left:-32px;
			-webkit-transform:translateY(-200px);
			transform:translateY(-200px);
			-webkit-transition-delay:0s;
			transition-delay:0s;
		}

		.portfolio-thumb:hover .enlarge.centered,
		.portfolio-thumb:hover .link.centered{
			-webkit-transform:translateY(0);
			transform:translateY(0);
			-webkit-transition-delay:0.3s;
			transition-delay:0.3s;
		}

		.portfolio-thumb .project-title {
			display:block;
			width:100%;
			position:absolute;
			bottom:-100px;
			background:#fff;
			margin:0;
			padding:20px 0;
			font-size:21px;
			font-weight:300;
			color:#777;
			text-align:center;
			z-index:2;
			-webkit-transition:bottom .4s ease-out,color .2s ease-out;
			transition:bottom .4s ease-out,color .2s ease-out;
		}

		.portfolio-thumb:hover .project-title {
			bottom:0;
			-webkit-transition:bottom .3s ease-out .1s,color .2s ease-out 0s;
			transition:bottom .3s ease-out .1s,color .2s ease-out 0s;
		}

		.portfolio-thumb .project-title:hover {
			color:#5CC9DF;
		}  
	</style> --}}
@endsection
@section('content')
	{{-- <div class="container bootstrap snippet">
		<h1 class="text-center section-title">Our Portfolio</h1>
		<hr>
		<section id="portfolio" class="gray-bg padding-top-bottom">    
			<div class="container bootstrap snippet">
				<!--==== Portfolio Filters ====-->
				<div class="categories">
					<ul>
						<li class="active">
							<a href="#" data-filter="*">All Categories</a>
						</li>
						<li>
							<a href="#" data-filter=".web-design">Web Design</a>
						</li>
						<li>
							<a href="#" data-filter=".apps">Apps</a>
						</li>
						<li>
							<a href="#" data-filter=".psd">PSD</a>
						</li>
					</ul>
				</div>
				
				<!-- ======= Portfolio items ===-->
				<div class="projects-container scrollimation in">
					<div class="row">
						<article class="col-md-4 col-sm-6 portfolio-item web-design apps psd">
							<div class="portfolio-thumb in">
								<a href="#" class="main-link">
									<img class="img-responsive img-center" src="http://bootdey.com/img/Content/avatar/avatar7.png" alt="">
									<h2 class="project-title">Billing</h2>
									<span class="overlay-mask"></span>
								</a>
								<a class="enlarge cboxElement" href="#" title="Bills Project"><i class="fa fa-expand fa-fw"></i></a>
								<a class="link" href="#"><i class="fa fa-eye fa-fw"></i></a>
							</div>
						</article>

						<article class="col-md-4 col-sm-6 portfolio-item apps">
							<div class="portfolio-thumb in">
								<a href="#" class="main-link">
									<img class="img-responsive img-center" src="http://bootdey.com/img/Content/avatar/avatar5.png" alt="">
									<h2 class="project-title">Augmented Tourist</h2>
									<span class="overlay-mask"></span>
								</a>
								<a class="link centered" href=""><i class="fa fa-eye fa-fw"></i></a>
							</div>
						</article>
						
						<article class="col-md-4 col-sm-6 portfolio-item web-design psd">
							<div class="portfolio-thumb in">
								<a href="#" class="main-link">
									<img class="img-responsive img-center" src="http://bootdey.com/img/Content/avatar/avatar7.png" alt="">
									<h2 class="project-title">Get Colored</h2>
									<span class="overlay-mask"></span>
								</a>
								<a class="enlarge centered cboxElement" href="#" title="Get Colored"><i class="fa fa-expand fa-fw"></i></a>
							</div>
						</article>
						
						<article class="col-md-4 col-sm-6 portfolio-item apps">
							<div class="portfolio-thumb in">
								<a href="#" class="main-link">
									<img class="img-responsive img-center" src="http://bootdey.com/img/Content/avatar/avatar5.png" alt="">
									<h2 class="project-title">Holiday Selector</h2>
									<span class="overlay-mask"></span>
								</a>
								<a class="enlarge cboxElement" href="#" title="Holiday Selector"><i class="fa fa-expand fa-fw"></i></a>
								<a class="link" href="#"><i class="fa fa-eye fa-fw"></i></a>
							</div>
						</article>
						
						<article class="col-md-4 col-sm-6 portfolio-item web-design psd">
							<div class="portfolio-thumb in">
								<a href="#" class="main-link">
									<img class="img-responsive img-center" src="http://bootdey.com/img/Content/avatar/avatar7.png" alt="">
									<h2 class="project-title">Scavenger Hunt</h2>
									<span class="overlay-mask"></span>
								</a>
								<a class="enlarge cboxElement" href="#" title="Scavenger Hunt"><i class="fa fa-expand fa-fw"></i></a>
								<a class="link" href="#"><i class="fa fa-eye fa-fw"></i></a>
							</div>
						</article>
						
						<article class="col-md-4 col-sm-6 portfolio-item web-design apps">
							<div class="portfolio-thumb in">
								<a href="#" class="main-link">
									<img class="img-responsive img-center" src="http://bootdey.com/img/Content/avatar/avatar5.png" alt="">
									<h2 class="project-title">Sonor</h2>
									<span class="overlay-mask"></span>
								</a>
								<a class="enlarge cboxElement" href="#" title="Sonor"><i class="fa fa-expand fa-fw"></i></a>
								<a class="link" href="#"><i class="fa fa-eye fa-fw"></i></a>
							</div>
						</article>
					</div>
				</div>
			</div>	
		</section>
	</div>	 --}}

	<section class="featured-courses vertical-column courses-wrap">
        <div class="container">
            <div class="row mx-m-25">
                <div class="col-12 px-25">
                    <header class="heading flex flex-wrap justify-content-between align-items-center">
                        <h2 class="entry-title">Featured Courses</h2>

                        <nav class="courses-menu mt-3 mt-lg-0">
                            {{-- <ul class="flex flex-wrap justify-content-md-end align-items-center">
                                <li class="active"><a href="#" data-toggle="portfilter" data-target="all">All</a></li>
                                <li><a href="#" data-toggle="portfilter" data-target="business">Business</a></li>
                                <li><a href="#" data-toggle="portfilter" data-target="all">Design</a></li>
                                <li><a href="#" data-toggle="portfilter" data-target="all">Web Development</a></li>
                                <li><a href="#" data-toggle="portfilter" data-target="all">Photography</a></li>
                            </ul> --}}
			                <button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="all">
			                    All
			                </button>
			                <button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="business">
			                    Business
			                </button>
			                <button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="design">
			                    Design
			                </button>
			                <button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="web">
			                    Web Development
			                </button>
			                <button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="photography">
			                    Photography
			                </button>
                        </nav>
                    </header><!-- .heading -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="business">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/1.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Complete Android Developer Course</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="course-date">July 21, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $45 <span class="price-drop">$68</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="design">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/2.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Ultimate Drawing Course Beginner to Advanced</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Michelle Golden</a></div>

                                    <div class="course-date">Mar 14, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .price-drop -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="photography">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/3.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Complete Digital Marketing Course</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lucius</a></div>

                                    <div class="course-date">Dec 18, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $55 <span class="price-drop">$78</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="business">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/4.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">The Unreal Engine Developer Course</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Mr. John Wick</a></div>

                                    <div class="course-date">Otc 17, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="design">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/5.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Progressive Web Apps (PWA) - The Complete Guide</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Mr. Tom Redder</a></div>

                                    <div class="course-date">Sep 14, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $38 <span class="price-drop">$48</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="web">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/6.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Cryptocurrency Investment Course 2018</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Russell Stephens</a></div>

                                    <div class="course-date">Nov 06, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-4 px-25" data-tag="web">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="site/images/6.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="#">Cryptocurrency Investment Course 2018</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Russell Stephens</a></div>

                                    <div class="course-date">Nov 06, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->

                                <div class="course-ratings flex justify-content-end align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 px-25 flex justify-content-center pt-4">
                    {{-- <a class="btn" href="#">view all courses</a> --}}
                    <button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="all">
                    	view all courses
                    </button>
                </div><!-- .col -->
            </div>
        </div>
    </section>

    {{-- <div class="container">
    	<div class="row">
    		<div class="col-lg-12">
    			<h1 class="page-header">Lightweight 3 Columns Portfolio Filter for Bootstrap 3
    				<small>Secondary Text</small>
    			</h1>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-lg-12">
    			<div class="pull-right">
    				<button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="all">
    					All
    				</button>
    				<button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="icon">
    					Icon Design
    				</button>
    				<button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="identity">
    					Identity Design
    				</button>
    				<button class="btn btn-small btn-primary" data-toggle="portfilter" data-target="web">
    					Web Design
    				</button>
    			</div>
    		</div>
    	</div>
    	<br/>

    	<div class="row">
    		<div class="col-md-4" data-tag='web'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Web Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='icon'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Icon Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='identity'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Identity Design</h4>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-4" data-tag='web'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Web Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='icon'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Icon Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='identity'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Identity Design</h4>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-4" data-tag='web'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Web Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='icon'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Icon Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='identity'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Identity Design</h4>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-4" data-tag='web'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Web Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='icon'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Icon Design</h4>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-4" data-tag='identity'>
    			<div class="thumbnail">
    				<img alt="700x400" src="http://placehold.it/700x400"/>

    				<div class="caption">
    					<h4>Identity Design</h4>
    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="row text-center">
    		<div class="col-lg-12">
    			<ul class="pagination">
    				<li>
    					<a href="#">&laquo;</a>
    				</li>
    				<li class="active">
    					<a href="#">1</a>
    				</li>
    				<li>
    					<a href="#">2</a>
    				</li>
    				<li>
    					<a href="#">3</a>
    				</li>
    				<li>
    					<a href="#">4</a>
    				</li>
    				<li>
    					<a href="#">5</a>
    				</li>
    				<li>
    					<a href="#">&raquo;</a>
    				</li>
    			</ul>
    		</div>
    	</div>

    	<hr>

    	<footer>
    		<div class="row">
    			<div class="col-lg-12">
    				<p>Copyright &copy; Your Website 2016</p>
    			</div>
    		</div>
    	</footer>
    </div> --}}

@endsection

@section('scripts')
	{{-- <script>
		(function($){
			$('.categories a').click(function(e){
				$('.categories ul li').removeClass('active');
				$(this).parent('li').addClass('active');
				var itemSelected = $(this).attr('data-filter');
				$('.portfolio-item').each(function(){
					if (itemSelected == '*'){
						$(this).removeClass('filtered').removeClass('selected');
						return;
					} else if($(this).is(itemSelected)){
						$(this).removeClass('filtered').addClass('selected');
					} else{
						$(this).removeClass('selected').addClass('filtered');
					}
				});
			});
		})(jQuery);
	</script> --}}

	<script>
		! function(d) {
			var c = "portfilter";
			var b = function(e) {
				this.$element = d(e);
				this.stuff = d("[data-tag]");
				this.target = this.$element.data("target") || ""
			};
			b.prototype.filter = function(g) {
				var e = [],
				f = this.target;
				this.stuff.fadeOut("fast").promise().done(function() {
					d(this).each(function() {
						if (d(this).data("tag") == f || f == "all") {
							e.push(this)
						}
					});
					d(e).show()
				})
			};
			var a = d.fn[c];
			d.fn[c] = function(e) {
				return this.each(function() {
					var g = d(this),
					f = g.data(c);
					if (!f) {
						g.data(c, (f = new b(this)))
					}
					if (e == "filter") {
						f.filter()
					}
				})
			};
			d.fn[c].defaults = {};
			d.fn[c].Constructor = b;
			d.fn[c].noConflict = function() {
				d.fn[c] = a;
				return this
			};
			d(document).on("click.portfilter.data-api", "[data-toggle^=portfilter]", function(f) {
				d(this).portfilter("filter")
			})
		}(window.jQuery);
	</script>
@endsection