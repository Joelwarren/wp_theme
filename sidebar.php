<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _theme
 * @version 1.0
 */
?>

	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->