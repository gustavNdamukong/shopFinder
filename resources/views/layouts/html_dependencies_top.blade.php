
        
    <!-- ==========================
    	Fonts 
    =========================== -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' rel='stylesheet' type='text/css'>

    <!-- ==========================
    	CSS 
    =========================== -->
    <link href="{{ asset('css/lib/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/dragtable.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/color-switcher.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/custom.css') }}" rel="stylesheet" type="text/css">

    
    <?php 
        //SET THE SITE THEME DYNAMICALLY
    if (isset($site_theme))
    { ?>
        <link href="{{ asset('css/color/'.$site_theme.'.css') }}" id="main-color" rel="stylesheet" type="text/css">
    <?php
    } 
    else
    { 
        //SET A DEFAULT SITE THEME JUST IN CASE ?>
        <link href="{{ asset('css/color/red.css') }}" id="main-color" rel="stylesheet" type="text/css">
    <?php    
    } ?>



       <!-- ==========================
           JS 
       =========================== -->
       <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
       <![endif]-->
