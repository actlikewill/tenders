				<div id="sidebar1" class="col-sm-4" role="complementary">


					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>
					<?php endif; ?>

					<div id="AD1" class="widget widget_ad">

						<?php the_field('side_banner_link_1'); ?>

						<!--
						<?php /* if ( get_field('side_banner_1','option') != '' ) { ?>
							<a href="<?php the_field('side_banner_link_1','option'); ?>" target="_blank">
								<img src="<?php the_field('side_banner_1','option'); ?>" alt="AD1" />
							</a>
						<?php } else { ?>
							<a href="#nogo">
								<img src="<?php echo get_template_directory_uri(); ?>/library/img/side1.jpg" alt="AD1" />
							</a>
						<?php } */ ?>	
						-->
					</div>	
					
					<div id="AD2" class="widget widget_ad">

						<?php the_field('side_banner_link_2'); ?>

						<!--
						<?php /* if ( get_field('side_banner_2','option') != '' ) { ?>
							<a href="<?php the_field('side_banner_link_2','option'); ?>" target="_blank">
								<img src="<?php the_field('side_banner_2','option'); ?>" alt="AD1" />
							</a>
						<?php } else { ?>
							<a href="#nogo">
								<img src="<?php echo get_template_directory_uri(); ?>/library/img/side2.jpg" alt="AD1" />
							</a>
						<?php } */ ?>
						-->
					</div>	
					

				</div>