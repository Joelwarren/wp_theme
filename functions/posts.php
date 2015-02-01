<?php
/**
 * Specific functionality for posts
 *
 * @package _theme
 * @version 1.0
 */
 
// add_action( '_theme_after_single_post', '_theme_single_author_content' );
// Author content
function _theme_single_author_content() {
	get_template_part( 'includes/content', 'author' );
}

add_action( '_theme_after_single_post', '_theme_single_next_prev_post' );
// Post navigation
function _theme_single_next_prev_post() {
	echo '<div class="navigation pull-right">';
	previous_post_link('%link', "<i class='icon-left-open'></i>" );
	echo ' ';
	next_post_link('%link', "<i class='icon-right-open'></i>" ); 
	echo '</div>';
}

add_filter( 'post_class', '_theme_entry_post_class' );
/**
 * Add `entry` post class, remove `hentry` post class if HTML5.
 */
function _theme_entry_post_class( $classes ) {

	//* Add "entry" to the post class array
	$classes[] = 'entry';

	//* Remove "hentry" from post class array, if HTML5
	$classes = array_diff( $classes, array( 'hentry' ) );

	return $classes;

}

add_action( '_theme_after_loop', '_theme_numeric_posts_nav' );
/**
 * Echo archive pagination in page numbers format.
 */
function _theme_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	//* Stop execution if there's only 1 page
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	//* Add current page to the array
	if ( $paged >= 1 )
		$links[] = $paged;

	//* Add the pages around the current page to the array
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="archive-pagination">';

	echo '<ul class="pagination">';

	//* Previous Post Link
	if ( get_previous_posts_link() )
		printf( '<li class="pagination-previous">%s</li>' . "\n", get_previous_posts_link( apply_filters( '_theme_prev_link_text', '&#x000AB;' . __( ' Previous Page', '_theme' ) ) ) );

	//* Link to first page, plus ellipses if necessary
	if ( ! in_array( 1, $links ) ) {

		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li class="pagination-omission">&#x02026;</li>';

	}

	//* Link to current page, plus 2 pages in either direction if necessary
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	//* Link to last page, plus ellipses if necessary
	if ( ! in_array( $max, $links ) ) {

		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="pagination-omission">&#x02026;</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );

	}

	//* Next Post Link
	if ( get_next_posts_link() )
		printf( '<li class="pagination-next">%s</li>' . "\n", get_next_posts_link( apply_filters( '_theme_next_link_text', __( 'Next Page ', '_theme' ) . '&#x000BB;' ) ) );

	echo '</ul></div>' . "\n";

}

add_action( '_theme_entry_content', '_theme_do_post_content', 10 );

function _theme_do_post_content() {
	if ( is_search() ) : ?>
		<div itemprop="text" class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div itemprop="text" class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	<?php endif;
}

add_action( '_theme_entry_content', '_theme_do_post_content_nav', 12 );
/**
 * Display page links for paginated posts (i.e. includes the <!--nextpage--> Quicktag one or more times).
 *
 * @since 2.0.0
 *
 * @uses _theme_markup() Contextual markup.
 * @uses _theme_html5()  Check for HTML5 support.
 */
function _theme_do_post_content_nav() {

	wp_link_pages( array(
		'before' => '<div class="entry-pagination pages">' . __( 'Pages:', '_theme' ),
		'after'  => '</div>'
	) );

}

add_action( '_theme_entry_content', '_theme_do_post_permalink', 14 );
/**
 * Show permalink if no title.
 *
 * If the entry has no title, this is a way to display a link to the full post.
 *
 * Applies the `_theme_post_permalink` filter.
 *
 * @since 2.0.0
 */
function _theme_do_post_permalink() {

	//* Don't show on singular views, or if the entry has a title
	if ( is_singular() || get_the_title() )
		return;

	$permalink = get_permalink();

	echo apply_filters( '_theme_post_permalink', sprintf( '<p class="entry-permalink"><a href="%s" title="%s" rel="bookmark">%s</a></p>', esc_url( $permalink ), 'Permalink', esc_html( $permalink ) ) );

}


/**
 * Get First Post Date Function
 */
function _theme_first_post_date( $format = "Y-m-d" ) {
	// Setup get_posts arguments
	$args = array(
		'numberposts' => 1,
		'post_status' => 'publish',
		'order' => 'ASC'
	);

	// Get all posts in order of first to last
	$get_all = get_posts( $args );

	if( !empty($get_all) ) {
		// Extract first post from array
		$first_post = $get_all[0];

		// Assign first post date to var
		$first_post_date = $first_post->post_date;

		// return date in required format
		$output = date( $format, strtotime($first_post_date) );

		return $output;
	} else {
		return date('Y');
	}
}

/**
 * Create copyright label from publish dates on site
 */
function _theme_copyright_year() {

	$first_year = _theme_first_post_date('Y');
	$this_year = date('Y');
	
	if( $first_year != $this_year ) {
		return 'Copyright &copy; ' . $first_year . ' - ' . $this_year . ' ' . get_bloginfo('name');
	} else {
		return 'Copyright &copy; ' . $this_year . ' ' . get_bloginfo('name');
	}
	
}