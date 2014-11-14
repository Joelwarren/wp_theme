<?php
/**
 * The template for displaying the Author archive page
 *
 * @package _theme
 * @version 1.0
 */

get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

		<?php get_template_part( 'includes/content', 'author' ); ?>
	
		<?php get_template_part( 'includes/loop' ); ?>

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>