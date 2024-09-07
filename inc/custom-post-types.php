<?php 
/**
 * Custom post types setup.
 *
 * @package understrap
 */

//Faculty custom post type

// Register Custom Post Type faculty
// Post Type Key: faculty
function create_faculty_cpt() {

  $labels = array(
    'name' => __( 'Faculty', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Faculty', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Faculty', 'textdomain' ),
    'name_admin_bar' => __( 'Faculty', 'textdomain' ),
    'archives' => __( 'Faculty Archives', 'textdomain' ),
    'attributes' => __( 'Faculty Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Parent faculty:', 'textdomain' ),
    'all_items' => __( 'All faculty', 'textdomain' ),
    'add_new_item' => __( 'Add New Faculty', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Faculty', 'textdomain' ),
    'edit_item' => __( 'Edit Faculty', 'textdomain' ),
    'update_item' => __( 'Update Faculty', 'textdomain' ),
    'view_item' => __( 'View Faculty', 'textdomain' ),
    'view_items' => __( 'View Faculty', 'textdomain' ),
    'search_items' => __( 'Search Faculty', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into faculty', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this faculty', 'textdomain' ),
    'items_list' => __( 'faculty list', 'textdomain' ),
    'items_list_navigation' => __( 'faculty list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter faculty list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'faculty', 'textdomain' ),
    'description' => __( 'the great people we work with', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'faculty', $args );
  
  // flush rewrite rules because we changed the permalink structure -----NOT FULLY TESTED !!!!!!!!!!!!!!!!!!!!!!!!!
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_faculty_cpt', 0 );


//Partner QUOTE post type

// Register Custom Post Type quotes
// Post Type Key: quote
function create_quote_cpt() {

  $labels = array(
    'name' => __( 'Quote', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Quote', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Quotes', 'textdomain' ),
    'name_admin_bar' => __( 'Quote', 'textdomain' ),
    'archives' => __( 'Quote Archives', 'textdomain' ),
    'attributes' => __( 'Quote Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Parent quote:', 'textdomain' ),
    'all_items' => __( 'All Quotes', 'textdomain' ),
    'add_new_item' => __( 'Add New Quote', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Quote', 'textdomain' ),
    'edit_item' => __( 'Edit Quote', 'textdomain' ),
    'update_item' => __( 'Update Quote', 'textdomain' ),
    'view_item' => __( 'View Quote', 'textdomain' ),
    'view_items' => __( 'View Quotes', 'textdomain' ),
    'search_items' => __( 'Search Quotes', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into quotes', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this quote', 'textdomain' ),
    'items_list' => __( 'quote list', 'textdomain' ),
    'items_list_navigation' => __( 'quote list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter quote list', 'textdomain' ),
  );

  $args = array(
    'label' => __( 'Quote', 'textdomain' ),
    'description' => __( 'comments from the great people we work with', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('revisions', 'author', 'custom-fields', 'thumbnail'),
    'taxonomies' => array('category'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-format-quote',
  );
  register_post_type( 'quote', $args );
  
  // flush rewrite rules because we changed the permalink structure 
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_quote_cpt', 0 );


//service custom post type

// Register Custom Post Type service
// Post Type Key: service

function create_service_cpt() {

  $labels = array(
    'name' => __( 'Services', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Service', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Services', 'textdomain' ),
    'name_admin_bar' => __( 'Service', 'textdomain' ),
    'archives' => __( 'Service Archives', 'textdomain' ),
    'attributes' => __( 'Service Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Service:', 'textdomain' ),
    'all_items' => __( 'All Services', 'textdomain' ),
    'add_new_item' => __( 'Add New Service', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Service', 'textdomain' ),
    'edit_item' => __( 'Edit Service', 'textdomain' ),
    'update_item' => __( 'Update Service', 'textdomain' ),
    'view_item' => __( 'View Service', 'textdomain' ),
    'view_items' => __( 'View Services', 'textdomain' ),
    'search_items' => __( 'Search Services', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into service', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this service', 'textdomain' ),
    'items_list' => __( 'Service list', 'textdomain' ),
    'items_list_navigation' => __( 'Service list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Service list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'service', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-tools',
  );
  register_post_type( 'service', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_service_cpt', 0 );


//partner custom post type

// Register Custom Post Type partner
// Post Type Key: partner

function create_partner_cpt() {

  $labels = array(
    'name' => __( 'Partners', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Partner', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Partner', 'textdomain' ),
    'name_admin_bar' => __( 'Partner', 'textdomain' ),
    'archives' => __( 'Partner Archives', 'textdomain' ),
    'attributes' => __( 'Partner Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Partner:', 'textdomain' ),
    'all_items' => __( 'All Partners', 'textdomain' ),
    'add_new_item' => __( 'Add New Partner', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Partner', 'textdomain' ),
    'edit_item' => __( 'Edit Partner', 'textdomain' ),
    'update_item' => __( 'Update Partner', 'textdomain' ),
    'view_item' => __( 'View Partner', 'textdomain' ),
    'view_items' => __( 'View Partners', 'textdomain' ),
    'search_items' => __( 'Search Partners', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into partner', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this partner', 'textdomain' ),
    'items_list' => __( 'Partner list', 'textdomain' ),
    'items_list_navigation' => __( 'Partner list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Partner list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'partner', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'revisions', 'author', 'trackbacks', 'custom-fields',),
    'taxonomies' => array('category'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'partner', $args );
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_partner_cpt', 0 );


//resource custom post type

// Register Custom Post Type resource
// Post Type Key: resource

function create_resource_cpt() {

  $labels = array(
    'name' => __( 'Resources', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Resource', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Resource', 'textdomain' ),
    'name_admin_bar' => __( 'Resource', 'textdomain' ),
    'archives' => __( 'Resource Archives', 'textdomain' ),
    'attributes' => __( 'Resource Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Resource:', 'textdomain' ),
    'all_items' => __( 'All Resources', 'textdomain' ),
    'add_new_item' => __( 'Add New Resource', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Resource', 'textdomain' ),
    'edit_item' => __( 'Edit Resource', 'textdomain' ),
    'update_item' => __( 'Update Resource', 'textdomain' ),
    'view_item' => __( 'View Resource', 'textdomain' ),
    'view_items' => __( 'View Resources', 'textdomain' ),
    'search_items' => __( 'Search Resources', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into resource', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this resource', 'textdomain' ),
    'items_list' => __( 'Resource list', 'textdomain' ),
    'items_list_navigation' => __( 'Resource list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Resource list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'resource', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail'),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-links',
  );
  register_post_type( 'resource', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_resource_cpt', 0 );


//cohort custom post type

// Register Custom Post Type cohort
// Post Type Key: cohort

function create_cohort_cpt() {

  $labels = array(
    'name' => __( 'Cohorts', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Cohort', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Cohort', 'textdomain' ),
    'name_admin_bar' => __( 'Cohort', 'textdomain' ),
    'archives' => __( 'Cohort Archives', 'textdomain' ),
    'attributes' => __( 'Cohort Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Cohort:', 'textdomain' ),
    'all_items' => __( 'All Cohorts', 'textdomain' ),
    'add_new_item' => __( 'Add New Cohort', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Cohort', 'textdomain' ),
    'edit_item' => __( 'Edit Cohort', 'textdomain' ),
    'update_item' => __( 'Update Cohort', 'textdomain' ),
    'view_item' => __( 'View Cohort', 'textdomain' ),
    'view_items' => __( 'View Cohorts', 'textdomain' ),
    'search_items' => __( 'Search Cohorts', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into cohort', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this cohort', 'textdomain' ),
    'items_list' => __( 'Cohort list', 'textdomain' ),
    'items_list_navigation' => __( 'Cohort list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Cohort list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'cohort', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'page',
    'menu_icon' => 'dashicons-groups',
  );
  register_post_type( 'cohort', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_cohort_cpt', 0 );

//add_action( 'init', 'create_pathway_taxonomies', 0 );
function create_pathway_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Pathways', 'taxonomy general name' ),
    'singular_name' => _x( 'pathway', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Pathways' ),
    'popular_items' => __( 'Popular Pathways' ),
    'all_items' => __( 'All Pathways' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Pathways' ),
    'update_item' => __( 'Update pathway' ),
    'add_new_item' => __( 'Add New pathway' ),
    'new_item_name' => __( 'New pathway' ),
    'add_or_remove_items' => __( 'Add or remove Pathways' ),
    'choose_from_most_used' => __( 'Choose from the most used Pathways' ),
    'menu_name' => __( 'pathway' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Pathways',array('tribe_events'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'pathway' ),
    'show_in_rest'          => true,
    'rest_base'             => 'pathway',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

