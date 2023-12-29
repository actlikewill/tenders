<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images, 
sidebars, comments, ect.
*/

// Get Bones Core Up & Running!
require_once('library/bones.php');            // core functions (don't remove)

// Shortcodes
// require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

// Custom Backend Footer
/*
add_filter('admin_footer_text', 'wp_bootstrap_custom_admin_footer');
function wp_bootstrap_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://320press.com" target="_blank">320press</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.';
}
// adding it to the admin area
add_filter('admin_footer_text', 'wp_bootstrap_custom_admin_footer');
*/

function send_newsletters() {

  require_once('inc/MailchimpAPI.php');
  $mailchimp = new \DrewM\Mailchimp\Mailchimp('75709c96b7d9abd69e61de2d82dc8fad-us13');
  $error_log_file = 'mailchimp_error_log.txt';

  $return = get_transient('newsletter_sent');

  echo '<pre style="margin-top:3rem; z-index:1000">';
  print_r($return);
  echo '</pre>';


  $campaign_data = array(
    'type' => 'regular',
    'recipients' => array(
      'list_id' => '2a4bb00624',
      'segment_opts' => array(
        'conditions' => array(
          array(
            'condition_type' => 'StaticSegment',
            'field' => 'Tags',
            'op' => 'contains',
            'value' => ['medical']
          )
        )
      ),

    ),
    'settings' => array(
      'subject_line' => 'Tenders Kenya Newsletter',
      'from_name' => 'Tenders Kenya',
      'reply_to' => 'tenders@tenderskenya.co.ke',
      'content_type' => 'html',
      'content' => '<p>Hi *|FNAME|* *|LNAME|*,</p>, <p>Here are the latest tenders from Tenders Kenya.</p>',
    ),
  );

  // $response = $mailchimp->post('campaigns', $campaign_data);

  echo '<pre style="margin-top:3rem; z-index:1000">';
  print_r($response);
  echo '</pre>';
      
  

}
add_action('init', 'send_newsletters');






add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
//    unset($fields['billing']['billing_first_name']);
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
//    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
//    unset($fields['billing']['billing_phone']);
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_email']);
//    unset($fields['billing']['billing_city']);
    return $fields;
}


add_filter ('woocommerce_add_to_cart_redirect', 'woo_redirect_to_checkout');
function woo_redirect_to_checkout() {
  $checkout_url = WC()->cart->get_checkout_url();
  return $checkout_url;
}

function check_item_before_add_to_cart_validation($passed, $product_id, $quantity) {
  // Product ID to check in the cart
  $product_id_to_check = 22;

  // Check if the product is already in the cart
  foreach (WC()->cart->get_cart() as $cart_item) {
      if ($cart_item['product_id'] == $product_id_to_check) {
          // If the product is already in the cart, redirect to the checkout page
          $checkout_url = wc_get_checkout_url();
          wp_safe_redirect($checkout_url);
          exit;
      }
  }

  return $passed;
}

add_filter('woocommerce_add_to_cart_validation', 'check_item_before_add_to_cart_validation', 10, 3);





/**
 *Reduce the strength requirement on the woocommerce password.
 *
 * Strength Settings
 * 3 = Strong (default)
 * 2 = Medium
 * 1 = Weak
 * 0 = Very Weak / Anything
 */
function reduce_woocommerce_min_strength_requirement( $strength ) {
    return 0;
}
add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );




// ADD CUSTOM POST TYPE INTO WP RSS FEED

// removes Order Notes Title - Additional Information
add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );


//remove Order Notes Field
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );
function remove_order_notes( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}

// Add a custom field to the user registration form
function custom_registration_form() {
  ?>
  <label for="industry">Preferred Category</label>
  <select name="industry" id="industry">
  <?php
      // Get terms from your taxonomy (replace 'your_taxonomy' with your actual taxonomy name)

      $terms = get_terms(array(
        'taxonomy' => 'industry',
        'hide_empty' => false,
      ));


      // Loop through terms and add options to the select field
      foreach ($terms as $term) {
        echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
      }
      ?>
  </select>

￼
  <?php
}
// add_action('woocommerce_checkout_after_customer_details', 'custom_registration_form');

