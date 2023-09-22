<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<div class="clearfix row main_single_header_container">
					<div class="col-sm-12 main_single_header clearfix" role="main">
						<header>
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
						</header>
					</div>

					<div id="main" class="col-sm-8 clearfix" role="main">
					
						<section class="post_content clearfix" itemprop="articleBody">
							<div class="tender_image"><?php the_post_thumbnail( 'large' ); ?></div>
						</section>	
					</div> <!-- end #main -->	

					<div class="col-sm-4 main_single_header clearfix" role="main">
						<div class="custom_meta_single">
							<ul class="custom_meta_single_in">
								<li><b>COMPANY: </b><?php echo get_the_term_list( $post->ID, 'company', '', ', ', '' ); ?></li>
								<li><b>DOCUMENT TYPE: </b><?php echo get_the_term_list( $post->ID, 'document-type', '', ', ', '' ); ?></li>

									<?php 
										$date = get_field('open_date');
										$date2 = get_field('close_date');
										// $date = 19881123 (23/11/1988)

										// extract Y,M,D
										$y = substr($date, 0, 4);
										$m = substr($date, 4, 2);
										$d = substr($date, 6, 2);

										// extract Y,M,D
										$y2 = substr($date2, 0, 4);
										$m2 = substr($date2, 4, 2);
										$d2 = substr($date2, 6, 2);

										// create UNIX
										$time = strtotime("{$d}-{$m}-{$y}");							
										$time2 = strtotime("{$d2}-{$m2}-{$y2}");							
									?>

								<!--	
								<li><b>OPEN DATE: </b> <?php echo date('M d, Y', $time); ?></li>
								<li><b>CLOSE DATE: </b> <?php echo date('M d, Y', $time2); ?></li>
								-->
								<li><b>OPEN DATE: </b><?php $key="field_545b72875c344"; echo get_post_meta($post->ID, $key, true); ?></li>
								<li><b>CLOSE DATE: </b><?php $key="field_545b7a609387f"; echo get_post_meta($post->ID, $key, true); ?></li>
							</ul>
							<div class="tender_info"><p><?php the_field('short_description_of_tender') ?></p></div>
						</div>						
					</div>

					<?php get_sidebar(); ?>	

					</article> <!-- end article -->
					<?php // comments_template('',true); ?>
			</div> <!-- end #content -->

<?php endwhile; ?>			
<?php else : ?>
<?php endif; ?>


<?php get_footer(); ?>