<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package _theme
 * @version 1.0
 */

get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

			<header class="page-header">
				<h1 class="page-title">Error: 404 - Page not found</h1>
			</header><!-- .page-header -->
				
			<article id="post-0" class="post error404 not-found">
				
				<div class="entry-content">
					<p>Sorry, but the page you were trying to view does not exist.</p>
					<p>It looks like this was the result of either:</p>
					<ul>
						<li>a mistyped address</li>
						<li>an out-of-date link</li>
					</ul>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>