<?php get_header(); ?>



<style type="text/css">

	form.protected-post-form > p {
	    display: none;
	}	
	form.protected-post-form input {
	    padding: 6px;
	    border-radius: 5px;
	    border: 2px solid #CCC;
	    margin-right: 10px;
	}
	ul.clean_list {
		list-style: none;
		padding-left: 0px;
	}		
	.tenders_notice {
	    padding: 100px 0px;
	}
	form.protected-post-form {
	    width: 350px;
	    margin: 0 auto;
	}
	form.protected-post-form label {
	    float: left;
	    margin-top: 7px;
	    font-size: 1.3em;
	    font-weight: 400;
	}
	.tenders_notice h3 {
	    border-top: 1px dashed #ef4d2d;
	    padding-top: 20px;
	    margin-top: 30px;
	}
	li.mbesha img {
	    width: 300px;
	    height: auto;
	}
	form.protected-post-form input.btn-primary {
	    background: #ef4d2d;
	    border: 1px solid #ef4d2d;
	}
	form.protected-post-form input.btn-primary:hover {
	    background: #f7901e;
	    border: 1px solid #f7901e;
	}


	.woocommerce.clearfix2 {
	    position: relative;
	    float: left;
	    width: 100%;
	    text-align: center;
	}
	.main_single_header.headerA {
	    width: 100%;
	    float: left;
	    clear: both;
	}

	p.l_mpesa {
	    text-align: center;
	}
	.login_woo ul {
	    text-align: center;
	}
	.login_woo ul li {
	    display: inline-table;
	}
	.login_woo ul li a {
	    background: #f68224;
	    color: #FFF;
	    padding: 10px 30px;
	}
	.login_woo ul li a:hover {
	    background: #000;
	}
	.woocommerce-info.wc-memberships-restriction-message.wc-memberships-message.wc-memberships-content-restricted-message h3 {
	    font-weight: 400;
	}
	.woocommerce {
	    margin-bottom: 100px;
	}

</style>



	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				<div class="clearfix row main_single_header_container">
		<?php
$exists = function_exists('wc_memberships_is_user_active_member');
var_dump($exists);
?>


  <?php /*
  	

	// get membership plans
	$plans = wc_memberships_get_membership_plans();

	// set a flag
	$active_member = array();

	// check if the member has an active membership for any plan
	foreach ( $plans as $plan ) {
	    $active = wc_memberships_is_user_active_member( get_current_user_id(), $plan );
	    array_push( $active_member, $active );
	}
	*/
	
	
	$sponsored = has_term('sponsored', 'document-type');

	$user_id = get_current_user_id();

	if ( is_user_logged_in() && wc_memberships_is_user_active_member( $user_id, 'annual-subscription-plan') || current_user_can('administrator') || $sponsored ) { ?>

		<div class="col-sm-10 col-sm-offset-0 main_single_header headerA clearfix" role="main">
			<header>
				<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
			</header>


			<?php 
				//make sure you are writing this inside a wordpress loop
				global $post;

				echo do_shortcode('[​cbxwpbookmarkbtn object_id="'.$post->ID.'" object_type="'.$post->post_type.'"]');

				global $post;

$post_id    = $post->ID;
$post_type  = $post->post_type;
if(function_exists('show_cbxbookmark_btn')){
 echo show_cbxbookmark_btn($post_id, $post_type);
}

			?>



			<ul class="custom_meta custom_meta_list_single clearfix">
				<li><span class="typcn typcn-home-outline"></span> <?php echo get_the_term_list( $post->ID, 'company', '', ', ', '' ); ?></li>
				<li><span class="typcn typcn-attachment"></span><?php echo get_the_term_list( $post->ID, 'document-type', '', ', ', '' ); ?></li>
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
				<li><span class="typcn typcn-lock-open-outline"></span> <span class="meta_intro">OPEN: </span>
				<?php if (! empty( $date )) { ?>
				<?php echo date('M d, Y', $time); ?>
				<?php } ?>
				</li>
				<li><span class="typcn typcn-lock-closed-outline"></span> <span class="meta_intro">CLOSE: </span>
				<?php if( ! empty( $date2 )) { ?>
				<?php echo date('M d, Y', $time2); ?>
				<?php } ?>
				</li>
				
				<?php if($sponsored) { ?>
					<li><span style="display:flex;"><span class="typcn typcn-eye-outline"></span> <span class="meta_intro">VIEWS: </span>
					<?php if( function_exists( 'pvc_post_views' )) { ?>
					<?php echo pvc_post_views($post_id = get_the_ID(), $echo = true); ?>
					<?php } ?></span>
					</li>
				<?php }?>
				
			</ul>

		</div>

		<div id="main" class="col-sm-8 col-sm-offset-2 clearfix" role="main">

		
			<section class="post_content clearfix" itemprop="articleBody">
				<div class="tender_image">Our Facebook
						<?php
						$tenderImg = get_field('tender_image');
						$tenderImg2 = get_field('tender_image_2');
						$tenderImg3 = get_field('tender_image_3');
						$tenderDsc = get_field('short_description_of_tender');						
						$tenderDocIds = [
							'tender_document_1',
							'tender_document_2',
							'tender_document_3',
							'tender_document_4',
							'tender_document_5',
							'tender_document_6'
						];
						
						$tenderDocs = add_tender_documents( $tenderDocIds );
						
						$tenderDocLink = get_field('link_to_tender_documents');

						if ( $tenderDsc != '' ) { ?>
						
							<div class="tender_Dsc" style="padding:15px;"><?php the_field('short_description_of_tender') ?></div>
						<?php } elseif ( $tenderImg != '' ) { ?>
							<img src="<?php the_field('tender_image') ?>">

							<?php if ( $tenderImg2 != '' ) { ?>
								<img src="<?php the_field('tender_image_2') ?>">
							<?php } ?>
							
							<?php if ( $tenderImg3 != '' ) { ?>
								<img src="<?php the_field('tender_image_3') ?>">
							<?php } ?>


						<?php } else {
							the_post_thumbnail( 'large' );
						} 
						if ( ! empty( $tenderDocs)) {
							?>
							<hr>
							<h4><strong>Download Tender Documents:</strong></h4>
							<small>(Click the link to Download)</small><br><br>
							<?php foreach ( $tenderDocs as $tenderDoc ) { ?>
							&#8226; <a href="<?php echo $tenderDoc['url'] ?>" download><?php echo $tenderDoc['title'] ?></a>
							<br>
							<?php } ?>
						<?php } 
							if ( ! empty( $tenderDocLink )) { ?>

							<hr>

							<h4><strong>Link To Tender Documents Page:</strong></h4>
							<small>(Link will open a new window)</small><br><br>
							<a href="<?php echo $tenderDocLink ?>" target="_blank" rel="noopener noreferrer"><?php echo $tenderDocLink ?></a>
							<?php } ?>


						
				</div>
			</section>	
		</div>  

	<?php } else { ?>

		<div class="col-sm-10 col-sm-offset-1 clearfix">
			<?php the_content(); ?>
		</div>	

	<?php } ?>

	





							

							<?php // get_sidebar(); ?>	
						

						<?php // the_content(); ?>

				</div>	
			</article> <!-- end article -->
					<?php // comments_template('',true); ?>
			<!-- </div> --> <!-- end #content -->

<?php endwhile; ?>			
<?php else : ?>
<?php endif; ?>


<?php get_footer(); ?>