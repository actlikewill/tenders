<div id="post-<?php the_ID(); ?>" class="tenderBox_in col-md-4">
	<div class="tenderBox clearfix">
		<h5 class="tB_title clearfix">
			<?php $string = get_the_title( $post_id ); ?>
			<?php $string = (strlen($string) > 80) ? substr($string,0,70).'...' : $string; ?>

			<a class="A_list_link" href="<?php the_permalink() ?>">
				<?php echo $string; //the_title(); ?>
			</a>
		</h5>
			
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
			
									
			$tenderDocIds = [
				'tender_document_1',
				'tender_document_2',
				'tender_document_3',
				'tender_document_4'
			];
						
			$tenderDocs = add_tender_documents( $tenderDocIds );
			$tenderDocLink = get_field('link_to_tender_documents');
			$free_to_view = get_field('free_to_view');
			$sponsored = has_term('sponsored', 'document-type');


		?>

		<ul class="custom_meta custom_meta_list clean_list clearfix">

			<!--
			<li>
				<?php $strong = get_the_term_list( $post->ID, 'company', '', ', ', '' ); ?>
				<?php $strong = (strlen($string) > 60) ? substr($string,0,55).'...' : $string; ?>

			<span class="typcn typcn-home-outline"></span> <?php echo $strong ?></li>
			-->



			<?php 

				?>


			<li class="t_org"><span class="typcn typcn-home-outline"></span> <?php echo get_the_term_list( $post->ID, 'company', '', ', ', '' ); ?></li>
			<li class="t_type"><span class="typcn typcn-attachment"></span>
			<?php 
			
			$terms = get_the_term_list( $post->ID, 'document-type', '', ', ', ''); 
			$terms = explode(",",$terms);
			$filtered_terms = array_filter($terms, function($term) {
				return strpos($term, 'Sponsored') === false;
			});
				echo implode(",", $filtered_terms);
			
			?></li>
			<li class="t_type"><span class="typcn typcn-document"></span> <span class="meta_intro">DOCUMENTS: </span>
			<?php if (! empty( $tenderDocs ) || ! empty( $tenderDocLink)) { ?>
			<span class="typcn typcn-tick" style="font-size:100%;color:green"></span>
			<?php } ?>
			</li>
			<li class="t_open"><span class="typcn typcn-lock-open-outline"></span> <span class="meta_intro">OPEN: </span> 
			<?php if ( ! empty( $date ) )  { ?>
			<?php echo date('M d, Y', $time); ?>
			<?php } ?>
			</li>
			<li class="t_close"><span class="typcn typcn-lock-closed-outline"></span> <span class="meta_intro">CLOSE: </span> 
			<?php if ( ! empty($date2)) { ?>
			<?php echo date('M d, Y', $time2); ?>
			<?php } ?>
			</li>
		</ul>
		
        <div>
			<?php if ( $sponsored ) { ?>
				<a style="font-size:.9em;font-family:Roboto Condensed,sans-serif;text-transform-uppercase;background:#ef4d2d; color: white; float:right; padding: 0 5px;"><strong>SPONSORED</strong></a>
			<?php } ?>
		</div>
	</div>	
</div>	