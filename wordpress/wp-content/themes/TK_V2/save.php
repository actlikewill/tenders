<?php get_header(); ?>
			
			<div id="content" class="clearfix row">


				<div class="section_heading">
					<?php if (is_category()) { ?>
						<h2>
							<span><?php _e("Posts Categorized:", "wpbootstrap"); ?></span> <?php single_cat_title(); ?>
						</h2>
					<?php } elseif (is_tag()) { ?> 
						<h2>
							<span><?php _e("Posts Tagged:", "wpbootstrap"); ?></span> <?php single_tag_title(); ?>
						</h2>
					<?php } elseif (is_author()) { ?>
						<h2>
							<span><?php _e("Posts By:", "wpbootstrap"); ?></span> <?php get_the_author_meta('display_name'); ?>
						</h2>
					<?php } elseif (is_day()) { ?>
						<h2>
							<span><?php _e("Daily Archives:", "wpbootstrap"); ?></span> <?php the_time('l, F j, Y'); ?>
						</h2>
					<?php } elseif (is_month()) { ?>
					    <h2>
					    	<span><?php _e("Monthly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('F Y'); ?>
					    </h2>
					<?php } elseif (is_year()) { ?>
					    <h2>
					    	<span><?php _e("Yearly Archives:", "wpbootstrap"); ?>:</span> <?php the_time('Y'); ?>
					    </h2>
					<?php } elseif (is_post_type_archive())  { ?>    
					    <h2><?php post_type_archive_title(); ?></h2>

					<?php } elseif ( is_tax()) {
					    global $wp_query;
					    $term = $wp_query->get_queried_object();
					    $title = $term->name; ?>
					    <h2><?php echo $title; ?></h2>
					    
					<?php } ?>
				</div>

			
				<div id="main" class="col-sm-8 clearfix" role="main">

						<div id="tender_list_A2" class="clearfix tenderBox_out row clearfix">

							<?php 
							
						if (is_tax()) {
								global $wp_query;
								$query = $wp_query;
							} else {
							$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
							$custom_posts_args = array(
								'posts_per_page' => '15',
								'post_type'=> 'tenders',						
								'meta_query' => array(
									'free_clause' => array(
										'key' => 'free_to_view',
										'value' => 1
									),							
								),
								'orderby' => 'date',
								'order' => 'DESC',
								'paged'=> $page,						
								);
							$custom_posts_args2 = array(
								'posts_per_page' => '15',
								'post_type'=> 'tenders',						
								'meta_query' => array(
									'relation' => 'OR',
									'not_free' => array(
										'key' => 'free_to_view',
										'value' => 0
									),							
									'not_exists' => array(
										'key' => 'free_to_view',
										'compare' => 'NOT EXISTS'
									),							
								),
								'orderby' => 'date',
								'order' => 'DESC',
								'paged'=> $page,						
								);

					    $q1 = new WP_Query( $custom_posts_args );
					    $q2 = new WP_Query( $custom_posts_args2 );

							$query = new WP_Query();
							$query->posts = array_merge( $q1->posts, $q2->posts);
							$query->post_count = $q1->post_count + $q2->post_count;
							}

							if($query->have_posts()) : for($count=0;$query->have_posts();$count++) : $query->the_post();
							    $open = !($count%3) ? '<div class="row clearfix line_row">' : ''; //Create open wrapper if count is divisible by 3
							    $close = !($count%3) && $count ? '</div>' : ''; //Close the previous wrapper if count is divisible by 3 and greater than 0
							    echo $close.$open;
							
								include(TEMPLATEPATH.'/inc/tenderBox.php');
							
							endfor; ?>	
							

								<div class="pagi_out">
									<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
										
										<?php page_navi(); // use the page navi function ?>

									<?php } else { // if it is disabled, display regular wp prev & next links ?>
										<nav class="wp-prev-next">
											<ul class="pager">
												<li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
												<li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
											</ul>
										</nav>
									<?php } ?>
								</div>	
							
							<?php else : ?>
							
								<article id="post-not-found">
								    <header>
								    	<h1><?php _e("No Posts Yet", "wpbootstrap"); ?></h1>
								    </header>
								    <section class="post_content">
								    	<p><?php _e("Sorry, What you were looking for is not here.", "wpbootstrap"); ?></p>
								    </section>
								    <footer>
								    </footer>
								</article>

							
							<?php endif; ?>
							<?php echo $count ? '</div>' : ''; //Close the last wrapper if post count is greater than 0 ?>















						</div><!-- end tender list A2 -->

				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>