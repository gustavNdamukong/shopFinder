<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ShopFinder') }}</title>


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/lib/app.js') }}" defer></script>----------TESTING WITHOUT THIS (03/06/2020)--}}

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
    <link href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <!------------ pull in the awesome jQuery Blueimp image gallery plugin style sheet --------->
    <link href="{{ asset('/css/lib/blueimp-gallery.min.css') }}" rel="stylesheet">

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


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<!--<nav class="navbar navbar-default">-->
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
                                <li><a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" width="80" height="80"></a></li>
                            </ul>
                            @if (Auth::user())
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Manage Shops <span></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ url('/home') }}">Shops</a></li>
                                        <li><a href="#">Your favourite Shops <small>(coming soon)</small></a></li>
                                        @if(Auth::user()->hasRole('super-admin'))
                                        <li><a href="{{ url('admin/users') }}">Manage users</a></li>
                                        <li><a href="{{ url('admin/create_user') }}">Create users</a></li>
                                        @endif
                                        @if(Auth::user()->hasAnyRoles(['super-admin','admin']))
                                        <li><a href="{{ url('admin/shops') }}">Manage Shops</a></li>
                                        <li><a href="{{ url('admin/create_shop') }}">Create new Shop</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>    
                            @endif
				

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
                                       {{-- <li><a title="Login to manage shop and more...s" href="{{ url('/auth/login') }}">Login</a></li> --}}
                        <li class="nav-item"><a class="nav-link" title="Login to manage shop and more..." href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span></span></a>
							{{-- <ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul> --}}
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="#" class="dropdown-item">Your role: {{ implode(',',Auth::user()->getRoles()) }}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>


						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

    <main class="py-4">
        @if($errors->any())
            <div class="container alert-danger" style="text-align:center;">
                @foreach($errors->all() as $error)
                    <li style="list-style: none;">{{$error}}</li>
                @endforeach
            </div>
        @endif
            <div style="text-align:center;">
                @include('flash::message')
            </div>
        @yield('content')
    </main>
</div>


    <?php //LET'S CREATE THE LOADING GIF THAT WILL BE PLACED IN THE JUMBOTRON WHEN AN AJAX CALL IS BEING MADE ?>
    <div class="loading_gif" style="display: none;">
        <img src="{{ asset('images/loading_blue.gif')}}" width="65" height="65" />
    </div>


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

        
    @yield('rawJS')

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="{{ asset('js/lib/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTZea67jn4YSPIGu0dNTHRyB1jnvo1Q00" type="text/javascript"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOC9dfqr0RzocAj6UPsyU2c9afyFUX8yc" type="text/javascript"></script><!--NEW UPDATED API KEY (03/06/2020)-->
    <!--<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->
    <script src="{{ asset('js/geolocation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/general.js') }}" type="text/javascript"></script>

    <!-------------------------------- include the awesome jQuery Blueimp image gallery plugin --------------->
    <script src="{{ asset('js/lib/blueimp-gallery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/lib/bootstrap-image-gallery.min.js') }}" type="text/javascript"></script>

          
        
</body>
</html>
