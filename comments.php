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
						'avatar_size' => 48,
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
		    'author' => '<div class="name-field">
		    			 <input type="text" id="author" name="author" placeholder="' . __('Name *','_theme') . '" value="' . esc_attr( $commenter['comment_author'] ) . '" />
		    			 </div>',
		    'email'  => '<div class="email-field">
		    			 <input name="email" type="text" id="email" placeholder="' . __('Email *','_theme') . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" />
		    			 </div>',
		    'url'    => '<div class="website-field">
		    			 <input name="url" type="text" id="url" placeholder="' . __('Website','_theme') . '" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" />
		    			 </div>') 
		),
		'comment_field' => '<div class="message-field">
							<textarea name="comment" placeholder="' . __('Enter your comment here...','_theme') . '" id="comment" aria-required="true"></textarea>
							</div>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','_theme' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
		'cancel_reply_link' => __( 'Cancel' , '_theme' ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'label_submit' => __( 'Submit' , '_theme' )
	);
?>
<div class="comment-form-wrapper">
	<h3>Would you like to share your thoughts?</h3>
	<?php comment_form($custom_comment_form); ?>
</div><!-- .comment-form-wrapper -->