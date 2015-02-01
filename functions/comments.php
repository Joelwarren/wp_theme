<?php
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyeleven_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @package _theme
 * @version 1.0
 * @since Twenty Eleven 1.0
 */

if ( ! function_exists( '_theme_comment' ) ) :

	function _theme_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p>Pingback: <?php comment_author_link(); ?><?php edit_comment_link( 'Edit', '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p><em class="comment-awaiting-moderation">Your comment is awaiting moderation</em></p>
				<?php endif; ?>
			
				<?php if( $comment->comment_parent == 0 ) { ?>
				
					<footer class="comment-meta">

						<?php echo get_avatar( $comment, 40 ); ?>
						<div class="comment-author vcard">
							<span class="author-name"><?php echo get_comment_author_link(); ?></span>
							<span class="time">
								<time pubdate datetime="<?php echo get_comment_time( 'c' ); ?>">
									<?php echo get_comment_date(); ?>
								</time>
							</span>
						</div><!-- .comment-author .vcard -->

					</footer>

					<div class="comment-body">
						
						<?php comment_text(); ?>
						
						<div class="comment-actions">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							<?php edit_comment_link( __( 'Edit' ), '&nbsp;&nbsp;', '' ); ?>
						</div><!-- .comment-actions -->
					</div>
				
				<?php } else { ?>
			
					<div class="comment-meta">

						<?php echo get_avatar( $comment, 34 ); ?>
						<div class="comment-author vcard">
							<span class="author-name"><?php echo get_comment_author_link(); ?></span>
							<?php comment_text(); ?>
						</div><!-- .comment-author .vcard -->

						<div class="comment-actions">
							<span class="time">
								<time pubdate datetime="<?php echo get_comment_time( 'c' ); ?>">
									<?php echo get_comment_date(); ?>
								</time>
							</span>
							
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							<?php edit_comment_link( __( 'Edit' ), '&nbsp;&nbsp;', '' ); ?>
						</div><!-- .comment-actions -->

					</div>
					
				<?php } ?>

			</article><!-- #comment-## -->

		<?php
				break;
		endswitch;
	}

endif; // ends check for _theme_comment()