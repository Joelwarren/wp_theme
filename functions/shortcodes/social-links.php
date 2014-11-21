<?php
/**
 * Social links shortcode
 *
 * @package _theme
 * @version 1.0
 */
 
add_shortcode( 'social_links', '_theme_social_links_shortcode' );
/**
 * Social media links
 */
function _theme_social_links_shortcode( $atts ) {

	$defaults = array();

	$atts = shortcode_atts( $defaults, $atts, 'social_links' );
	
	$social_options = unserialize(SOCIAL_NETWORKS);
	
	$output = '<ul class="social-links">';
	foreach( $social_options as $social => $name ) {
		if( get_theme_mod($social) ) { 
			$output .= '	<li class="' . $social . '"><a href="' . get_theme_mod($social) . '">' . $name . '</a></li>'; 
		}
	}
	$output .= '</ul>';

	return apply_filters( '_theme_social_links_shortcode', $output, $atts );

}