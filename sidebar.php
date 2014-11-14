<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _theme
 * @version 1.0
 */
?>

	<aside itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="sidebar sidebar-primary widget-area">
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</aside><!-- .sidebar .widget-area -->