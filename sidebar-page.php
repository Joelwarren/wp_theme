<?php
/**
 * The sidebar containing the page sidebar widget area.
 *
 * @package _theme
 * @version 1.0
 */
?>

	<aside itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="sidebar sidebar-primary widget-area">
		<?php if ( ! dynamic_sidebar( 'sidebar-page' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</aside><!-- .sidebar .widget-area -->