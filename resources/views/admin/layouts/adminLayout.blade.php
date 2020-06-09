<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Shops</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('/css/main.css') }}" rel="stylesheet">

        <!------------ pull in the awesome jQuery Blueimp image gallery plugin style sheet --------->
        <link href="{{ url('/css/blueimp-gallery.min.css') }}" rel="stylesheet">

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

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        
        
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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









	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header pull-left">


				<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"><</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>-->

                <!--<div id="logo_box">-->
                    <!--<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}"></a>-->
                <!--</div>-->
			</div>
                    
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                            <ul class="nav navbar-nav navbar-left">
                                <li><a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}"></a></li>
                            </ul>
                            @if (Auth::user())
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage Shops <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/manage') }}">View Shops</a></li>
                                                <li><a href="{{ url('/manage') }}">Edit Shops</a></li>
                                                <li><a href="{{ url('/create') }}">Create new Shop</a></li>
                                            </ul>
                                </li>
                            </ul>    
                            @endif
				

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
                                        <li><a title="Login to manage shop and more...s" href="{{ url('/auth/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>




	@yield('content')






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


    <?php include('html_dependencies_bottom.blade.php');  ?>


    @yield('rawJS')

            <!-- Scripts -->
    <script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTZea67jn4YSPIGu0dNTHRyB1jnvo1Q00" type="text/javascript"></script>
    <!--<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>--COMMENT THIS OUT AS IT IS MOANING ABOUT U HAVING REFERENCED THE GOOGLE API MULTIPLE TIMES WHICH IS NOT GOOD-->
    <script src="{{ url('js/geolocation.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/general.js') }}" type="text/javascript"></script>

    <!-------------------------------- include the awesome jQuery Blueimp image gallery plugin --------------->
    <script src="{{ url('js/blueimp-gallery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('js/bootstrap-image-gallery.min.js') }}" type="text/javascript"></script>



</body>
</html>







