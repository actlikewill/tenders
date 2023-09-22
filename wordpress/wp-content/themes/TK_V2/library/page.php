<?php get_header(); ?>
			<div id="content" class="clearfix row">
				<div id="main" class="col-sm-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
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
				</div> <!-- end #main -->
    
				<?php // get_sidebar(); // sidebar 1 ?>
			</div> <!-- end #content -->
<?php get_footer(); ?>