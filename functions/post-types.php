<?php
/**
 * Setup custom post types for the theme
 *
 * @package _theme
 * @version 1.0
 */

function _theme_custom_post_types() {

	$label_singular = 'Custom Post';
	$label_plural = "Custom Posts";

	$labels = array(
		'name'                => $label_plural,
		'singular_name'       => $label_singular,
		'menu_name'           => $label_plural,
		'parent_item_colon'   => 'Parent ' . $label_singular . ':',
		'all_items'           => 'All ' . $label_plural,
		'view_item'           => 'View ' . $label_singular,
		'add_new_item'        => 'Add New ' . $label_singular,
		'add_new'             => 'New ' . $label_singular,
		'edit_item'           => 'Edit ' . $label_singular,
		'update_item'         => 'Update ' . $label_singular,
		'search_items'        => 'Search ' . $label_plural,
		'not_found'           => 'No ' . $label_plural . ' found',
		'not_found_in_trash'  => 'No ' . $label_plural . ' found in Trash'
	);
	$args = array(
		'label'               => $label_singular,
		'description'         => 'Description',
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 24,
		'menu_icon'           => 'dashicons-admin-post', // http://melchoyce.github.io/dashicons/
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	register_post_type( 'custom_post', $args );

}
// Hook into the 'init' action
add_action( 'init', '_theme_custom_post_types', 0 );

// Register Custom Taxonomy
function _theme_custom_taxonomies()  {

	$label_singular = 'Custom Category';
	$label_plural = "Custom Categories";
	
	$labels = array(
		'name'                       => $label_plural,
		'singular_name'              => $label_singular,
		'menu_name'                  => $label_plural,
		'all_items'                  => 'All ' . $label_plural,
		'parent_item'                => 'Parent ' . $label_singular,
		'parent_item_colon'          => 'Parent ' . $label_singular . ':',
		'new_item_name'              => 'New ' . $label_singular . ' Name',
		'add_new_item'               => 'Add New ' . $label_singular,
		'edit_item'                  => 'Edit ' . $label_singular,
		'update_item'                => 'Update ' . $label_singular,
		'separate_items_with_commas' => 'Separate ' . $label_plural . ' with commas',
		'search_items'               => 'Search ' . $label_plural,
		'add_or_remove_items'        => 'Add or remove ' . $label_plural,
		'choose_from_most_used'      => 'Choose from the most used ' . $label_plural
	);
	$rewrite = array(
		'slug'                       => 'custom_category',
		'with_front'                 => false,
		'hierarchical'               => false
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'query_var'                  => 'custom_category',
		'rewrite'                    => $rewrite
	);
	register_taxonomy( 'custom_category', 'custom_post', $args );

}

// Hook into the 'init' action
add_action( 'init', '_theme_custom_taxonomies', 0 );