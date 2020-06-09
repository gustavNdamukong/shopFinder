<!--<div class="top-header hidden-xs hidden">
    	<div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <ul class="list-inline contacts">
                        <li><i class="fa fa-envelope"></i> help@sweeteaze.com</li>
                        <li><i class="fa fa-phone"></i> 754 213 456</li>
                    </ul>
                </div>
                <div class="col-sm-7 text-right">
                    <ul class="list-inline links">
                        <li><a href="my-account.phtml">My account</a></li>
                        <li><a href="checkout.phtml">Checkout</a></li>
                        <li><a href="wishlist.phtml">Wishlist (5)</a></li>
                        <li><a href="compare.phtml">Compare (3)</a></li>
                        <li><a href="signin.phtml">Logout</a></li>
                    </ul>
                    <ul class="list-inline languages hidden-sm">
                    	<li><a href="#"><img src="assets/images/flags/cz.png" alt="cs_CZ"></a></li>
                        <li><a href="#"><img src="assets/images/flags/us.png" alt="en_US"></a></li>
                        <li><a href="#"><img src="assets/images/flags/de.png" alt="de_DE"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>-->

    <header class="navbar navbar-transparent navbar-fixed-top">
    	<div class="container">
            <div class="navbar-header">
                <!--<a href="index.php?page=homeController&action=home" class="navbar-brand"><span>Code</span>Soulja</a>-->
                <a href="index.php?page=homeController&action=home" class="navbar-brand"><img width="100" height="100" src="{{ asset('images/logo.png') }}" class="img-responsive center-block" alt="Code Soulja Logo" /></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse">
            	<p class="navbar-text hidden-xs hidden-sm">End Time Harvester International Ministries (E.T.H.I.M.)</p>


                <!----NAV BAR STARTS HERE --->
            	<ul class="nav navbar-nav navbar-right">
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Home</a>
                      	<ul class="dropdown-menu">
                        	<li><a href="index.php">Homepage 1</a></li>
                            <li><a href="homepage-2.phtml">Homepage 2</a></li>
                            <li><a href="homepage-3.phtml">Homepage 3<span class="label label-warning pull-right">Updated</span></a></li>
                            <li><a href="homepage-4.phtml">Homepage 4</a></li>
                            <li><a href="homepage-5.phtml">Homepage 5<span class="label label-danger pull-right">New</span></a></li>
                            <li><a href="homepage-6.phtml">Homepage 6<span class="label label-danger pull-right">New</span></a></li>
                      	</ul>
                    </li>-->

                    <li class="dropdown megamenu">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Go To Menu</a>
                      	<ul class="dropdown-menu">
                            <li class="col-sm-4 col-md-3">
                            	<ul class="list-unstyled">
                                	<li class="title">Who Are We <span class="label label-danger pull-right">HOT</span></li>
                                    <li><a href="index.php?page=homeController&action=home">Home</a></li>
                                    <li><a href="index.php?page=aboutUsController&action=aboutUs">About Us</a></li>
                                    <li><a href="index.php?page=departmentController&action=departments">Departments</a></li>
                                    <!--<li><a href="products.phtml">Caps and Hats</a></li>
                                    <li><a href="products.phtml">Ties</a></li>
                                    <li><a href="products.phtml">Scarves</a></li>
                                    <li><a href="products.phtml">Shirts</a></li>
                                    <li><a href="products.phtml">Jeans</a></li>-->
                                </ul>
                            </li>
                            <li class="col-sm-4 col-md-3">
                            	<ul class="list-unstyled">
                                	<li class="title">Our Work <span class="label label-info pull-right">Privacy Policy</span></li>
                                    <li><a href="index.php?page=newsController&action=showNewsToVisitors">News</a></li>
                                    <li><a href="{{ asset('images/gallery/showGallery') }}">Image Gallery</a></li>
                                    <li><a href="index.php?page=videoController&action=showVideosToVisitors">Videos</a></li>
                                    <!--<li><a href="index.php?page=audioController&action=showAudiosToVisitors">Music</a></li>
                                    <li><a href="index.php?page=portfolioController&action=showPortfolioToVisitors">Portfolio</a></li>-->
                                </ul>
                            </li>
                            <li class="col-sm-4 col-md-3">
                            	<ul class="list-unstyled">
                                	<li class="title">Feedback</li>
                                    <!--<li><a href="index.php?page=feedbackController&action=subscribe">Subscribe to Our Newsletter</a></li>-->
                                    <li><a href="" data-toggle="modal" data-target="#newsletterModal">Subscribe to Our Newsletter</a></li>
                                    <li><a href="index.php?page=feedbackController&action=contactUs">Contact Us</a></li>
                                    <!--<li><a href="index.php?page=blogController&action=showBlog">Blog</a></li>
                                    <li><a href="index.php?page=HomeController&action=showFAQ">FAQ</a></li>-->
                                    <?php
                                    if (!isset($_SESSION['authenticated'])) {
                                        //only show the log in link if the user is not currently logged in ?>
                                        <li><a href="index.php?page=adminController">Admin Login</a></li>
                                    <?php
                                    }
                                    else
                                    {
                                        //show a logout button if the user is logged in ?>
                                        <li><a href="index.php?page=adminController&action=logout">Logout</a></li>
                                        <li><a href="index.php?page=adminController&action=adminHome">Admin Dashboard</a></li>
                                    <?php
                                    } ?>
                                </ul>
                            </li>
                            <li class="hidden-xs hidden-sm col-md-3">
                            	<img width="948" height="632" src="{{ asset('images/logo.png') }}" class="img-responsive center-block" alt="ETHIM Banner">
                            </li>
                      	</ul>
                    </li>

                    <!--<li class="dropdown megamenu">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Pages</a>
                      	<ul class="dropdown-menu">
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                	<li class="title">Eshop</li>
                                    <li><a href="products.phtml">Products</a></li>
                                    <li><a href="cart.phtml">Cart</a></li>
                                    <li><a href="checkout.phtml">Checkout</a></li>
                                    <li><a href="compare.phtml">Compare</a></li>
                                    <li><a href="single-product.phtml">One Product</a></li>
                                    <li><a href="stores.phtml">Stores</a></li>
                                    <li><a href="about-shop.phtml">About Shop</a></li>
                                    <li><a href="lookbook.phtml">Lookbook</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                	<li class="title">Account</li>
                                    <li><a href="my-account.phtml">My Account<span class="label label-warning pull-right">Updated</span></a></li>
                                    <li><a href="profile.phtml">Profile</a></li>
                                    <li><a href="orders.phtml">Ordres</a></li>
                                    <li><a href="wishlist.phtml">Wishlist</a></li>
                                    <li><a href="address.phtml">Address</a></li>
                                    <li><a href="warranty-claims.phtml">Warranty Claims<span class="label label-danger pull-right">New</span></a></li>
                                    <li><a href="signup.phtml">Sign Up</a></li>
                                    <li><a href="signin.phtml">Sign In</a></li>
                                    <li><a href="lost-password.phtml">Lost Password</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                	<li class="title">Other Pages</li>
                                    <li><a href="blog.phtml">Blog</a></li>
                                    <li><a href="single-post.phtml">One Blog Post</a></li>
                                    <li><a href="single-order.phtml">Order Detail</a></li>
                                    <li><a href="downloads.phtml">Downloads<span class="label label-danger pull-right">New</span></a></li>
                                    <li><a href="faq.phtml">FAQ</a></li>
                                    <li><a href="privacy-policy.phtml">Privacy Policy</a></li>
                                    <li><a href="terms-conditions.hptml">Terms & Conditions</a></li>
                                    <li><a href="404.phtml">404 Error</a></li>
                                    <li><a href="email-template.phtml" target="_blank">Email Template</a></li>
                                </ul>
                            </li>
                      	</ul>
                    </li>-->

                    <!--<li class="dropdown megamenu">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Components<span class="label label-danger pull-right">New</span></a>
                      	<ul class="dropdown-menu">
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                    <li><a href="components.html#headings">Headings</a></li>
                                    <li><a href="components.html#paragraphs">Paragraphs</a></li>
                                    <li><a href="components.html#lists">Lists</a></li>
                                    <li><a href="components.html#tabs">Tabs</a></li>
                                    <li><a href="components.html#accordition">Accordition</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                    <li><a href="components.html#collapse">Collapse</a></li>
                                    <li><a href="components.html#buttons">Buttons</a></li>
                                    <li><a href="components.html#tables">Tables</a></li>
                                    <li><a href="components.html#grids">Grids</a></li>
                                    <li><a href="components.html#responsive-video-audio">Responsive Video &amp; Audio</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                    <li><a href="components.html#alerts">Alerts</a></li>
                                    <li><a href="components.html#forms">Forms</a></li>
                                    <li><a href="components.html#labels">Labels</a></li>
                                    <li><a href="components.html#paginations">Paginations</a></li>
                                    <li><a href="components.html#carousels">Carousels</a></li>
                                </ul>
                            </li>
                      	</ul>
                    </li>-->

                    <?php /*
                    <li class="dropdown navbar-cart hidden-xs">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true"><i class="fa fa-shopping-cart"></i></a>
                      	<ul class="dropdown-menu">
                        	
                            <!-- CART ITEM - START -->
                            <li>
                            	<div class="row">
                                	<div class="col-sm-3">
                                    	<img src="assets/images/products/product-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                    	<h4><a href="single-product.phtml">Fusce Aliquam</a></h4>
                                        <p>1x - $20.00</p>
                                    	<a href="#" class="remove"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </div>
                            </li>
                            <!-- CART ITEM - END -->
                            
                            <!-- CART ITEM - START -->
                            <li>
                            	<div class="row">
                                	<div class="col-sm-3">
                                    	<img src="assets/images/products/product-2.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                    	<h4><a href="single-product.phtml">Fusce Aliquam</a></h4>
                                        <p>1x - $20.00</p>
                                    	<a href="#" class="remove"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </div>
                            </li>
                            <!-- CART ITEM - END -->
                            
                            <!-- CART ITEM - START -->
                            <li>
                            	<div class="row">
                                	<div class="col-sm-3">
                                    	<img src="assets/images/products/product-3.jpg" class="img-responsive" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                    	<h4><a href="single-product.phtml">Fusce Aliquam</a></h4>
                                        <p>1x - $20.00</p>
                                    	<a href="#" class="remove"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </div>
                            </li>
                            <!-- CART ITEM - END -->
                            
                            <!-- CART ITEM - START -->
                            <li>
                            	<div class="row">
                                	<div class="col-sm-6">
                                    	<a href="cart.phtml" class="btn btn-primary btn-block">View Cart</a>
                                    </div>
                                    <div class="col-sm-6">
                                    	<a href="checkout.phtml" class="btn btn-primary btn-block">Checkout</a>
                                    </div>
                                </div>
                            </li>
                            <!-- CART ITEM - END -->
                            
                      	</ul>
                    </li> */ ?>

                    <!--<li class="dropdown navbar-search hidden-xs">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
                      	<ul class="dropdown-menu">
                        	<li>
                                <form>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                      	</ul>
                    </li>-->
                    {{-- <li class="dropdown navbar-search hidden-xs"><!--TAKE AWAY THE CLASS 'hidden-xs' TO HAVE AN ITEM DISPLAYED IN A MINIMIZED (mobile-view) MENU-->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search">Search</i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="get">
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" name="search_keyword" placeholder="Search ..." />

                                        <?php
                                        if (isset($_GET['page']))
                                        { ?>
                                            <input type="hidden" name="searchOrigin" value="<?=$_GET['page']?>" />
                                        <?php
                                        } ?>
                                        <input type="hidden" name="page" value="searchController" />
                                        <input type="hidden" name="action" value="doSearch" />

                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
                <!----NAV BAR ENDS HERE --->


            </div>
        </div>
    </header>