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
$body_class = 'page-wide';
 
get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

		<main class="content-area" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'home' ); ?>

			<?php endwhile; ?>
		</main><!-- /.main -->

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_footer(); ?>