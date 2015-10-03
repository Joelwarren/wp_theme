<?php
/**
 * The template for displaying Comments.
 *
 * @package _theme
 * @version 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php comments_number( __('0 Comments', '_theme'), __('1 Comment', '_theme'), __('% Comments', '_theme') ); ?>
		</h3>
	
		<?php 
			if( have_comments() ){
				echo '<ol id="singlecomments" class="comment-list">';
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 72,
						'callback'    => '_theme_comment'
					) );
				echo '</ol>';
			}
			
			paginate_comments_links(); 
		?>

	<?php endif; // have_comments() ?>

</div><!-- #comments -->


<?php
	$custom_comment_form = array( 
		'fields' => apply_filters( 'comment_form_default_fields', array(
		    'author' => '<div class="row"><div class="form-group col-sm-6 name-field">
						<label for="author">Your Name</label>
		    			 <input class="form-control" type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" />
		    			 </div>',
		    'email'  => '<div class="form-group col-sm-6 email-field">
						 <label for="email">Your Email Address</label>
		    			 <input class="form-control" name="email" type="text" id="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />
		    			 </div></div>',
		    'url'    => '') 
		),
		'comment_field' => '<div class="message-field form-group">
							<label for="email">Your Comment</label>
							<textarea class="form-control" name="comment" id="comment" aria-required="true" rows="5"></textarea>
							</div>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','_theme' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
		'cancel_reply_link' => __( 'Cancel' , '_theme' ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'title_reply' => 'leave a comment',
		'label_submit' => __( 'Post Comment' , '_theme' ),
		'class_submit' => 'btn btn-default'
	);
?>
<div class="row col-sm-10 col-sm-offset-1">
	<div class="comment-form-wrapper">
		<?php comment_form($custom_comment_form); ?>
	</div><!-- .comment-form-wrapper -->
</div><!-- .row -->

