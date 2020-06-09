<?php

namespace layouts\admin;

/**
 * Description of BootstrapLayout
 *
 * @author Gustav
 */
class adminLayout extends \DGZ_library\DGZ_Layout {
	
	/**
	 * Overrides the default getMenuView to use the Reponsive (bootstrap) menu system
	 * @return string The name of the menu to use, in this case ResponsiveMenuView
	 */
	/*public function getMenuView() {
		return 'ResponsiveMenuView';
	}
	*/
	
	public function display() {
		//require_once('controllers/gen_access_timeout.inc.php');
		//include('controllers/title.inc.php');
		//include('controllers/config.inc.php');

	?>

		<!DOCTYPE HTML>
		<html class="no-js" lang="en-gb">
		<head>
			<!-- ==========================
                    Meta Tags
                =========================== -->
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="">
			<meta name="author" content="">
			<!--<meta name="viewport" content="width=device-width">-->
			<title><?php echo self::$appName."-".$this->pageTitle; ?></title>


			<?php /* <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.16.custom.css"/>

			<link href='http://fonts.googleapis.com/css?family=Lobster|Terminal+Dosis' rel='stylesheet' type='text/css'> */ ?>

			<link rel="icon" href="../../favicon.ico">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
			<link rel="stylesheet" href="css/normalize.min.css">
			<link href="css/superfish.css" rel="stylesheet" type="text/css" />
			<!-- Custom styles as defined by the application. These can override those set above -->
			 <?= $this->getCssHtml()  ?>


			<!-- ==========================
                - START
            =========================== -->
			<?php include('html_dependencies_top.inc.php'); ?>
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


				  <?php ############# HEADER GOES HERE (WE CURRENTLY HAVE JUST 2 divs with classes 'slide-1' and 'slide-2' but u can add more divs for as many images as u want) ############### ?>

				  <!-- ==========================
                      HEADER - START
                  =========================== -->
				  <?php include('admin_header.inc.php'); ?>
				  <!-- ==========================
                      HEADER - END
                  =========================== -->

				  <?php ##################### END OF HEADER ##################################### ?>



				  <?php

				  if(!empty($this->exceptions)):
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
				  endif;
				  ?>


				  <?php // THIS JUMBOTRON HOLDS THE SITE'S AWESOME SLIDER

				  if ($this->showImageSlider) { ?>
				  <!-- ==========================
                      JUMBOTRON - START
                  =========================== -->
				  <section class="content jumbotron jumbotron-full-height">
					  <div id="homepage-2-carousel" class="nav-inside">

						  <div class="item slide-1">
							  <div class="slide-mask"></div>
							  <div class="slide-body">
								  <div class="container">
									  <h1>Welcome to <span class="color">Sweeteaze</span></h1>
									  <h2>The home of online Lingerie</h2>
									  <a href="http://localhost/sweeteaze/products.phtml" class="btn btn-default btn-lg">Browse Catalog</a>
									  <a href="http://localhost/sweeteaze/contact.phtml" class="btn btn-inverse btn-lg">Contact us</a>
								  </div>
							  </div>
						  </div>
						  <div class="item slide-2">
							  <div class="slide-mask"></div>
							  <div class="slide-body">
								  <div class="container">
									  <h1 class="grey-background">Awesome Collections</h1>
									  <div><h2 class="color-background">Dresses, toys, more...</h2></div>
									  <ul class="list-unstyled">
										  <li><i class="fa fa-check"></i>Reliable shipping</li>
										  <li><i class="fa fa-check"></i>Amazing Customer Service</li>
										  <li><i class="fa fa-check"></i>No Customs Or Duty Fees!</li>
									  </ul>
								  </div>
							  </div>
						  </div>

					  </div>
				  </section>
				  <!-- ==========================
                      JUMBOTRON - END
                  =========================== -->
 				<?php } ?>




				   <!--<h1>WELCOME TO THE ADMIN LAYOUT</h1>-->

				  <?php echo $this->content;  ?>





				  <?php
				  /*
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
									  <h3>RELIABLE AND DISCREET SHIPPING</h3>
									  <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
								  </div>
							  </div>
							  <!-- SERVICE - END -->

							  <!-- SERVICE - START -->
							  <div class="col-xs-6 col-sm-4">
								  <div class="service">
									  <i class="fa fa-heart"></i>
									  <h3>AMAZING CUSTOMER SERVICE</h3>
									  <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
								  </div>
							  </div>
							  <!-- SERVICE - END -->

							  <!-- SERVICE - START -->
							  <div class="col-xs-6 col-sm-4">
								  <div class="service">
									  <i class="fa fa-rocket"></i>
									  <h3>NO CUSTOMS OR DUTY FEES!</h3>
									  <p>Ut feugiat mauris eget magna egestas porta. Curabitur sagittis sagittis neque rutrum congue.</p>
								  </div>
							  </div>
							  <!-- SERVICE - END -->

						  </div>

					  </div>
				  </section>
				  <!-- ==========================
                      SERVICES - END
                  =========================== -->


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

				  <!-- ==========================
                      BRANDS - START
                  =========================== -->
				  <section class="content brands pattern border-top border-bottom">
					  <div class="container">
						  <div id="brands-carousel">
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/1.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/2.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/3.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/4.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/5.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/6.png" class="img-responsive" alt=""></a></div>
							  <div class="item"><a href="lookbook.phtml"><img src="assets/images/clients/7.png" class="img-responsive" alt=""></a></div>
						  </div>
					  </div>
				  </section>
				  <!-- ==========================
                      BRANDS - END
                  =========================== -->

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
				*/ ?>





				  <?php  ############################## END OF YOUR SITE MAIN CONTENT ########################################	?>










		<section>
			<div class="well">
				<?php ################### START OF INCLUDED PART OF FIRST FOOTER ######################?>

				<!-- ==========================
                      FOOTER - START
                  =========================== -->
				<?php include('admin_footer.inc.php');  //include the 1st footer here ################### END OF INCLUDED PART OF FIRST FOOTER ###################### ?>
				<!-- ==========================
                    FOOTER - END
                =========================== -->

				<?php /*<div class="clearer" id="firstfooterdivclear"></div> */ ?><!--NOTE THAT THIS IS THE LAST DIV (THING) INSIDE well of THE first_footer-->
			</div><!--END OF THE WELL DIV INSIDE THE first_footer SECTION-->
		</section><!--End of first footer section-->




		</div> <!-- PAGE - END -->


		<?php include('html_dependencies_bottom.inc.php');  ?>


		<!-- Include scripts required by Bootstrap -->
		<?= $this->getJavascriptHtml() ?>

		</body>
		</html>







		<?php

	}

	
}
