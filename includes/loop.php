<?php
/**
 * Template to run through the wordpress loop
 *
 * @package _theme
 * @version 1.0
 */
?>

	<?php if ( have_posts() ) : ?>

		<?php do_action( '_theme_before_loop' ); ?>
		
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_type() ); ?>

		<?php endwhile; ?>

		<?php do_action( '_theme_after_loop' ); ?>

	<?php else : ?>
	
		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>