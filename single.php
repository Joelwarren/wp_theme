<?php
/**
 * The Template for displaying all single posts.
 *
 * @package _theme
 * @version 1.0
 */

get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

		<main class="content-area" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_type() ); ?>
				
				<?php do_action('_theme_after_single_post'); ?>

				<?php if( comments_open() )
					comments_template(); 
				?>

			<?php endwhile; ?>
		</main><!-- /.main -->
		
		<?php get_sidebar(); ?>

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_footer(); ?>