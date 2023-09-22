<?php
/*
Template Name: Upload Page
*/
?>

<?php get_header(); ?>

<style type="text/css">
	.top-third.white.full_container {
	display: none;
	}	
	li#upload_menu {
	display: none;
	}	
</style>


			<div id="content" class="clearfix row">
				<div id="main" class="col-sm-12 clearfix" role="main">

					<?php
					if ( is_user_logged_in() ) { ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								<a class="logout_le_link" href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a>

								<header>
									<div class="page-header"><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></div>
								</header> <!-- end article header -->
							
								<section class="post_content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->
							</article> <!-- end article -->

							<?php endwhile; ?>		
							<?php else : ?>
							<?php endif; ?>

					<?php } else { ?> 
						<h1 class="center">You need to login to upload Tender</h1>
						<div id="login">
							
							<?php // login_with_ajax(); ?> 

							<?php $args = array(
							        'echo'           => true,
							        'redirect'       => '', 
							        'form_id'        => 'loginform',
							        'label_username' => __( 'Username' ),
							        'label_password' => __( 'Password' ),
							        'label_remember' => __( 'Remember Me' ),
							        'label_log_in'   => __( 'Log In' ),
							        'id_username'    => 'user_login',
							        'id_password'    => 'user_pass',
							        'id_remember'    => 'rememberme',
							        'id_submit'      => 'wp-submit',
							        'remember'       => true,
							        'value_username' => NULL,
							        'value_remember' => false
							); ?> 
							<?php wp_login_form( $args ); ?>

							<div class="le_register">
								<h5 class="center">Don't have an account? <a href="<?php // echo wp_registration_url(); ?>#nogo">Register</a></h5>
							</div>	
						</div>	
					<?php } ?>


				</div> <!-- end #main -->
    
				<?php // get_sidebar(); // sidebar 1 ?>
			</div> <!-- end #content -->
<?php get_footer(); ?>