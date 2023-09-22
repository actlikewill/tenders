	</div>
	<div id="footer_container">
		<div class="container">
			<footer role="contentinfo">
			
				<div id="inner-footer" class="clearfix">

		          <div id="widget-footer" class="clearfix row">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>
					
					<nav class="clearfix">
						<?php wp_bootstrap_footer_links(); // Adjust using Menus in Wordpress Admin ?>
					</nav>
					
					<p class="center">All Rights Reserved. TendersKenya &copy; <?php echo date("Y") ?> | By <a href="http://klay-klay.com" target="_blank" title="Klay-klay">Klay-klay</a></p>
				
				</div> <!-- end #inner-footer -->
				
			</footer> <!-- end footer -->
		
		</div> <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<script type="text/javascript">
			
		  	$(document).ready(function(){
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
			  $('.bxslider').bxSlider();
			});
			*/
		</script>	
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

	<ul id="social_accounts">
		<li><a href="https://www.facebook.com/pages/TendersKenya/972683082747106" target="_blank" alt="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/library/img/fb.png"></a></li>
		<li><a href="https://twitter.com/tenders_kenya" target="_blank" alt="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/library/img/tw.png"></a></li>
		<li><a href="https://www.linkedin.com/profile/view?id=377211929&authType=NAME_SEARCH&authToken=wQVJ&locale=en_US&trk=tyah&trkInfo=tarId%3A1415707846930%2Ctas%3Atenders%20kenya%2Cidx%3A1-1-1" target="_blank" alt="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/library/img/li.png"></a></li>
	</ul>
	
	</body>

</html>