// Add a custom select field to the WooCommerce checkout page for a certain product
function add_custom_select_field($fields) {
  $specific_product_id = 21; // Replace with your actual product ID
  $in_cart = false;


  foreach (WC()->cart->get_cart() as $cart_item) {
      if ($cart_item['product_id'] == $specific_product_id) {
        echo "in cart " . $cart_item['product_id'] . $cart_item['product_name'];
          $in_cart = true;
          break;
      }
  }

  // If the specific product is in the cart, add the custom select field
  if ($in_cart) {
      $taxonomy = 'industry'; // Replace with your actual taxonomy name

      // Get terms from the specified taxonomy
      $terms = get_terms(array(
          'taxonomy' => $taxonomy,
          'hide_empty' => false,
      ));

      // Create an array to store the options
      $options = array(
          '' => __('Select an option', 'woocommerce'),
      );

      // Loop through terms and add them to the options array
      foreach ($terms as $term) {
          $options[$term->term_id] = $term->name;
      }

      // Add the custom select field
      $fields['billing']['industry'] = array(
          'type' => 'select',
          'label' => __('Industry Category', 'woocommerce'),
          'class' => array('form-row-wide'),
          'required' => true, // Set to true if the field is required
          'options' => $options,
          'multiple' => 'multiple',
      );
  }

  return $fields;
}
add_filter('woocommerce_checkout_fields', 'add_custom_select_field');



// Save the selected taxonomy term to user meta during checkout
function save_custom_registration_field($customer_id) {

  // Get the selected term from the submitted form data
  $industry = sanitize_text_field($_POST['industry']);
  // Update user meta with the selected term
  update_user_meta($customer_id, 'industry', $industry);
}
add_action('woocommerce_checkout_update_user_meta', 'save_custom_registration_field');

// Display the selected taxonomy term on the order details page
function display_custom_field_on_order_details($order_id) {
  $user_id = get_post_meta($order_id, '_customer_user', true);

  // Check if the user has the preferred_category meta
  if ($user_id && $industry = get_user_meta($user_id, 'industry', true)) {
    echo '<p><strong>Industry:</strong> ' . esc_html($industry) . '</p>';
  }
}
add_action('woocommerce_order_details_after_customer_details', 'display_custom_field_on_order_details');



// AUTO COMPLETE ORDER?

/*
 * Autocomplete Paid Orders (WC 2.2+)


add_filter( 'woocommerce_payment_complete_order_status', 'bryce_wc_autocomplete_paid_paypal_orders' );
function bryce_wc_autocomplete_paid_lipa_na_mpesa_orders( $order_status, $order_id ) {
  
  $order = wc_get_order( $order_id );
  if ( $order->payment_method == 'lipa_na_mpesa' ) {
      if ( $order_status == 'processing' && ( $order->status == 'on-hold' || $order->status == 'pending' || $order->status == 'failed' ) ) {
        return 'completed';
      }
  }
  return $order_status;
}


add_filter( 'woocommerce_payment_complete_order_status', 'rfvc_update_order_status', 10, 2 );
function rfvc_update_order_status( $order_status, $order_id ) {
 $order = new WC_Order( $order_id );
 if ( 'processing' == $order_status && ( 'on-hold' == $order->status || 'pending' == $order->status || 'failed' == $order->status ) ) {
  return 'completed';
  }
  return $order_status;
}
 */







// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;

add_filter('deprecated_constructor_trigger_error', '__return_false');

// CREATE ITINERARIES POST TYPE

add_action( 'init', 'create_tenders' );

function create_tenders() {
register_post_type( 'tenders',
  array(
    'labels' => array(
    'name' => 'Tenders',
    'singular_name' => 'Tender',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Tender',
    'edit' => 'Edit',
    'edit_item' => 'Edit Tender',
    'new_item' => 'New Tender',
    'view' => 'View',
    'view_item' => 'View Tender',
    'search_items' => 'Search Tenders',
    'not_found' => 'No Tender found',
    'not_found_in_trash' => 'No Tender found in Trash',
    'parent' => 'Parent Tender'
    ),
  'show_in_rest' => true,
  'public' => true,
  'menu_position' => 5,
  'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
  'taxonomies' => array( '' ),
  'rewrite' => array( 'slug' => 'tender', 'with_front' => false ), 
  // 'rewrite' => array( 'slug' => 'tender/%post_id%', 'with_front' => false ), 
  /*
  'rewrite' => array(
          'with_front' => false,
          'slug' => 'tender/%post_id%/%postname%'
      ),
  */    
  'has_archive' => true
  )
);
}

function register_rest_fields_for_tenders() {

  if (function_exists('current_user_can')) {
    if (current_user_can('administrator')) {
      register_rest_field('tenders', 'tender_images', array(
        'get_callback' => function($object) {
          return array(
            'image_1' => get_field('tender_image', $object['id']),
            'image_2' => get_field('tender_image_2', $object['id']),
            'company' => wp_get_post_terms($object['id'], 'company'),
            'document-type' => wp_get_post_terms($object['id'], 'document-type')
          );
        },
        'update_callback' => null,
        'schema' => null
      ));
    } else {
      status_header(403);
      die('Only administrators can access this endpoint.');

    }

  } 


}

