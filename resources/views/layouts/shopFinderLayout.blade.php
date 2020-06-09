
		<!DOCTYPE HTML>
		<html class="no-js" lang="en-gb">
		<head>
			<!-- ==========================
                    Meta Tags
                =========================== -->



			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- CSRF Token -->
			<meta name="csrf-token" content="{{ csrf_token() }}">
			<title>{{ config('app.name', 'ShopFinder') }}</title>


			<!-- Scripts -->
			{{-- <script src="{{ asset('js/lib/app.js') }}" defer></script> I REMOVED THE APP.JS FOR MY LAYOUT TO WORK WELL --}}

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->


			<!-- Fonts -->
			<link rel="dns-prefetch" href="//fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
			<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

			<!-- Styles -->
			{{-- <link href="{{ asset('css/lib/app.css') }}" rel="stylesheet"> I REMOVED THE APP.CSS FOR MY LAYOUT TO WORK WELL --}}
			<link href="{{ asset('css/lib/bootstrap.min.css') }}" rel="stylesheet">
			<link href="{{ asset('css/main.css') }}" rel="stylesheet">

			<!------------ pull in the awesome jQuery Blueimp image gallery plugin style sheet --------->
			<link href="{{ asset('css/lib/blueimp-gallery.min.css') }}" rel="stylesheet">




			<!--favicons-->
			<link rel="apple-touch-icon" sizes="57x57" href="images/apple-touch-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="images/apple-touch-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="images/apple-touch-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="images/apple-touch-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="images/apple-touch-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon-180x180.png">
			<link rel="icon" type="image/png" href="images/favicon-32x32.png" sizes="32x32">
			<link rel="icon" type="image/png" href="images/android-chrome-192x192.png" sizes="192x192">
			<link rel="icon" type="image/png" href="images/favicon-96x96.png" sizes="96x96">
			<link rel="icon" type="image/png" href="images/favicon-16x16.png" sizes="16x16">
			<link rel="manifest" href="images/manifest.json">
			<link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#5bbad5">
			<link rel="shortcut icon" href="images/favicon.ico">
			<meta name="msapplication-TileColor" content="#da532c">
			<meta name="msapplication-TileImage" content="images/mstile-144x144.png">
			<meta name="msapplication-config" content="images/browserconfig.xml">
			<meta name="theme-color" content="#ffffff">


			<!-- ==========================
                - START
            =========================== -->
			@include('layouts.html_dependencies_top')
			<!-- ==========================
                 - END
            =========================== -->

		</head>
		<body>

		<div style="margin-top: 8%;"></div>
		<!--THIS CODE IS PART OF THE 'page-plugin' WHICH WILL DISPLAY A LIKE BOX SO VISITORS CAN SEE THE NUMBER OF LIKES U HAVE, CAN LIKE/SHARE WITHOUT LEAVING YOUR SITE
		NOTE: ADJUSTING THE HEIGHT WILL AUTOMATICALLY MAKE IT A FB NEWS FEED WIDGET-->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>



		<!-- ==========================
            SCROLL TOP - START
        =========================== -->
		<div id="scrolltop" class="hidden-xs"><i class="fa fa-angle-up"></i></div>
		<!-- ==========================
            SCROLL TOP - END
        =========================== -->



			  <div id="page-wrapper"> <!-- PAGE - START -->
				  

				  <!-- ==========================
                      HEADER - START
                  =========================== -->
				  @include('layouts.header')
				  <!-- ==========================
                      HEADER - END
                  =========================== -->

				  <?php ##################### END OF HEADER ##################################### ?>


				  <?php
				//Come back and display your errors and notices here
				  /*if(!empty($this->exceptions)):
					  ?>
					  <div class="alert exceptions text-center" role="alert" style="margin-top: 10%;">
						  <?= $this->exceptions ?>
					  </div>
					  <?php
				  endif;
				  if(!empty($this->warnings)):
					  ?>
					  <div class="alert warnings text-center" role="alert" style="margin-top: 10%;">
						  <?= $this->warnings ?>
					  </div>
					  <?php
				  endif;
				  if(!empty($this->errors)):
					  ?>
					  <div class="alert danger text-center" role="alert" style="margin-top: 10%;">
						  <?= $this->errors ?>
					  </div>
					  <?php
				  endif;
				  if(!empty($this->notices)):
					  ?>
					  <div class="alert notices text-center" role="alert" style="margin-top: 10%;">
						  <?= $this->notices ?>
					  </div>
					  <?php
				  endif;
				  if(!empty($this->successes)):
					  ?>
					  <div class="alert success text-center" role="alert" style="margin-top: 10%;">
						  <?= $this->successes ?>
					  </div>
					  <?php
				  endif; */
				  ?>





				  <?php // THIS JUMBOTRON HOLDS THE SITE'S AWESOME SLIDER

				  ############# HEADER GOES HERE (WE CURRENTLY HAVE JUST 2 divs with classes 'slide-1' and 'slide-2' but u can add more divs for as many images as u want).
				  ################ NOTE THAT WE GET THE IMAGES IN THE BROWSER FOR THE SLIDE BY THE CSS 'background-image' SETTING FOR THE CLASSES 'slide-1', 'slide-2' etc in custom.css ################

				  if (config('settings.showImageSlider') == true) { ?>

					  <!-- ==========================
                          JUMBOTRON - START
                      =========================== -->
					  <section class="content jumbotron jumbotron-full-height">
						  <div id="homepage-2-carousel" class="nav-inside">

							  <div class="item slide-1">
								  <div class="slide-mask"></div>
								  <div class="slide-body">
									  <div class="container">
										  <h1>Welcome to <span class="color">E.T.H.I.M.</span></h1>
										  <h2>FAITH, ACTION AND SACRIFICE</h2>
										  <a href="index.php?page=newsController&action=showNewsToVisitors" class="btn btn-default btn-lg">Latest News</a>
										  <a data-toggle="modal" class="btn btn-inverse btn-lg" data-target="#newsletterModal">Subscribe to Our Newsletter</a>
									  </div>
								  </div>
							  </div>


							  <div class="item slide-2">
								  <div class="slide-mask"></div>
								  <div class="slide-body">
									  <div class="container">
										  <!--<h1 class="grey-background">Portfolio</h1>
										  <div><h2 class="color-background">Music, fashion coming soon...</h2></div>-->
										  <!--<ul class="list-unstyled">
                                              <li><i class="fa fa-check"></i>Reliable shipping</li>
                                              <li><i class="fa fa-check"></i>Amazing Customer Service</li>
                                              <li><i class="fa fa-check"></i>No Customs Or Duty Fees!</li>
                                          </ul>-->
									  </div>
								  </div>
							  </div>

							  <div class="item slide-3">
								  <div class="slide-mask"></div>
								  <div class="slide-body">
									  <div class="container">
										  <h1 class="grey-background">Gallery</h1>
										  <h2 class="color-background"><a href="index.php?page=galleryController">Come join us...</a></h2>
										  <!--<div><h2 class="color-background"><a href="index.php?page=galleryController">Come join us...</a></h2></div>-->
										  <!--<ul class="list-unstyled">
                                              <li><i class="fa fa-check"></i>Reliable shipping</li>
                                              <li><i class="fa fa-check"></i>Amazing Customer Service</li>
                                              <li><i class="fa fa-check"></i>No Customs Or Duty Fees!</li>
                                          </ul>-->
									  </div>
								  </div>
							  </div>


						  </div>
					  </section>
					  <!-- ==========================
                          JUMBOTRON - END
                      =========================== -->
				  <?php } ?>

				  


				  <?php /*<h1>WELCOME TO THE DEFAULT ALL IN ONE THEME</h1> */?>

				  <main class="py-4">
					  @yield('content')
				  </main>

				  <!-- ==========================
                      SERVICES - START
                  =========================== -->
				  <section class="content services services-3x border-top border-bottom">
					  <div class="container">
						  <div class="row row-no-padding">


							  <!-- SERVICE - START -->
							  <div class="col-xs-12 col-sm-4">
								  <div class="service">
									  <i class="fa fa-star"></i>
									  <h3>Our Signature Badge (motto)</h3>
									  <p>Reliable software engineering. We think these three words best describe us.</p>
								  </div>
							  </div>
							  <!-- SERVICE - END -->

							  <!-- SERVICE - START -->
							  <div class="col-xs-6 col-sm-4">
								  <div class="service">
									  <i class="fa fa-heart"></i>
									  <h3>What we are passionate about</h3>
									  <p>Obviously, good music, promoting talent and art. Fashion coming soon...</p>
								  </div>
							  </div>
							  <!-- SERVICE - END -->

							  <!-- SERVICE - START -->
							  <div class="col-xs-6 col-sm-4">
								  <div class="service">
									  <i class="fa fa-rocket"></i>
									  <h3>Where we go from here!</h3>
									  <p>The famous question comes to mind, 'where do you see yourself five years from now'. Hmmm, to that we will say, taking Afro beat further-to the next level if you like,
										  venturing into other genres, and producing hybrid music from various influences with Afro pop at the core, hip hop, fashion and modeling</p>
								  </div>
							  </div>
							  <!-- SERVICE - END -->

						  </div>

					  </div>
				  </section>
				  <!-- ==========================
                      SERVICES - END
                  =========================== -->






				<?php /*
				  <!-- ==========================
                      CATEGORIES - START
                  =========================== -->
				  <section class="content categories">
					  <div class="row row-no-padding">

						  <!-- CATEGORY - START -->
						  <div class="col-xs-4">
							  <div class="category">
								  <a href="products.phtml">
									  <img src="assets/images/categories/category-2.jpg" class="img-responsive" alt="">
									  <div class="category-mask"></div>
									  <h3 class="category-title">Clothes <span>Collection</span></h3>
								  </a>
							  </div>
						  </div>
						  <!-- CATEGORY - END -->

						  <!-- CATEGORY - START -->
						  <div class="col-xs-4">
							  <div class="category">
								  <a href="products.phtml">
									  <img src="assets/images/categories/category-3.jpg" class="img-responsive" alt="">
									  <div class="category-mask"></div>
									  <h3 class="category-title">Costume <span>Collection</span></h3>
								  </a>
							  </div>
						  </div>
						  <!-- CATEGORY - END -->

						  <!-- CATEGORY - START -->
						  <div class="col-xs-4">
							  <div class="category">
								  <a href="products.phtml">
									  <img src="assets/images/categories/category-4.jpg" class="img-responsive" alt="">
									  <div class="category-mask"></div>
									  <h3 class="category-title">Toys <span>Collection</span></h3>
								  </a>
							  </div>
						  </div>
						  <!-- CATEGORY - END -->

					  </div>

				  </section>
				  <!-- ==========================
                      CATEGORIES - END
                  =========================== -->






				  <!-- ==========================
                      GRID PRODUCTS - START
                  =========================== -->
				  <section class="content grid-products border-top">
					  <div class="container">
						  <div class="row">

							  <div class="col-xs-6 col-sm-3">
								  <article class="product-item">
									  <img src="assets/images/products/product-1.jpg" class="img-responsive" alt="">
									  <h3><a href="single-product.phtml">Sunny Tank Selected Femme</a></h3>
									  <div class="product-rating">
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
									  </div>
                        <span class="price">
                        	<del><span class="amount">£36.00</span></del>
                            <ins><span class="amount">£30.00</span></ins>
                        </span>
								  </article>
							  </div>

							  <div class="col-xs-6 col-sm-3">
								  <article class="product-item">
									  <img src="assets/images/products/product-2.jpg" class="img-responsive" alt="">
									  <h3><a href="single-product.phtml">Sunny Tank Selected Femme</a></h3>
									  <div class="product-rating">
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
										  <i class="fa fa-star"></i>
									  </div>
                        <span class="price">
                        	<del><span class="amount">£36.00</span></del>
                            <ins><span class="amount">£30.00</span></ins>
                        </span>
								  </article>
							  </div>

							  <div class="col-xs-12 col-sm-3">
								  <ul class="list-unstyled small-product">

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-1.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                                <del><span class="amount">£36.00</span></del>
                            	<ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-2.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                            	<del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                            	<del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                            	<del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

								  </ul>

							  </div>

							  <div class="col-xs-12 col-sm-3">
								  <ul class="list-unstyled small-product">

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-1.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                                <del><span class="amount">£36.00</span></del>
                            	<ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-2.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                            	<del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                            	<del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                            	<del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

								  </ul>

							  </div>
						  </div>
					  </div>
				  </section>
				  <!-- ==========================
                      GRID PRODUCTS - END
                  =========================== -->






				  <!-- ==========================
                      NOTIFICATION - START
                  =========================== -->
				  <section class="content pattern notification">
					  <div class="container">
						  <div class="row">
							  <div class="col-sm-4">
								  <span>The new amazing collection is here!</span>
								  <a href="#" class="btn btn-default btn-lg">Let's Go</a>
							  </div>
							  <div class="col-sm-8">
								  <h3>Summer Collection 2015</h3>
								  <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut feugiat mauris eget magna egestas porta. Vestibulum tortor quam, feugiat vitae, ultricies eget.</p>
							  </div>
						  </div>
					  </div>
				  </section>
				  <!-- ==========================
                     NOTIFICATION - END
                 =========================== -->






				  <!-- ==========================
                      RECENT BLOG POSTS - START
                  =========================== -->
				  <section class="content recent-blog-posts">
					  <div class="container">
						  <div class="section-title">
							  <h2>Latest from blog</h2>
							  <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
						  </div>
						  <div class="row">

							  <!-- BLOG POST - START -->
							  <div class="col-xs-6 col-sm-3">
								  <article class="post">
									  <img src="assets/images/blog/blog-1.jpg" class="img-responsive" alt="">
									  <h3><a href="single-post.phtml">How to pickup shoes</a></h3>
									  <span class="date">01/12/2015</span>
								  </article>
							  </div>
							  <!-- BLOG POST - END -->

							  <!-- BLOG POST - START -->
							  <div class="col-xs-6 col-sm-3">
								  <article class="post">
									  <img src="assets/images/blog/blog-2.jpg" class="img-responsive" alt="">
									  <h3><a href="single-post.phtml">Fine mens gloves</a></h3>
									  <span class="date">24/11/2015</span>
								  </article>
							  </div>
							  <!-- BLOG POST - END -->

							  <!-- BLOG POST - START -->
							  <div class="col-xs-6 col-sm-3">
								  <article class="post">
									  <img src="assets/images/blog/blog-3.jpg" class="img-responsive" alt="">
									  <h3><a href="single-post.phtml">Sunglasses for a beach</a></h3>
									  <span class="date">10/11/2015</span>
								  </article>
							  </div>
							  <!-- BLOG POST - END -->

							  <!-- BLOG POST - START -->
							  <div class="col-xs-6 col-sm-3">
								  <article class="post">
									  <img src="assets/images/blog/blog-4.jpg" class="img-responsive" alt="">
									  <h3><a href="single-post.phtml">Pyjamas for a good night</a></h3>
									  <span class="date">19/10/2015</span>
								  </article>
							  </div>
							  <!-- BLOG POST - END -->

						  </div>
					  </div>
				  </section>
				  <!-- ==========================
                     RECENT BLOG POSTS - END
                 =========================== -->
 				<?php
 				*/ ?>





				  <!-- ==========================
                      BRAND SLIDER - START
                  =========================== -->
				  <section class="content brands pattern border-top border-bottom">
					  <div class="container">
						  <div id="brands-carousel">
							  	<?php
							  	/////$portfolio = new portfolioController();
							  	/////$brandImages = $portfolio->handleBrandSlider();
							  	//echo '<pre>'; die(print_r($brandImages));
								//if there are images to display
								/*if ($brandImages) { //////////////////////////////////////// THIS WORKS ////////////////
									//if these images are sourced from the portfolio module
							  		if (in_array('portfolio', $brandImages))
							  		{
										foreach ($brandImages as $img) {
											if ($img != 'portfolio')
											{ ?>
												<div class="item"><a
														href="index.php?page=portfolioController&action=showSinglePortfolioItem&portfolioId=<?= $img['portfolio_id'] ?>"><img
															src="assets/images/gallery/<?= $img['albums_name'] ?>/<?= $img['images_filename'] ?>"
															class="img-responsive" alt=""></a></div>
											<?php
											}
										}
								  	}
									//if these images are sourced from the gallery module
									if (in_array('gallery', $brandImages))
									{
										foreach ($brandImages as $img) {
											if (is_array($img))
											{
												foreach ($img as $theImg)
												{ ?>
													<div class="item"><a
														href="<?=$this->settings->getFileRootPath()?>gallery/showGallery?album_id=<?= $brandImages[1] ?>"><img
															style="height:130px;width:140px;border-radius:5px;" src="<?=$this->settings->getFileRootPath()?>assets/images/gallery/brand_slider/<?= $theImg ?>"
															class="img-responsive" alt=""></a></div>
												<?php
												}
											}
										}
									}
							  	} *//////////////////////////////?>
							  <!--<div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/1.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/2.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/3.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/4.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/5.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/6.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/7.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/camerooncom.gif" class="img-responsive" alt=""></a></div>-->
						  </div>
					  </div>
				  </section>
				  <!-- ==========================
                      BRAND SLIDER - END
                  =========================== -->





				  <?php /*
				  <!-- ==========================
                      SMALL PRODUCTS - START
                  =========================== -->
				  <section class="content small-products">
					  <div class="container">
						  <div class="row">

							  <!-- COLUMN - START -->
							  <div class="col-sm-4">
								  <h2>On Sale Products</h2>
								  <ul class="list-unstyled small-product">

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-1.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
                            <span class="price">
                                <del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-2.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
                            <span class="price">
                                <del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
                            <span class="price">
                                <del><span class="amount">£36.00</span></del>
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

								  </ul>
							  </div>
							  <!-- COLUMN - END -->

							  <!-- COLUMN - START -->
							  <div class="col-sm-4">
								  <h2>Featured Products</h2>
								  <ul class="list-unstyled small-product">

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-1.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
                            <span class="price">
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-2.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
                            <span class="price">
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
                            <span class="price">
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

								  </ul>
							  </div>
							  <!-- COLUMN - END -->

							  <!-- COLUMN - START -->
							  <div class="col-sm-4">
								  <h2>Top Rated Products</h2>
								  <ul class="list-unstyled small-product">

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-1.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-2.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

									  <!-- PRODUCT - START -->
									  <li class="clearfix">
										  <a href="single-product.phtml">
											  <img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
											  <h3>Sunny Tank Selected Femme</h3>
										  </a>
										  <div class="product-rating">
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
											  <i class="fa fa-star"></i>
										  </div>
                            <span class="price">
                                <ins><span class="amount">£30.00</span></ins>
                            </span>
									  </li>
									  <!-- PRODUCT - END -->

								  </ul>
							  </div>
							  <!-- COLUMN - END -->

						  </div>
					  </div>
				  </section>
				  <!-- ==========================
                     SMALL PRODUCTS - END
                 =========================== -->
 				<?php
 				*/ ?>



				  <!-- ==========================
				  MODAL NEWSLETTER SUBSCRIBE - START
			  	=========================== -->
				  <div class="modal fade" role="dialog" id="newsletterModal" style="display:none;">
					  <div class="modal-dialog" style="background-color: #FFF; border-radius: 10px;">

						  <!-- Modal content-->
						  <div class="md-content">

							  <!-- Modal header-->
							  <div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h3 style="background-color: #28a4c9; color: #FFF;font-weight: bold;" class="modal-title text-center">Subscribe To Our Newsletter</h3>
							  </div>

							  <!-- Modal body -->
							  <div class="modal-body">
								  <div>
									  <p>Fill in the data appropriately:</p>
									  <form action="index.php?page=feedbackController&action=subscribe" method="post" id="subForm">

										  <input class="form-control" type="text" align="center" id="nl_name" name="nl_name" autocomplete="off" placeholder="Full name" />
										  <input class="form-control" type="email" align="center" id="nl_email" name="nl_email" placeholder="Email - e.g. info@example.com" autocomplete="off"/>


										  <input type="hidden" name="home2" value="home2"/>
										  <input type="submit" id="subBtn" class="btn btn-primary btn-sm" value="Subscribe"/>
									  </form>
								  </div>
							  </div>

							  <!-- Modal footer -->
							  <div class="modal-footer">
								  <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
							  </div>
						  </div>
					  </div>
				  </div>
				  <!-- ==========================
                      MODAL NEWSLETTER SUBSCRIBE - END
                  =========================== -->







				  <?php /*  ############################## END OF YOUR SITE MAIN CONTENT ######################################## ?>



			  



			  <div class="clearer"></div><!--THIS IS THE LAST <DIV> (THING) INSIDE THIS FLOATBG CONTAINER COZ IT KEEPS EVERYTHING ABOVE IT-->

				</article><!--END OF FLOATBG ARTICLE TAG--> */ ?>
		<?php /* </section><!--END OF MAINCONTENT THAT CONTAINS THE SIDEBAR, N THE FLOATBG--> */ ?>










		<section>
			<div class="well">
				<!-- ################### START OF INCLUDED PART OF FIRST FOOTER ###################### -->

				<!-- ==========================
                      FOOTER - START
                  =========================== -->
				@include('layouts.footer')
				<!-- ==========================
                    FOOTER - END
                =========================== -->

				 {{-- <div class="clearer" id="firstfooterdivclear"></div>  --}} <!--NOTE THAT THIS IS THE LAST DIV (THING) INSIDE well of THE first_footer-->
			</div><!--END OF THE WELL DIV INSIDE THE first_footer SECTION-->
		</section><!--End of first footer section-->




		</div> <!-- PAGE - END -->








		<!--#######################################  BLUE IMP GALLERY HTML CONTAINER  #######################################-->
		<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
			<!-- The container for the modal slides -->
			<div class="slides"></div>
			<!-- Controls for the borderless lightbox -->
			<h3 class="title"></h3>
			<a class="prev">‹</a>
			<a class="next">›</a>
			<a class="close">×</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
			<!-- The modal dialog, which will be used to wrap the lightbox content -->
			<div class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" aria-hidden="true">&times;</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body next"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								Previous
							</button>
							<button type="button" class="btn btn-primary next">
								Next
								<span class="glyphicon glyphicon-chevron-right"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--#######################################  END OF BLUE IMP GALLERY HTML CONTAINER  #######################################-->







		<?php /*  <article><!--HERE'S THE START OF THE SECOND FOOTER; IT'S ENCLOSED IN THIS PAIR OF <article></article> tags ided
						'footer'-->*/ ?>
			@include('layouts.html_dependencies_bottom')
			<?php /* 		<div class="clearer"></div><!--to make this empty div work n keep everything before it above it; that's why it's the last
							thing (div) inside the second-footer part of the website (enclosed in a pair of <article tags>. You also need 
							to make sure the footer element has no height rule-->
		</article>


		</section><!--END OF THE MAINWRAPPER N CONTAINER SECTION THAT CONTAINS EVERYTHING--> */ ?>



				<!-- Scripts -->
		<script src="{{ asset('js/lib/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTZea67jn4YSPIGu0dNTHRyB1jnvo1Q00" type="text/javascript"></script>
		<!--<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>--COMMENT THIS OUT AS IT IS MOANING ABOUT U HAVING REFERENCED THE GOOGLE API MULTIPLE TIMES WHICH IS NOT GOOD-->
		<script src="{{ asset('js/geolocation.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/general.js') }}" type="text/javascript"></script>

		<!-------------------------------- include the awesome jQuery Blueimp image gallery plugin --------------->
		<script src="{{ asset('js/lib/blueimp-gallery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/lib/bootstrap-image-gallery.min.js') }}" type="text/javascript"></script>


		@yield('rawJS')
		



		<?php /*
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

		<!--SCRIPTS FOR THE SLIDER-->

		<script src="js/sliderengine/jquery.js"></script>

		<script src="js/sliderengine/amazingslider.js"></script>

		<script src="js/sliderengine/initslider-1.js"></script>
 		*/ ?>


		<!--WE NEED TO PUT A SCRIPT HERE IN THE LAYOUT TO VALIDATE THE SUBSCRIPTION MODAL FORM,
		SINCE WE HAVE ALSO DECIDED TO PLACE THAT FORM HERE ON THE LAYOUT PAGE
                    SO IT CAN BE AVAILABLE ON ALL VIEW FILES-->
		<!--<script src="js/subscribe.js"></script>-->
		<script type="text/javascript">
			$(document).ready(function() {
				$(document).on('click', '#subBtn', function (e) {
					var errorMsg = "";
					var subForm = document.getElementById('subForm').value;
					var subName = document.getElementById('nl_name').value;
					var subEmail = document.getElementById('nl_email').value;

					if (subName.trim() == '') {
						errorMsg += "Please enter your name \n\n"
					}

					if (subEmail.trim() == '') {
						errorMsg += "Please enter your email address \n\n"
					}

					if (errorMsg == "")
					{
						subForm.submit();
					}
					else
					{
						alert(errorMsg);
					}


					e.preventDefault();
				});

			});
		</script>
		</body>
		</html>
