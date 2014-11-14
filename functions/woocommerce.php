<?php
/**
 * Woocommerce specific functions
 *
 * Adds woocommerce specific functionality of add_theme_supports('woocommerce')
 * in functions.php
 *
 * @package _theme
 * @version 1.0
 */

// Change upsell display
if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
	function woocommerce_output_upsells() {
		woocommerce_upsell_display( 4, 4 ); // Display 4 products in rows of 4
	}
}

// Change how many products display per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

function _theme_translate_sortcode_bsb($translation, $text, $domain) {
	if ($domain == 'woocommerce') {
		switch ($text) {
			case 'Sort Code':
				$translation = 'BSB';
				break;
		}
	}
	return $translation;
}

add_filter( 'gettext', '_theme_translate_sortcode_bsb', 10, 3 );