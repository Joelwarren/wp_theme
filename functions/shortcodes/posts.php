<?php
/**
 * Specific shortcodes for posts
 *
 * @package _theme
 * @version 1.0
 */
 
add_shortcode( 'post_date', '_theme_post_date_shortcode' );
/**
 * Produces the date of post publication.
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is empty string),
 *   format (date format, default is value in date_format option field),
 *   label (text following 'before' output, but before date).
 *
 * Output passes through '_theme_post_date_shortcode' filter before returning.
 *
 * @since 0.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 * @return string Shortcode output
 */
function _theme_post_date_shortcode( $atts ) {

	$defaults = array(
		'after'  => '',
		'before' => '',
		'format' => get_option( 'date_format' ),
		'label'  => '',
	);

	$atts = shortcode_atts( $defaults, $atts, 'post_date' );

	$display = ( 'relative' === $atts['format'] ) ? _theme_human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ' . __( 'ago', '_theme' ) : get_the_time( $atts['format'] );

	$output = sprintf( '<time %s>', 'entry-time' ) . $atts['before'] . $atts['label'] . $display . $atts['after'] . '</time>';

	return apply_filters( '_theme_post_date_shortcode', $output, $atts );

}

add_shortcode( 'post_time', '_theme_post_time_shortcode' );
/**
 * Produces the time of post publication.
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is empty string),
 *   format (date format, default is value in date_format option field),
 *   label (text following 'before' output, but before date).
 *
 * Output passes through '_theme_post_time_shortcode' filter before returning.
 *
 * @since 0.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 * @return string Shortcode output
 */
function _theme_post_time_shortcode( $atts ) {

	$defaults = array(
		'after'  => '',
		'before' => '',
		'format' => get_option( 'time_format' ),
		'label'  => '',
	);

	$atts = shortcode_atts( $defaults, $atts, 'post_time' );

	$output = sprintf( '<time %s>', 'entry-time' ) . $atts['before'] . $atts['label'] . get_the_time( $atts['format'] ) . $atts['after'] . '</time>';

	return apply_filters( '_theme_post_time_shortcode', $output, $atts );

}

add_shortcode( 'post_author_posts_link', '_theme_post_author_posts_link_shortcode' );
/**
 * Produces the author of the post (link to author archive).
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is empty string).
 *
 * Output passes through '_theme_post_author_posts_link_shortcode' filter before returning.
 *
 * @since 0.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 * @return string Shortcode output
 */
function _theme_post_author_posts_link_shortcode( $atts ) {

	$defaults = array(
		'after'  => '',
		'before' => '',
	);

	$atts = shortcode_atts( $defaults, $atts, 'post_author_posts_link' );

	$author = get_the_author();
	$url    = get_author_posts_url( get_the_author_meta( 'ID' ) );

	$output  = sprintf( '<span %s>', 'entry-author' );
	$output .= $atts['before'];
	$output .= sprintf( '<a href="%s" %s>', $url, 'entry-author-link' );
	$output .= sprintf( '<span %s>', 'entry-author-name' );
	$output .= esc_html( $author );
	$output .= '</span></a>' . $atts['after'] . '</span>';

	return apply_filters( '_theme_post_author_posts_link_shortcode', $output, $atts );

}

add_shortcode( 'post_comments', '_theme_post_comments_shortcode' );
/**
 * Produces the link to the current post comments.
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is empty string),
 *   hide_if_off (hide link if comments are off, default is 'enabled' (true)),
 *   more (text when there is more than 1 comment, use % character as placeholder
 *     for actual number, default is '% Comments')
 *   one (text when there is exactly one comment, default is '1 Comment'),
 *   zero (text when there are no comments, default is 'Leave a Comment').
 *
 * Output passes through '_theme_post_comments_shortcode' filter before returning.
 *
 * @since 0.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 * @return string Shortcode output
 */
function _theme_post_comments_shortcode( $atts ) {

	$defaults = array(
		'after'       => '',
		'before'      => '',
		'hide_if_off' => 'enabled',
		'more'        => __( '% Comments', '_theme' ),
		'one'         => __( '1 Comment', '_theme' ),
		'zero'        => __( 'Leave a Comment', '_theme' ),
	);
	$atts = shortcode_atts( $defaults, $atts, 'post_comments' );

	if ( ( ! get_option( 'comments_posts' ) || ! comments_open() ) && 'enabled' === $atts['hide_if_off'] )
		return;

	// Darn you, WordPress!
	ob_start();
	comments_number( $atts['zero'], $atts['one'], $atts['more'] );
	$comments = ob_get_clean();

	$comments = sprintf( '<a href="%s">%s</a>', get_comments_link(), $comments );

	$output = $atts['before'] . $comments . $atts['after'];

	return apply_filters( '_theme_post_comments_shortcode', $output, $atts );

}

add_shortcode( 'post_tags', '_theme_post_tags_shortcode' );
/**
 * Produces the tag links list.
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is 'Tagged With: '),
 *   sep (separator string between tags, default is ', ').
 *
 * Output passes through '_theme_post_tags_shortcode' filter before returning.
 *
 * @since 0.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 * @return string Shortcode output
 */
function _theme_post_tags_shortcode( $atts ) {

	$defaults = array(
		'after'  => '',
		'before' => __( 'Tagged With: ', '_theme' ),
		'sep'    => ', ',
	);
	$atts = shortcode_atts( $defaults, $atts, 'post_tags' );

	$tags = get_the_tag_list( $atts['before'], trim( $atts['sep'] ) . ' ', $atts['after'] );

	//* Do nothing if no tags
	if ( ! $tags )
		return;

	$output = '<span class="entry-tags">' . $tags . '</span>';

	return apply_filters( '_theme_post_tags_shortcode', $output, $atts );

}

add_shortcode( 'post_categories', '_theme_post_categories_shortcode' );
/**
 * Produces the category links list.
 *
 * Supported shortcode attributes are:
 *   after (output after link, default is empty string),
 *   before (output before link, default is 'Tagged With: '),
 *   sep (separator string between tags, default is ', ').
 *
 * Output passes through '_theme_post_categories_shortcode' filter before returning.
 *
 * @since 0.1.0
 *
 * @param array|string $atts Shortcode attributes. Empty string if no attributes.
 * @return string Shortcode output
 */
function _theme_post_categories_shortcode( $atts ) {

	$defaults = array(
		'sep'    => ', ',
		'before' => __( 'Filed Under: ', '_theme' ),
		'after'  => '',
	);

	$atts = shortcode_atts( $defaults, $atts, 'post_categories' );

	$cats = get_the_category_list( trim( $atts['sep'] ) . ' ' );

	$output = '<span class="entry-categories">' . $atts['before'] . $cats . $atts['after'] . '</span>';

	return apply_filters( '_theme_post_categories_shortcode', $output, $atts );

}