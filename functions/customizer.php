<?php
/**
 * Custom functions
 *
 * Setup customier options
 *
 * @package _theme
 * @version 1.0
 */
 
function _theme_customize_register($wp_customize) {

	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	
	$social_options = unserialize(SOCIAL_NETWORKS);

	// Social Links
	$wp_customize->add_section( 'social_section', array(
		'title'		=> 'Social Links',
		'priority'	=> 210,
	) );
	
	foreach( $social_options as $social => $name ) {
	
		$wp_customize->add_setting( $social, array(
			'default'	=> '',
			'sanitize_callback' => 'esc_url_raw'
		) );
		$wp_customize->add_control( $social . '_control', array(
			'label'		=> $name . ' link',
			'section'	=> 'social_section',
			'settings'	=> $social
		) );
		
	}

}
add_action( 'customize_register', '_theme_customize_register' );