add_action('rest_api_init', 'register_rest_fields_for_tenders');

function add_custom_taxonomies() {
  register_taxonomy('company', 'tenders', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Companies', 'taxonomy general name' ),
      'singular_name' => _x( 'Company', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Companies' ),
      'all_items' => __( 'All Companies' ),
      'parent_item' => __( 'Parent Company' ),
      'parent_item_colon' => __( 'Parent Company:' ),
      'edit_item' => __( 'Edit Company' ),
      'update_item' => __( 'Update Company' ),
      'add_new_item' => __( 'Add New Company' ),
      'new_item_name' => __( 'New Company Name' ),
      'menu_name' => __( 'Companies' ),
    ),
    'rewrite' => array(
      'slug' => 'company', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));

  register_taxonomy('document-type', 'tenders', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Document Types', 'taxonomy general name' ),
      'singular_name' => _x( 'Document Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Document Types' ),
      'all_items' => __( 'All Document Types' ),
      'parent_item' => __( 'Parent Document Type' ),
      'parent_item_colon' => __( 'Parent Document Type:' ),
      'edit_item' => __( 'Edit Document Type' ),
      'update_item' => __( 'Update Document Type' ),
      'add_new_item' => __( 'Add New Document Type' ),
      'new_item_name' => __( 'New Document Type Name' ),
      'menu_name' => __( 'Document Types' ),
    ),
    'rewrite' => array(
      'slug' => 'document-type', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));

  register_taxonomy('industry', 'tenders', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Industry', 'taxonomy general name' ),
      'singular_name' => _x( 'Industries', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Industries' ),
      'all_items' => __( 'All Industries' ),
      'parent_item' => __( 'Parent Industries' ),
      'parent_item_colon' => __( 'Parent Industry:' ),
      'edit_item' => __( 'Edit Industry' ),
      'update_item' => __( 'Update Industry' ),
      'add_new_item' => __( 'Add New Industry' ),
      'new_item_name' => __( 'New Industry Name' ),
      'menu_name' => __( 'Industries' ),
    ),
    'rewrite' => array(
      'slug' => 'industry', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));




}
add_action( 'init', 'add_custom_taxonomies', 0 );



/*
add_filter('post_type_link', 'custom_post_type_link', 1, 3);
function custom_post_type_link($post_link, $post = 0, $leavename = false) {

    if ($post->post_type == 'tenders')) {
        return str_replace('%post_id%', $post->ID, $post_link);
    } else {
        return $post_link;
    }
}
*/



/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 780, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function wp_bootstrap_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => 'Main Sidebar',
    	'description' => 'Used on every page BUT the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
    	'id' => 'sidebar2',
    	'name' => 'Page Sidebar',
    	'description' => 'Used only on the homepage page template.',
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
      'id' => 'footer1',
      'name' => 'Footer 1',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer2',
      'name' => 'Footer 2',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer3',
      'name' => 'Footer 3',
      'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));
    
    
    /* 
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call 
    your new sidebar just use the following code:
    
    Just change the name to whatever your new
    sidebar's id is, for example:
    
    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php
    
    */
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function wp_bootstrap_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-author vcard clearfix">
				<div class="avatar col-sm-3">
					<?php echo get_avatar( $comment, $size='75' ); ?>
				</div>
				<div class="col-sm-9 comment-text">
					<?php printf('<h4>%s</h4>', get_comment_author_link()) ?>
					<?php edit_comment_link(__('Edit','wpbootstrap'),'<span class="edit-comment btn btn-sm btn-info"><i class="glyphicon-white glyphicon-pencil"></i>','</span>') ?>
                    
                    <?php if ($comment->comment_approved == '0') : ?>
       					<div class="alert-message success">
          				<p><?php _e('Your comment is awaiting moderation.','wpbootstrap') ?></p>
          				</div>
					<?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
                    
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
			</div>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
<?php 

}

/************* SEARCH FORM LAYOUT *****************/

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">
	' . '<p>' . __( "This post is password protected. To view it please enter your password below:" ,'wpbootstrap') . '</p>' . '
	<label for="' . $label . '">' . __( "Password:" ,'wpbootstrap') . ' </label><div class="input-append"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn btn-primary" value="' . esc_attr__( "Submit",'wpbootstrap' ) . '" /></div>
	</form></div>
	';
	return $o;
}

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );

