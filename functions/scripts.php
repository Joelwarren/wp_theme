<?php
/**
 * The loading of all theme scripts and styles
 *
 * @package _theme
 * @version 1.0
 */

function _theme_scripts() {
	$user = wp_get_current_user();
	if (!is_admin()) {
		
		wp_register_script( 'modernizr',      get_stylesheet_directory_uri() . '/js/vendor/modernizr.min.js',   array(), '2.7.1');
		
		wp_register_script( '_theme_plugins', get_stylesheet_directory_uri() . '/js/build/plugins.min.js',      array('jquery'), '1.0.0');
		
		wp_register_script( '_theme_scripts', get_stylesheet_directory_uri() . '/js/build/scripts.min.js',      array('jquery'), '1.0.0', true);
		
		if ( is_single() && comments_open() && get_option('thread_comments') ) {
			wp_enqueue_script('comment-reply');
		}
		
		// Stylesheets
		wp_enqueue_style( '_theme_styles',    get_stylesheet_directory_uri() . '/style.css',  array(), '1.0', 'all');
		wp_enqueue_style( '_theme_custom',    get_stylesheet_directory_uri() . '/custom.css', array(), '1.0', 'all');
		
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( '_theme_plugins' );
		wp_enqueue_script( '_theme_scripts' );
	}
}
add_action( 'wp_enqueue_scripts', '_theme_scripts', 100 );


if ( WP_LOCAL_SERVER ) {
	add_action( 'wp_enqueue_scripts', '_theme_dev_livereload' );
	function _theme_dev_livereload(){
		wp_enqueue_script( 'livereload', 'http://' . $_SERVER['SERVER_NAME'] . '/livereload.js', '', null, true );
	}
}