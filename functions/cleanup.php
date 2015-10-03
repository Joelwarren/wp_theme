<?php
/**
 * Clean up wp_head() and other wordpress code fixes
 *
 * Remove unnecessary <link>'s
 * Remove inline CSS used by Recent Comments widget
 * Remove inline CSS used by posts with galleries
 *
 * @package _theme
 * @version 1.0
 */

function _theme_head_cleanup() {
	// Originally from http://wpengineer.com/1438/wordpress-header/
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('init', '_theme_head_cleanup');

/**
* Remove the inline gallery styling
*/
add_filter( 'use_default_gallery_style', '__return_false' );

/**
* Remove the WordPress version from RSS feeds
*/
add_filter('the_generator', '__return_false');

/**
* Add and remove body_class() classes
*/
function _theme_body_class($classes) {
	// Add post/page slug
	if (is_single() || is_page() && !is_front_page()) {
		$classes[] = basename(get_permalink());
	}

	// Remove unnecessary classes
	$home_id_class = 'page-id-' . get_option('page_on_front');
	$remove_classes = array(
		'page-template-default',
		$home_id_class
	);
	$classes = array_diff($classes, $remove_classes);
	
	if( current_theme_supports( 'woocommerce' ) ) {
		$classes[] = 'woocommerce';
	}

	return $classes;
}
add_filter('body_class', '_theme_body_class');

/**
* Remove unnecessary dashboard widgets
*
* @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
*/
function _theme_remove_dashboard_widgets() {
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
	remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
	remove_meta_box('dashboard_primary', 'dashboard', 'normal');
	remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
}
add_action('admin_init', '_theme_remove_dashboard_widgets');

/**
* Clean up the_excerpt()
*/
function _theme_excerpt_length($length) {
	return POST_EXCERPT_LENGTH;
}

function _theme_excerpt_more($more) {
	return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', '_theme') . '</a>';
}
add_filter('excerpt_length', '_theme_excerpt_length');
add_filter('excerpt_more', '_theme_excerpt_more');

/**
* Disallow commenting on Media
*/
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );


add_action('login_head', '_theme_login_logo');
/*
 * Custom login page logo
 */
function _theme_login_logo() {
	$admin_logo = ( get_theme_mod('admin_login_logo') != '' ? get_theme_mod('admin_login_logo') : get_stylesheet_directory_uri() . '/images/login-logo.png' );
	
	echo '<style type="text/css">
		.login h1 a { 
			background-image:url(' . $admin_logo . ') !important; 
			background-size: 320px 80px !important;
			width: 320px !important; height: 80px !important; }
	</style>';
}

add_filter( 'login_headerurl', '_theme_change_login_page_url' );
/*
 * Custom login logo link to homepage
 */
function _theme_change_login_page_url( $url ) {
	return home_url();
}

add_filter('admin_footer_text', '_theme_footer_admin');  
/*
 * Add support links at bottom of admin
 */
function _theme_footer_admin() {  
	echo '<span id="footer-thankyou">Website developed by <a href="http://wiild.com.au" target="_blank">Wiild Interactive</a> | Need help? <a href="mailto:support@wiild.com.au">Email support</a></span>';  
}  

add_action('after_setup_theme', 'remove_admin_bar');
/*
 * Remove admin bar for non-admin users
 */
function remove_admin_bar() {
	if ( ! current_user_can('administrator') && !is_admin() ) {
		show_admin_bar(false);
	}
}
