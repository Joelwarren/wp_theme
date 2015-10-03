<?php
/**
 * The template for displaying archive pages
 *
 * @package _theme
 * @version 1.0
 */

get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

		<main class="content-area" role="main">
			<header class="page-header">
				<h1 class="page-title">
					<?php 
					/* 
					 * Get the appropriate title for the page loaded
					 * this function is documented in functions/title.php
					 */
					echo _theme_title(); ?>
				</h1>
			</header>

			<?php get_template_part( 'includes/loop' ); ?>
		</main><!-- /.main -->
		
		<?php get_sidebar(); ?>

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_footer(); ?>