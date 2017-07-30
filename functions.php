<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'avada-stylesheet' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );


if ( ! function_exists('cpt_jobs') ) {

// Register Custom Post Type - Jobs
function cpt_jobs() {

	$labels = array(
		'name'                  => _x( 'Work in Kawai Purapura', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Job', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Jobs', 'text_domain' ),
		'name_admin_bar'        => __( 'Jobs', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Job', 'text_domain' ),
		'description'           => __( 'Jobs available in Kawai Purapura', 'text_domain' ),
		'labels'                => $labels,
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-hammer',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'jobs', $args );

}
add_action( 'init', 'cpt_jobs', 0 );

}

if ( ! function_exists('cpt_rooms') ) {

// Register Custom Post Type - Rooms
function cpt_rooms() {

	$labels = array(
		'name'                  => _x( 'Rooms', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Room', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Rooms', 'text_domain' ),
		'name_admin_bar'        => __( 'Rooms', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Room', 'text_domain' ),
		'description'           => __( 'Rooms of Kawai Purapura', 'text_domain' ),
		'labels'                => $labels,
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'rooms', $args );

}
add_action( 'init', 'cpt_rooms', 0 );

}

/*
 * The Events Calendar - Add 'tags' support to organizers
*/
function tribe_modify_organizer() {
 
    $tribe_organizer_args = get_post_type_object('tribe_organizer');
    $tribe_organizer_args->taxonomies = array('tribe_events_cat');
 
    register_post_type( 'tribe_organizer', $tribe_organizer_args );
}
add_action( 'init', 'tribe_modify_organizer', 100 );

// Register jobs and rooms settings
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Jobs Page Settings',
		'menu_title' 	=> 'Jobs Settings',
		'parent_slug' 	=> 'edit.php?post_type=jobs',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Rooms Page Settings',
		'menu_title' 	=> 'Rooms Settings',
		'parent_slug' 	=> 'edit.php?post_type=rooms',
	));
}

// Create shortcode to list organizers
// Add Shortcode
function list_tribe_organizers_shortcode($atts) {
	extract( shortcode_atts( 
		array(
	    	'filter' => 'all',
	    	'category' => 'all',
	    	'id' => 0
		), $atts )
	); 

	$content;
	$organizer_permalink = [];
	$organizer_titles = [];
	$organizer_images = [];
	$organizer_content;
	$organizer_ids = tribe_get_organizer_ids();
	$multiple_organizers = count( $organizer_ids ) > 1;

	if ($filter == 'current') {

		foreach ( $organizer_ids as $organizer_id ) {
			array_push($organizer_permalink, tribe_get_organizer_link( $organizer_id, false ));
			array_push($organizer_titles, get_the_title( $organizer_id ));
			array_push($organizer_images, get_the_post_thumbnail( $organizer_id ));
		}	
	} else {
		// Get all organizers
		if ($id != 0) {
			array_push($organizer_permalink, get_the_permalink($id));
			array_push($organizer_titles, get_the_title($id));
			array_push($organizer_images, get_the_post_thumbnail($id));
		} elseif ($category == 'all') {
			$args = array(
				'post_type' => 'tribe_organizer',
				'posts_per_page' => -1
			);
		} else {
			$args = array(
				'post_type' => 'tribe_organizer',
				'posts_per_page' => -1,
				'tax_query' => array(
			        array (
			            'taxonomy' => 'tribe_events_cat',
			            'field' => 'slug',
			            'terms' => $category,
			        )
			    ),
			);
		}
	
		$the_query = new WP_Query( $args );
		// Get Titles and Images
		if ( $the_query->have_posts() ) { 
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				array_push($organizer_permalink, get_the_permalink());
				array_push($organizer_titles, get_the_title());
				array_push($organizer_images, get_the_post_thumbnail());
		}
			/* Restore original Post Data */
			wp_reset_postdata();
		}
	}

	if ($id != 0) {
		$countOrganizers = $organizer_ids;
	} else {
		$countOrganizers = $organizer_titles;
	}

	for ($i = 0; $i <= count($countOrganizers); $i++) {
		if ($organizer_titles[$i]) {
			if ($id != 0) {
				$organizer_content .= '<div class="tribe-organizer tribe-organizer-single">';
			} else {
				$organizer_content .= '<div class="tribe-organizer">';
			}
		   		$organizer_content .= '<a href="'.$organizer_permalink[$i].'">';
			    	$organizer_content .= '<div class="tribe-organizer-image">';
			    		$organizer_content .= $organizer_images[$i];
			    	$organizer_content .= '</div>';
			    	$organizer_content .= '<h4 class="tribe-organizer-title">';
			    		$organizer_content .= $organizer_titles[$i];
			    	$organizer_content .= '</h4>';
			    $organizer_content .= '</a>';
		    $organizer_content .= '</div>';
		}
	}

	$content .= '<div class="list-tribe-organizers">';
	$content .= $organizer_content;
	$content .= '</div>';

	return $content;

}
add_shortcode( 'list_tribe_organizers', 'list_tribe_organizers_shortcode' );

