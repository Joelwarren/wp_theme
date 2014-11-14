<?php
/**
 * Setup widget areas
 *
 * @package _theme
 * @version 1.0
 */
 
function _theme_widgets_init() {

	register_sidebar( array(
		'name' => __('Blog Sidebar', '_theme'),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __('Page Sidebar', '_theme'),
		'id' => 'sidebar-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer', '_theme'),
		'id' => 'footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

}
add_action( 'widgets_init', '_theme_widgets_init' );