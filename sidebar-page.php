<?php
/**
 * The sidebar containing the page sidebar widget area.
 *
 * @package _theme
 * @version 1.0
 */
?>

	<div id="secondary" class="widget-area" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-page' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->