<?php
/**
 * Theme specific shortcodes
 *
 * @package _theme
 * @version 1.0
 */
 
function _theme_shortcode_empty_paragraph_fix( $content ) {

	$array = array (
		'<p>[' => '[',
		']</p>' => ']',
		']<br />' => ']'
	);

	$content = strtr( $content, $array );

	return $content;
}

add_filter( 'acf_the_content', '_theme_shortcode_empty_paragraph_fix' );
add_filter( 'the_content', '_theme_shortcode_empty_paragraph_fix' );

require_once locate_template('/functions/shortcodes/posts.php');
require_once locate_template('/functions/shortcodes/social-links.php');