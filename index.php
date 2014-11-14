<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy.
 *
 * @link http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 *
 * @package _theme
 * @version 1.0
 */
 
get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>
	
		<?php get_template_part( 'includes/loop', 'default' ); ?>

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>