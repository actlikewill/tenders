	</div>

<div class="f_testimonails" style="display:none;">
	<div class="container">






<style type="text/css">
/* News */
.news-slider {
  /* Style the actual content */
}
.news-slider .text-content {
  // position: absolute;
  top: 0;
  left: 0;
  right: 0;
  background-color: rgba(255, 255, 255, 0.9);
  padding: 1em;
  width: 100%;
  height: 100%;
}
.news-slider .text-content h2 {
  margin: 0;
}
.news-slider .text-content p {
  margin: 1em 0;
}
.news-slider .text-content a.button-link {
  padding: 0.25em 0.5em;
  position: absolute;
  bottom: 1em;
  right: 1em;
}
.news-slider .image-content {
    line-height: 0;
    display: none;
}
.news-slider .image-content img {
  max-width: 100%;
}
.news-slider .news-pager {
  text-align: right;
  display: block;
  margin: 0.2em 0 0;
  padding: 0;
  list-style: none;
}
.news-slider .news-pager li {
  display: inline-block;
  padding: 0.6em;
  margin: 0 0 0 1em;
}
.news-slider .news-pager li.sy-active a {
  color: #31ace2;
}
.news-slider .news-pager li a {
  font-weight: 500;
  text-decoration: none;
  display: block;
  color: #222;
}
.mc4wp-form {
    background: #4e2f15 !important;
}	
</style>


<script src="<?php echo get_template_directory_uri(); ?>/library/js/slippry.min.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/slippry.css" />


					<?php if(get_field('testimonial','option')): ?>
						<?php $count=0; ?>
						<?php while(has_sub_field('testimonial','option')): ?>	


<section id="news-demo">
  <article>
    <div class="text-content">

			<!-- <div class="t_info"><?php // the_sub_field('testimonial_text','option'); ?></div> -->

			<h4><?php the_sub_field('name','option'); ?> </h4>
			<p><?php the_sub_field('title','option'); ?></p>
			<p><b><?php the_sub_field('company_name','option'); ?></b> </p>

			<?php
			$image_id = get_sub_field('company_logo','option');
			$image_size = 'full';
			$image_array = wp_get_attachment_image_src($image_id, $image_size);

			$image_url = $image_array[0];
			?>

			<img class="t_logo" src="<?php echo $image_url; ?>" alt="" />

    </div>
    
  </article>

</section>


						<?php $count++; ?>	
						<?php endwhile; ?>
					<?php endif; ?>







						

				<script type="text/javascript">
					jQuery(document).ready(function($){



					$('#news-demo').slippry({
					  // general elements & wrapper
					  slippryWrapper: '<div class="sy-box news-slider" />', // wrapper to wrap everything, including pager
					  elements: 'article', // elments cointaining slide content

					  // options
					  adaptiveHeight: false, // height of the sliders adapts to current 
					  captions: false,

					  // pager
					  pagerClass: 'news-pager',

					  // transitions
					  transition: 'horizontal', // fade, horizontal, kenburns, false
					  speed: 1200,
					  pause: 8000,

					  // slideshow
					  autoDirection: 'prev'
					});








						$('.bxslider').bxSlider({
						  // adaptiveHeight: true,
						  mode: 'fade'
						});
					});	
				</script>


	</div>
</div>

	<div id="footer_container">
		<div class="container">
			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">
					<!--
		          <div id="widget-footer" class="clearfix row">
		            <?php /* if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; */ ?>
		          </div>
		          -->
					
					<nav class="clearfix">
						<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					
					<ul class="center foot_items">
						<li>All Rights Reserved. TendersKenya &copy; <?php echo date("Y") ?> | By <a href="http://zedafrica.com" target="_blank" title="ZedAfrica">ZedAfrica</a> | <a href="/?add-to-cart=21">Purchase Membership</a>

						</li>	


		<li><a href="https://www.facebook.com/pages/TendersKenya/972683082747106" target="_blank" alt="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/library/img/fb.png"></a></li>
		<li><a href="https://twitter.com/tenders_kenya" target="_blank" alt="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/library/img/tw.png"></a></li>
		<li><a href="https://www.linkedin.com/profile/view?id=377211929&authType=NAME_SEARCH&authToken=wQVJ&locale=en_US&trk=tyah&trkInfo=tarId%3A1415707846930%2Ctas%3Atenders%20kenya%2Cidx%3A1-1-1" target="_blank" alt="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/library/img/li.png"></a></li>

					</ul>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<script type="text/javascript">
			
		  	$(document).ready(function(){ /*
				$('.bxslider').bxSlider({
				  slideWidth: 700,
				  auto: true,
				  autoControls: true,
				  autoStart: true,
				  mode: 'fade',
				  captions: false,
				  touchEnabled : true
				});
			});

			var slider = $('#slider').bxSlider();
			$('.bx-next, .bx-prev, .bx-pager a').click(function(){
			    // time to wait (in ms)
			    var wait = 0;
			    setTimeout(function(){
			        slider.startAuto();
			    }, wait);
			});	
			
			/*
			$(document).ready(function(){
			  $('.bxslider').bxSlider(); */
			});
			
		</script>	
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	<!--
	<ul id="social_accounts">
		<li><a href="https://www.facebook.com/pages/TendersKenya/972683082747106" target="_blank" alt="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/library/img/fb.png"></a></li>
		<li><a href="https://twitter.com/tenders_kenya" target="_blank" alt="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/library/img/tw.png"></a></li>
		<li><a href="https://www.linkedin.com/profile/view?id=377211929&authType=NAME_SEARCH&authToken=wQVJ&locale=en_US&trk=tyah&trkInfo=tarId%3A1415707846930%2Ctas%3Atenders%20kenya%2Cidx%3A1-1-1" target="_blank" alt="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/library/img/li.png"></a></li>
	</ul>
	-->
	
	</body>

</html>