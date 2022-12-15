<?php
/*
Plugin Name: MyFunctions Plugin
Plugin URI: http://eugenenyawara.com
Description: Site Custom Functionality Code
Version: 1.1
Author: Ujo Nyawara
Author URI: http://eugenenyawara.com/
*/

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
	'public' => true,
	'menu_position' => 5,
	'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
	'taxonomies' => array( '' ),
	'rewrite' => array( 'slug' => 'tender', 'with_front' => false ),
	'has_archive' => true
	)
);
}

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




}
add_action( 'init', 'add_custom_taxonomies', 0 );



// Register datepicker ui for properties
function admin_homes_for_sale_javascript(){
    global $post;
    if($post->post_type == 'homes-for-sale' && is_admin()) {
        wp_enqueue_script('jquery-ui-datepicker', WP_CONTENT_URL . '/themes/philosophy/js/jquery-ui-datepicker.min.js');  
    }
}
add_action('admin_print_scripts', 'admin_homes_for_sale_javascript');

// Register ui styles for properties
function admin_homes_for_sale_styles(){
    global $post;
    if($post->post_type == 'homes-for-sale' && is_admin()) {
        wp_enqueue_style('jquery-ui', WP_CONTENT_URL . '/themes/philosophy/css/jquery-ui-1.8.11.custom.css');  
    }
}
add_action('admin_print_styles', 'admin_homes_for_sale_styles');




?>


