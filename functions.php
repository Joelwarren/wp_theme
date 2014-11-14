<?php
/**
 * _theme functions and definitions
 *
 * The configuration options for the theme and initiation of the framework helper files.
 *
 * @package _theme
 * @version 1.0
 */

/** 
 * Length in words for excerpt_length filter 
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
 */
define('POST_EXCERPT_LENGTH', 40); 

// Define the social media icons for customiser & shortcode output
define('SOCIAL_NETWORKS', 
	array(
		'facebook' => 'Facebook',
		'twitter' => 'Twitter',
		'linkedin' => 'Linkedin'
	)
);

/**
* $content_width is a global variable used by WordPress for max image upload sizes
* and media embeds (in pixels).
*
* Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
* Default: 1140px is the default Bootstrap container width.
*/
if (!isset($content_width)) { $content_width = 1140; }

/**
 * Set up theme defaults and registers support for various WordPress features.
 */
function _theme_setup() {

	/**
	* Make theme available for translation
	*/
	load_theme_textdomain( '_theme', get_template_directory() . '/languages' );
	
	/**
	* Enable theme features
	*/
	add_theme_support( 'html5' );                 // Enable html5 wordpress output
	add_theme_support( 'woocommerce' );           // Enable woocommerce functions
	add_theme_support( 'bootstrap-navbar' );      // Enable Bootstrap's top navbar
	add_theme_support( 'post-thumbnails' );       // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
	add_theme_support( 'automatic-feed-links' );  // Add rss feed link
	
	// set_post_thumbnail_size(150, 150, false);      // Set thumbnail size
	// add_image_size( 'category-thumb', 300, 9999 ); // 300px wide (and unlimited height)
	
	/**
	* Add post formats
	* @link http://codex.wordpress.org/Post_Formats
	*/
	// add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

	/** 
	 * Register wp_nav_menu() menus
	 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus(array(
		'primary' => __( 'Primary Navigation', '_theme' ),
		'footer'  => __( 'Footer Navigation', '_theme' )
	));

	// Tell the TinyMCE editor to use a custom stylesheet
	add_editor_style();
}
add_action( 'after_setup_theme', '_theme_setup' );

/**
 * Framework helper includes
 */
require_once locate_template('/functions/titles.php');     // Provide context aware title for generic page templates
require_once locate_template('/functions/cleanup.php');    // Clean up wp_head() and other wordpress code fixes
require_once locate_template('/functions/comments.php');   // Functionality for comments
require_once locate_template('/functions/posts.php');      // Specific functionality for posts
require_once locate_template('/functions/post-types.php'); // Setup custom post types for the theme
require_once locate_template('/functions/scripts.php');    // The loading of all theme scripts and styles
require_once locate_template('/functions/shortcodes.php'); // Theme specific shortcodes
require_once locate_template('/functions/customizer.php'); // Setup customier options
require_once locate_template('/functions/widgets.php');    // Setup widget areas


if( current_theme_supports( 'woocommerce' ) )              // Woocommerce specific functionality (conditional)
	require_once locate_template('/functions/woocommerce.php');


if( current_theme_supports( 'bootstrap-navbar' ) )         // Load in the menu walker to support twitter bootstrap markup (conditional)
	require_once locate_template('/functions/bootstrap-navbar.php');

require_once locate_template('/functions/custom.php');     // Custom theme functionality









