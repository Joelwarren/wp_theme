<?php
/**
 * The template for displaying the Author archive page
 *
 * @package _theme
 * @version 1.0
 */

get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

		<main class="content-area" role="main">
			<?php get_template_part( 'includes/content', 'author' ); ?>
		
			<?php get_template_part( 'includes/loop' ); ?>
		</main><!-- /.main -->
		
		<?php get_sidebar(); ?>

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_footer(); ?>