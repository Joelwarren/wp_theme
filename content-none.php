<?php
/**
 * The template for displaying no content
 *
 * @package _theme
 * @version 1.0
 */
?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h1 class="entry-title">Nothing Found</h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p>Ready to publish your first post? <a href="<?php echo admin_url( 'post-new.php' ); ?>">Get started here</a></p>

			<?php elseif ( is_search() ) : ?>

				<p>Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->