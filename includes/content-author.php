<?php
/**
 * The template to display an author box
 *
 * @package _theme
 * @version 1.0
 */
?>

	<div class="about-author image-caption">
		<div class="author-image">
			<?php echo get_avatar( get_the_author_meta('email'), 120 ); ?>
		</div>

		<div class="author-details vcard author">
			<h3>About the Author</h3>
			<?php echo sprintf( wpautop( '<span class="fn">%s</span>: %s' ), get_the_author(), get_the_author_meta('description') );  ?>
		</div><!-- author-details -->
	</div><!-- about-author -->