<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
<head>
	<script data-ad-client="ca-pub-2079790220574376" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" id="favicon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
     
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri(); ?>/library/css/jquery.bxslider.css" rel="stylesheet" />


	<link rel="stylesheet" id="typicons" href="<?php echo get_template_directory_uri(); ?>/library/fonts/typicons.min.css" type="text/css" media="all">

	<link rel="stylesheet" id="custom_css" href="<?php echo get_template_directory_uri(); ?>/library/css/custom3.css" type="text/css" media="all">

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
// background: url(<?php echo get_template_directory_uri(); ?>/library/img/bg_housestyle.png) center center fixed;
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

p.form-row.form-row-wide.create-account {
    visibility: hidden !important;
}

</style>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56632341-1', 'auto');
  ga('send', 'pageview');

</script>
		

				
	</head>
<?php include(TEMPLATEPATH.'/css.php'); ?>


	
	<body <?php body_class(); ?>>



<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner" style="display:block;">
  <div class="container">

 	<div class="row clearfix mast_out">
 		<div class="col-md-2 mast_logo">
		    <div class="navbar-header">
		      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
				<a class="navbar-brand" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/library/img/tenders-kenya-logo.png" alt="<?php bloginfo('name'); ?>" />
				</a>
		    </div>
		</div>  
		
		<div class="col-md-10 mast_nav">  
		    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		    	<div class="col-md-8 mast_navA">

<?php 

if ( is_user_logged_in()  ) { ?>

				    <div class="mast_search">
						<form role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>">
							<div class="le_search3">  <!-- 'company','document-type' -->
								<?php echo do_shortcode('[acps id="13"]'); ?>
							</div>
						</form>
					</div>

			<?php } ?>
				</div>
				
				<div class="col-md-4 mast_navA">	
					<ul class="nav navbar-nav">
					  <!--
				      <li class="dropdown spesheli">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Select</a>
				        	<?php wp_bootstrap_main_nav(); ?>
				      </li>
					  -->

					  		<li class="home_button"><a href="/">Home</a></li>
					  		<li class="list_seperator"><a>|</a></li>
						<?php if ( is_user_logged_in() ) { ?> 
							<li><a href="/my-account/"><span class="typcn typcn-user-outline"></span> My Account</a></li>
							<li class="list_seperator"><a>|</a></li>
							<li><a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a></li>
						<?php } else { ?> 
							<li><a href="/my-account/"><span class="typcn typcn-key-outline"></span> Login</a></li>
							<li class="list_seperator"><a>|</a></li>
							<li><a href="/my-account/lost-password/">Reset Password</a></li>
						<?php } ?> 				      


				    </ul>
				</div>    
		    </nav>
		</div>
	</div>	    
  </div>
</header>









<!--				
		<header role="banner">
				
			<div class="navbar navbar-default navbar-static-top">


				<div class="top_most full_container">
					<div class="container">
						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<?php wp_bootstrap_main_nav(); ?>
							<ul id="login_links">

								<?php /* if ( is_user_logged_in() ) { ?> 
									<!-- <li>Welcome <?php wp_register('', ''); ?></li>
									<li class="list_seperator">|</li> -->
									<li><a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a></li>
								<?php } else { ?> 
									<li><a href="<?php echo wp_login_url(); ?>">Login</a></li>
									<li class="list_seperator">|</li>
									<li><?php wp_register('', ''); ?></li>
								<?php } ?> 
								
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
							<li id="home_menu"><a href="http://tenderskenya.co.ke/">Home</a></li>
							<li id="browse_menu"><a href="http://tenderskenya.co.ke/tender/">Browse Tenders</a></li>
							<li id="upload_menu"><a href="http://tenderskenya.co.ke/wp-admin">Upload Tender</a></li>
						</ul>
					</div>



				</div>
			</div>

				<div class="top-third white full_container clearfix">
					<div class="container">

						<h4>Search Tenders</h4>


					<div id="tax_drill_01" class="tax_drill">	


						<form role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>">
							<div class="le_search2">

								<?php echo do_shortcode('[acps id="64"]'); */ ?>

							</div>
						</form>

					</div>	
					

					</div>
				</div>	

		
		</header>
-->	

		<div id="nafasi"></div>

		<div class="full_container top_fourth_full clearfix">
			<div class="container">
				<div id="home_ad_01">

					<?php if ( get_field('show_google_ad','option') == true ) { ?>
						<div class="le_top_g_ad">
							<?php the_field('top_google_ad','option') ?>
						</div>
					<?php } else { ?>

						<?php if ( get_field('top_banner_ad','option') != '' ) { ?>
							<a href="<?php the_field('top_banner_link','option'); ?>">
								<img src="<?php the_field('top_banner_ad','option'); ?>" alt="AD1" />
							</a>
						<?php } else { ?>
							<a href="#nogo">
								<img src="/wp-content/uploads/2015/04/top1.jpg" alt="AD1" />
							</a>
						<?php }  ?>

					<?php } ?>
				</div>
			</div>	
		</div>


<!--  Masthead Select Dropdown to hide items -->
<script type="text/javascript">
	jQuery( document ).ready(function($) {
		// $("li.spesheli #menu-top-menu").addClass("dropdown-menu");
	});

	document.getElementById("menu-top-menu").className += " dropdown-menu";
</script>		


		<div class="container">