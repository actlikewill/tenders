<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
</div>


	<div class="container">	

		<div class="section_heading">
			<h2>TENDERS FOR THE DAY</h2>
		</div>

		<div id="content" class="clearfix row">
			<div id="main" class="col-sm-8 clearfix" role="main">
				<?php // if (have_posts()) : while (have_posts()) : the_post(); ?>


				


			<!--	
				<div class="col-sm-12 home_slide clearfix">
						<?php /*
						query_posts('posts_per_page=4&post_type=tenders');
						if (have_posts()) :
						echo '<ul class="bxslider">';
						while (have_posts()) : the_post();

						$image_id = get_post_thumbnail_id();
						$image_url = wp_get_attachment_image_src($image_id,'wpbs-featured-carousel', true);
						?>

							<li>
								<h3><a href="<?php the_permalink() ?>"> <?php the_title(); ?></a></h3>
								<div class="slide_footer">
									<p><?php the_field('short_description_of_tender') ?></p>
								
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

							<div class="custom_meta slide_meta">
								<p>BY: <?php echo get_the_term_list( $post->ID, 'company', '', ', ', '' ); ?>  |  DOCUMENT TYPE: <?php echo get_the_term_list( $post->ID, 'document-type', '', ', ', '' ); ?>
								   |   OPEN DATE: <?php echo date('M d, Y', $time); ?>   |   CLOSE DATE: <?php echo date('M d, Y', $time2); ?></p>
							</div>	

							</div>

							</li>

						<?php endwhile; wp_reset_query();
						echo '</ul>';
						endif; ?>
				</div>
			-->	








				<!--
				<ul id="tender_list_A" class="clearfix">
					<?php
					query_posts('posts_per_page=6&post_type=tenders');
					if (have_posts()) : while (have_posts()) : the_post();
					?>
						<li id="post-<?php the_ID(); ?>">
							<a class="A_list_link" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
							<?php // the_post_thumbnail('pixellar_slider'); ?>

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

							<div class="custom_meta">
								<p>BY: <?php echo get_the_term_list( $post->ID, 'company', '', ', ', '' ); ?>  |  DOCUMENT TYPE: <?php echo get_the_term_list( $post->ID, 'document-type', '', ', ', '' ); ?>
								   |   OPEN DATE: <?php echo date('M d, Y', $time); ?>   |   CLOSE DATE: <?php echo date('M d, Y', $time2); ?></p>
							</div>

						</li>	
					<?php endwhile; wp_reset_postdata(); ?>
					<?php endif; */ ?>
				</ul>	
				-->




				<div id="tender_list_A2" class="clearfix tenderBox_out row clearfix">
					<?php 
					
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
							$custom_posts_args = array(
								'posts_per_page' => '15',
								'post_type'=> 'tenders',						
								'tax_query' => array(
									array(
										'taxonomy' => 'document-type',
										'field' => 'slug',
										'terms' => 'sponsored' 
									),							
								),
								'orderby' => 'date',
								'order' => 'DESC',
								'paged'=> $page,						
								);
					    $q1 = new WP_Query( $custom_posts_args );

							
							
							$custom_posts_args2 = array(
								'posts_per_page' => (15 - $q1->found_posts),
								'post_type'=> 'tenders',						
								'tax_query' => array(
									array(
										'taxonomy' => 'document-type',
										'field' => 'slug',
										'terms' => 'sponsored',
										'operator' => 'NOT IN'
									)							
								),
								'orderby' => 'date',
								'order' => 'DESC',
								'paged'=> $page,						
								);

					    $q2 = new WP_Query( $custom_posts_args2 );

					
							$query = new WP_Query();
							$query->posts = array_merge( $q1->posts, $q2->posts);
							$query->post_count = $q1->post_count + $q2->post_count;
		

						if($query->have_posts()) : for($count=0;$query->have_posts();$count++) : $query->the_post();
						    $open = !($count%3) ? '<div class="row clearfix line_row">' : ''; //Create open wrapper if count is divisible by 3
						    $close = !($count%3) && $count ? '</div>' : ''; //Close the previous wrapper if count is divisible by 3 and greater than 0
						    echo $close.$open;

						 	include(TEMPLATEPATH.'/inc/tenderBox.php');



					endfor; wp_reset_postdata(); ?>
					<?php endif; ?>
					<?php echo $count ? '</div>' : ''; //Close the last wrapper if post count is greater than 0 ?>


				</div>	










				
				<div class="view_all">
					<a href="/tender/">View All</a>
				</div>
			

				<?php // endwhile; ?>	
				<?php // else : ?>
				<?php // endif; ?>
			</div> 
			<?php get_sidebar(); ?>
			<?php // get_sidebar('sidebar2'); ?>
		
		</div>
	</div><!-- END MAIN CONTAINER -->
		
<?php get_footer(); ?>