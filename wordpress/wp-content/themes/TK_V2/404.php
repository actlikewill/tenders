<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-6 col-sm-offset-3 clearfix" role="main">

					<article id="post-not-found" class="clearfix">
						
						<header>

							<div class="hero-unit failed_hero">
								<span class="typcn typcn-info-outline"></span>
								<h1><?php _e("404 Error - Not Found","wpbootstrap"); ?></h1>
							</div>
													
						</header> <!-- end article header -->
					
					<!--
						<section class="post_content">
							<p><?php /* _e("Whatever you were looking for was not found, but maybe try looking again or search using the form below.","wpbootstrap"); ?></p>
							<div class="row">
								<div class="col col-lg-12">
									<?php get_search_form(); */ ?>
								</div>
							</div>						
						</section>
					-->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>