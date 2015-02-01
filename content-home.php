<?php
/**
 * The page content template file
 *
 * @package _theme
 * @version 1.0
 */
?>

	<article id="<?php echo get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_content(); ?>
		
	</article><!-- #<?php echo get_post_type(); ?>-<?php the_ID(); ?> -->