function my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag clould output so that it can be styled by CSS
function add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";

    foreach( $tags as $tag ) {
    	$tagn[] = preg_replace($regex, "('$1$2 label tag-'.get_tag($2)->slug.'$3')", $tag );
    }

    $taglinks = implode('</a>', $tagn);

    return $taglinks;
}

add_action( 'wp_tag_cloud', 'add_tag_class' );

add_filter( 'wp_tag_cloud','wp_tag_cloud_filter', 10, 2) ;

function wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link
function remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Add the Meta Box to the homepage template
function add_homepage_meta_box() {  
	global $post;

	// Only add homepage meta box if template being used is the homepage template
	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
	$post_id = $post->ID;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

	if ( $template_file == 'page-homepage.php' ){
	    add_meta_box(  
	        'homepage_meta_box', // $id  
	        'Optional Homepage Tagline', // $title  
	        'show_homepage_meta_box', // $callback  
	        'page', // $page  
	        'normal', // $context  
	        'high'); // $priority  
    }
}

add_action( 'add_meta_boxes', 'add_homepage_meta_box' );

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
    array(  
        'label'=> 'Homepage tagline area',  
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
        'id'    => $prefix.'tagline',  
        'type'  => 'textarea' 
    )  
);  

// The Homepage Meta Box Callback  
function show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
    
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
      // get value of this field if it exists for this post  
      $meta = get_post_meta($post->ID, $field['id'], true);  
      // begin a table row with  
      echo '<tr> 
              <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
              <td>';  
              switch($field['type']) {  
                  // text  
                  case 'text':  
                      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;
                  
                  // textarea  
                  case 'textarea':  
                      echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;  
              } //end switch  
      echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function save_homepage_meta( $post_id ) {  

    global $custom_meta_fields;  
  
    // verify nonce  
    if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
        return $post_id;

    // check autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
    }
  
    // loop through fields and save the data  
    foreach ( $custom_meta_fields as $field ) {
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    } // end foreach
}
add_action( 'save_post', 'save_homepage_meta' );

// Add thumbnail class to thumbnail links
function add_class_attachment_link( $html ) {
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    return $html;
}
add_filter( 'wp_get_attachment_link', 'add_class_attachment_link', 10, 1 );

// Menu output mods
class Bootstrap_walker extends Walker_Nav_Menu{

  function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0){

	 global $wp_query;
	 $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	 $class_names = $value = '';
	
		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) {
			$class_names = "dropdown ";
		}
	
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
       
   	$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

   	$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
   	$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
   	$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
   	$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

   	// if the item has children add these two attributes to the anchor tag
   	// if ( $args->has_children ) {
		  // $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
    // }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
    $item_output .= $args->link_after;

    // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
    	$item_output .= '<b class="caret"></b></a>';
    }
    else {
    	$item_output .= '</a>';
    }

    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
  } // end start_el function
        
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
      
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
        $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }        
}

add_editor_style('editor-style.css');

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
	}
  
  return $classes;
}

// enqueue styles
if( !function_exists("theme_styles") ) {  
    function theme_styles() { 
        // This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
        wp_register_style( 'bootstrap', get_template_directory_uri() . '/library/css/bootstrap.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'bootstrap' );

        // For child themes
        wp_register_style( 'wpbs-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'wpbs-style' );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

// enqueue javascript
if( !function_exists( "theme_js" ) ) {  
  function theme_js(){
  
    wp_register_script( 'bootstrap', 
      get_template_directory_uri() . '/library/js/bootstrap.min.js', 
      array('jquery'), 
      '1.2' );
  
    wp_register_script( 'wpbs-scripts', 
      get_template_directory_uri() . '/library/js/scripts.js', 
      array('jquery'), 
      '1.2' );
  
    wp_register_script(  'modernizr', 
      get_template_directory_uri() . '/library/js/modernizr.full.min.js', 
      array('jquery'), 
      '1.2' );
  
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('wpbs-scripts');
    wp_enqueue_script('modernizr');
    
  }
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

add_filter( 'all_plugins', 'hide_plugins');
function hide_plugins($plugins)
{
		// Hide Ezoic
		if(is_plugin_active('ezoic-integration/ezoic-integration.php')) {
				unset( $plugins['ezoic-integration/ezoic-integration.php'] );
		}
		// Hide Akismet Plugin
		if(is_plugin_active('akismet/akismet.php')) {
				unset( $plugins['akismet/akismet.php'] );
		}
		return $plugins;
}

function add_tender_documents( $docIds) {
  $tenderDocs = [];
  foreach( $docIds as $docId) {
    $doc = get_field($docId);
    if ( ! empty( $doc ) ) {									
      array_push( $tenderDocs, $doc);
    }
  }
  return $tenderDocs;
}	

?>
