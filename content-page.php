<?php
/**
 * The page content template file
 *
 * @package _theme
 * @version 1.0
 */
?>

	<article id="<?php echo get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="page-header">
			<h1 itemprop="headline" class="page-title"><?php the_title(); ?></h1>
		</header><!-- .page-header -->

		<div itemprop="text" class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		
	</article><!-- #<?php echo get_post_type(); ?>-<?php the_ID(); ?> -->
