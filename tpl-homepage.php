<?php
/**
 * A custom template for the homepage
 *
 * @package _theme
 * @version 1.0
 */
 
/*
 Template Name: Homepage
*/
 
get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; ?>

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_footer(); ?>