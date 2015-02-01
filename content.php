<?php
/**
 * The default template for displaying content.
 *
 * @package _theme
 * @version 1.0
 */
?>

	<?php if( is_single() || is_singular(get_post_type()) ) { ?>

		<article id="<?php echo get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<header class="page-header entry-header">
				<h1 itemprop="headline" class="entry-title"><?php the_title(); ?></h1>

				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php echo do_shortcode('[post_date before=""]'); ?> <?php echo do_shortcode('[post_author_posts_link]'); ?> <?php echo do_shortcode('[post_categories before=""]'); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .page-header -->
		
			<?php if( has_post_thumbnail() ) { ?>
			<div class="feature-image">
				<?php the_post_thumbnail(); ?>
			</div><!-- .feature-image -->
			<?php } ?>

			<?php do_action( '_theme_entry_content' ); ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<footer class="entry-footer">
				
			</footer><!-- .entry-footer -->
			<?php endif; ?>
			
		</article><!-- #<?php echo get_post_type(); ?>-<?php the_ID(); ?> -->
		
	<?php } else { ?>

		<article id="<?php echo get_post_type(); ?>-<?php the_ID(); ?>" <?php post_class('excerpt'); ?>>
			
			<header class="page-header entry-header">
				<h2 itemprop="headline" class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php echo do_shortcode('[post_date before="Posted on "]'); ?> by <?php echo do_shortcode('[post_author_posts_link]'); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php do_action( '_theme_entry_content' ); ?>
			
		</article><!-- #<?php echo get_post_type(); ?>-<?php the_ID(); ?> -->

	<?php } ?>