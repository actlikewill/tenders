<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="shortcut icon" id="favicon" href="<?php echo get_template_directory_uri(); ?>/library/img/favi.png">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
		<link href="<?php echo get_template_directory_uri(); ?>/library/css/jquery.bxslider.css" rel="stylesheet" />

		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.bxslider.min.js"></script>

<style type="text/css">
.top-third {
background: #734927 url(<?php echo get_template_directory_uri(); ?>/library/img/banner_search.png) center center no-repeat;

-webkit-background-size: cover;
-moz-background-size: cover;
-ms-background-size: cover;
-o-background-size: cover;
background-size: cover;
}	
body { 
background: url(<?php echo get_template_directory_uri(); ?>/library/img/bg_housestyle.png) center center fixed;
}
#mc_signup {
background: #381b01 url(<?php echo get_template_directory_uri(); ?>/library/img/mailchimp_bg.jpg) top right no-repeat;
padding: 20px;

-webkit-border-radius: 8px;
-moz-border-radius: 8px;
-ms-border-radius: 8px;
-o-border-radius: 8px;
border-radius: 8px;
}
#mc_signup_form .mc_input {
background: transparent;
border: 3px solid #ef4d2d;
border-radius: 8px;
padding: 10px;
color: #ef4d2d;
}
#mc_signup_form .mc_var_label {
color: rgba(255, 255, 255, 0.3);
}
#mc_signup_submit {
background: #ef4d2d;
border: 0px;
height: 45px;
border-radius: 8px;
color: #FFF;
font-weight: bold;
text-transform: uppercase;
font-size: 1.2em;
}
#mc-indicates-required {
color: rgba(255, 255, 255, 0.8);
font-size: .8em;
}
#mc_display_rewards {
display: none;
}
.widgettitle {
font-weight: bold;
text-transform: uppercase;
font-size: 1.3em;
}


</style>
		
				
	</head>
	
	<body <?php body_class(); ?>>
				
		<header role="banner">
				
			<div class="navbar navbar-default navbar-static-top">


				<div class="top_most full_container">
					<div class="container">
						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<?php wp_bootstrap_main_nav(); ?>
							<ul id="login_links">
								<li><a href="#nogo">Login</a></li>
								<li class="list_seperator">|</li>
								<li><a href="#nogo">Register</a></li>
							</ul>
						</div>
					</div>	
				</div>	



				<div class="container">



          
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/library/img/logo.png" alt="<?php bloginfo('name'); ?>" />
						</a>

						<ul id="primary_nav">
							<li id="home_menu"><a href="#nogo">Home</a></li>
							<li id="browse_menu"><a href="#nogo">Browse Tenders</a></li>
							<li id="upload_menu"><a href="#nogo">Upload Tender</a></li>
						</ul>
					</div>



				</div> <!-- end .container -->
			</div> <!-- end .navbar -->

				<div class="top-third white full_container clearfix">
					<div class="container">

						<h4>Search Tenders</h4>


					<div id="tax_drill_01" class="tax_drill">	


						<form role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>">
							<div class="le_search2">  <!-- 'company','document-type' -->

								<?php echo do_shortcode('[acps id="64"]'); ?>

							</div>
						</form>


						<!--
						<?php
						the_widget('Taxonomy_Drill_Down_Widget', array(
						    'title' => '',
						    'mode' => 'dropdowns',
						    'taxonomies' => array( 'document-type', 'company') // list of taxonomy names
						));
						?>
						-->
					</div>	



						<!--
						<form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
							<div class="form-group">
								<input name="s" id="s" type="text" class="search-query form-control" autocomplete="off" placeholder="<?php _e('Search','wpbootstrap'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
							</div>
						</form>	
						-->						

					</div>
				</div>	

		
		</header> <!-- end header -->		
		<div class="container">