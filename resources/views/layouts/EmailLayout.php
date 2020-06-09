<?php

namespace layouts\classifieds;

/**
 * Description of BootstrapLayout
 *
 * @author Gustav
 */
class EmailLayout extends \DGZ_library\DGZ_Layout {
	
	/**
	 * Overrides the default getMenuView to use the Reponsive (bootstrap) menu system
	 * @return string The name of the menu to use, in this case ResponsiveMenuView
	 */
	/*public function getMenuView() {
		return 'ResponsiveMenuView';
	}
	*/
	
	public function display() {
		//include_once('./settings/config.inc.php'); //moving this to the parent class
		////////$currentPage = basename($_SERVER['SCRIPT_FILENAME']);
	//die('We in Classifieds layout dawg!!!');


	//require_once('./includes/gen_access_timeout.inc.php');

	 //require_once('../includes/session_timeout.inc.php'); this file here will be reserved only for highly secure (member-only) pages.
	//include('./includes/title.inc.php');
	//require_once('./includes/connection.inc.php');
	//require_once('../includes/config.inc.php');
	//$currentPage = basename($_SERVER['SCRIPT_FILENAME']);


	?>

		<!DOCTYPE HTML>
		<html class="no-js" lang="en-gb">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<!--<meta name="viewport" content="width=device-width">-->
			<title><?php echo self::$appName."-".$this->pageTitle; ?></title>


			<!--<link rel="stylesheet" type="text/css" href="styles.css"/>-->
			<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.16.custom.css"/>

			<!--This style line below here fetches stylish font from google, thanks cHRIS mills-->
			<link href='http://fonts.googleapis.com/css?family=Lobster|Terminal+Dosis' rel='stylesheet' type='text/css'>

			<link rel="icon" href="../../favicon.ico">
			<link rel="stylesheet" type="text/css" href="css/random.css">
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
			<link rel="stylesheet" href="css/normalize.min.css">
			<link rel="stylesheet" href="css/random.css">
			<link href="css/superfish.css" rel="stylesheet" type="text/css" />

			<style type= "text/css">

				article, aside, audio, canvas, datalist, details, figcaption, figure, footer, mark, header, hgroup, menu,
				nav, section, video {

					display: block;
				}

			</style>




			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<!--<script src="js/ie10-viewport-bug-workaround.js"></script>-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="js/css3-mediaqueries.js"></script>
			<script src="js/selectivizr-min.js"></script>
			<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

			<!--[if Lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
			</script>
			<![endif]-->

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="js/hoverIntent.js" type="text/javascript" charset="utf-8"></script>
			<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
			<script src="js/bootstrap-image-gallery.min.js" type="text/javascript" charset="utf-8"></script>
			<script src="js/superfish.js" type="text/javascript" charset="utf-8"></script>

			<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
			</script>
			<![endif]-->

			<script type="text/javascript">
			</script>

			<!-- Custom styles as defined by the application. These can override those set above -->
			<?= $this->getCssHtml() ?>
		</head>

		<body>
		<section id="mainwrapper" class="container"> <!--THIS SECTION TAG CONTAINS EVERYTHING TILL THE CLOSING </body> TAG-THE CONTAINER CLASS MAKES IT INVOKE BOOTSTRAP-->

			<section id="header">




		<?php #################### HEADER GOES HERE ################################### ?>

			<?php include_once("header.inc.php"); ?>

		<?php ##################### END OF HEADER ##################################### ?>



		<?php //die('THE SLIDER VAR SAYS: <br /><br /><br />It really says: '.$this->showImageSlider); //echo 'THE SLIDER VAR SAYS: '.$lider;
		########################## YOUR PAGE SLIDER GOES HERE - WE PUT IT IN A CONDITIONAL SO U DECIDE WH PAGE U WANNA SHOW A SLIDER ON ###################
		if ($this->showImageSlider == true) { ?>

			<div class="jumbotron" style="margin:30px auto;max-width:800px;" class="col-xs-12">
				<?php
				//$imageClass = new \DGZ_library\DGZ_SliderEngine;
				//$imageClass->showSlider();
				?>
			</div>

			<?php
		}
		#################################### END OF YOUR SLIDER ###########################################################
		?>

			</section><!--END OF SECTION TAG WITH THE 'header' ID-->




		<section id="main_content">




		<?php ####################### SIDEBAR HERE ################################## ?>
				<article id="sidebar">
					<?php
					//Let's include the sidebar here
					//include_once("camcomsidebar.inc.php"); ?>
				</article>
		<?php ############################## END OF SIDEBAR ############################# ?>







		<article id="floatbg">


			<?php ######################## ALL YOUR PAGE CONTENT (NOTICE HOW APART FROM THE FOOTER INCLUDED BELOW-WHICH IS WRAPPED IN A <footer> TAG AND THE html dependences bottom
			########### ITS MADE OF <section> tags wrapped in one huge <div> with a class of 'main') ##################################################### ?>

		  <div class="main">
		<?php

		if(!empty($this->exceptions)):
			?>
			<div class="exceptions">
				<?= $this->exceptions ?>
			</div>
			<?php
		endif;
		if(!empty($this->warnings)):
			?>
			<div class="warnings">
				<?= $this->warnings ?>
			</div>
			<?php
		endif;
		if(!empty($this->errors)):
			?>
			<div class="danger">
				<?= $this->errors ?>
			</div>
			<?php
		endif;
		if(!empty($this->notices)):
			?>
			<div class="notices">
				<?= $this->notices ?>
			</div>
			<?php
		endif;
		if(!empty($this->successes)):
			?>
			<div class="successes">
				<?= $this->successes ?>
			</div>
			<?php
		endif;
		?>

		<h2>WELCOME TO THE EMAIL APP THEME</h2>

		<?php echo $this->content;


		############################## END OF YOUR SITE MAIN CONTENT ########################################	?>



			  



			  <div class="clearer"></div><!--THIS IS THE LAST <DIV> (THING) INSIDE THIS FLOATBG CONTAINER COZ IT KEEPS EVERYTHING ABOVE IT-->

				</article><!--END OF FLOATBG ARTICLE TAG-->
			</section><!--END OF MAINCONTENT THAT CONTAINS THE SIDEBAR, N THE FLOATBG-->










		<section class="first_footer">
			<div class="well">
				<?php ################### START OF INCLUDED PART OF FIRST FOOTER ######################?>


				<?php include_once("first_footer.inc.php"); //include the 1st footer here ################### END OF INCLUDED PART OF FIRST FOOTER ######################?>

				<div class="clearer" id="firstfooterdivclear"></div><!--NOTE THAT THIS IS THE LAST DIV (THING) INSIDE well of THE first_footer-->
			</div><!--END OF THE WELL DIV INSIDE THE first_footer SECTION-->
		</section><!--End of first footer section-->








		<article id="footer"><!--HERE'S THE START OF THE SECOND FOOTER; IT'S ENCLOSED IN THIS PAIR OF <article></article> tags ided 		
						'footer'-->
			<?php include_once("footer.inc.php"); //include the 2nd footer here ?>
			<div class="clearer"></div><!--to make this empty div work n keep everything before it above it; that's why it's the last 	
							thing (div) inside the second-footer part of the website (enclosed in a pair of <article tags>. You also need 
							to make sure the footer element has no height rule-->
		</article>


		</section><!--END OF THE MAINWRAPPER N CONTAINER SECTION THAT CONTAINS EVERYTHING-->



		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

		<!--SCRIPTS FOR THE SLIDER-->
		<script src="js/sliderengine/jquery.js"></script>

		<script src="js/sliderengine/amazingslider.js"></script>

		<script src="js/sliderengine/initslider-1.js"></script>

		<!-- Include scripts required by Bootstrap -->
		<?= $this->getJavascriptHtml() ?>

		</body>
		</html>







		<?php

	}
		
	/**
	 * Outputs the content of the head section of a HTML document suitable for Bootstrap 
	 */
	protected function bootstrapHeaders() {
		/*
        <!-- Bootstrap CSS -->

            <link href="<?= \Cdn\Cdn::getUrl('bootstrap', 'css/bootstrap.min.css'); ?>" rel="stylesheet">
            <link href="<?= \Cdn\Cdn::getUrl('bootstrap', 'css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
            */
	}
	
	
	/**
	 * Outputs the content of the head section of a HTML document suitable for Bootstrap 
	 */
	protected function bootstrapDatepickerHeaders() {
		/*
	<!-- Bootstrap Datepicker CSS -->
	<link href="<?= \Cdn\Cdn::getUrl('bootstrapdatepicker', 'css/bootstrap-datepicker3.min.css'); ?>" rel="stylesheet">
	*/
	}
	
	
	/**
	 * Outputs the various javascript files required by bootstrap to function.
	 */
	protected function bootstrapScripts() {
		/*
		<script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('jquery'); ?>"></script>
		<script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('bootstrap', 'js/bootstrap.min.js'); ?>"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('ie10viewporthack'); ?>"></script>
	
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="<?= \Cdn\Cdn::getUrl('html5shiv'); ?>"></script>
		  <script src="<?= \Cdn\Cdn::getUrl('respond'); ?>"></script>
		<![endif]-->
		*/
	}
	
	
	/**
	 * Outputs the various javascript files required by bootstrap datepicker to function.
	 */
	protected function bootstrapDatePickerScripts() {
		/*
                <script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('bootstrapdatepicker', 'js/bootstrap-datepicker.min.js'); ?>"></script>
                <script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('bootstrapdatepicker', 'js/bootstrap-datepicker-startup.js'); ?>"></script>
       */
            }


            /**
             * Outputs the various javascript files required by tablesorter to function.
             */
	protected function tablesorterScripts() {
		/*
                <script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('tablesorter', 'jquery.tablesorter.js') ?>"></script>
                <script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('tablesorter', 'tablesorter-startup.js'); ?>"></script>
        */
            }


            /**
             * Outputs the various javascript files required by bootbox to function.
             */
	protected function bootboxScripts() {
		/*
                <script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('bootbox', 'js/bootbox.min.js'); ?>"></script>
                <script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('bootbox', 'js/bootbox-startup.js'); ?>"></script>
        */
            }

            /**
             * Outputs the various javascript files providing various utility functions
             */
	protected function baseScripts() {
	/*
		<script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('responsive', 'base.js'); ?>"></script>
		<script type="text/javascript" src="<?= \Cdn\Cdn::getUrl('clientutils', 'clientUtils.js'); ?>"></script>
	*/
	}
	
}
