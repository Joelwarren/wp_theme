<?php
/**
 * Template for displaying Search Results pages
 *
 * @package _theme
 * @version 1.0
 */
 
get_header(); ?>

	<?php get_template_part( 'includes/wrapper', 'start' ); ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php 
					global $wp_query;
					$total_results = $wp_query->found_posts;
					( $total_results == '1' ) ? $items = __( 'Item', '_theme' ) : $items = __( 'Items', '_theme' ); 
					
					echo sprintf( __( 'Your Search For', '_theme' ) . ': <em>%s</em>, ' . __( 'returned:', '_theme' ) . ' <em>%s %s</em> ', get_search_query(), $total_results, $items);
				?>
			</h1>
		</header>

		<?php get_template_part( 'includes/loop' ); ?>

	<?php get_template_part( 'includes/wrapper', 'end' ); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>