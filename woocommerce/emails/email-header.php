<?php
/**
 * Email Header
 *
 * @author   WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version  2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Load colours
$bg 		= get_option( 'woocommerce_email_background_color' );
$body		= get_option( 'woocommerce_email_body_background_color' );
$base 		= get_option( 'woocommerce_email_base_color' );
$base_text 	= wc_light_or_dark( $base, '#202020', '#ffffff' );
$text 		= get_option( 'woocommerce_email_text_color' );

$bg_darker_10 = wc_hex_darker( $bg, 10 );
$base_lighter_20 = wc_hex_lighter( $base, 20 );
$text_lighter_20 = wc_hex_lighter( $text, 20 );

// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline. !important; is a gmail hack to prevent styles being stripped if it doesn't like something.
$body_class = "
	margin: 0; 
	padding: 0; 
	min-width: 100%!important;
";
$wrapper = "
	background-color: " . esc_attr( $bg ) . ";
	width: 100%;
	-webkit-text-size-adjust:none !important;
	margin: 0;
	padding: 20px 0 20px 0;
";
$content = "
	box-shadow:0 0 0 3px rgba(0,0,0,0.025) !important;
	border-radius:6px !important;
	background-color: " . esc_attr( $body ) . ";
	border: 1px solid $bg_darker_10;
	border-radius:6px !important;
	max-width: 600px;
	width: 100%;
";
$template_header = "
	background-color: " . esc_attr( $base ) .";
	color: $base_text;
	border-top-left-radius:6px !important;
	border-top-right-radius:6px !important;
	border-bottom: 0;
	font-family:Arial;
	font-weight:bold;
	line-height:100%;
	vertical-align:middle;
";
$body_content = "
	background-color: " . esc_attr( $body ) . ";
	border-radius:6px !important;
";
$body_content_inner = "
	color: $text_lighter_20;
	font-family:Arial;
	font-size:14px;
	line-height:150%;
	text-align:left;
";
$header_content_h1 = "
	color: " . esc_attr( $base_text ) . ";
	margin:0;
	padding: 14px 12px;
	text-shadow: 0 1px 0 $base_lighter_20;
	display:block;
	font-family:Arial;
	font-size:20px;
	font-weight:bold;
	text-align:left;
	line-height: 150%;
";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php echo get_bloginfo( 'name' ); ?></title>
		<style type="text/css">
		@media only screen and (min-device-width: 601px) {
			.content {width: 600px !important;}
		}
		</style>
	</head>
	<body yahoo bgcolor="<?php echo $bg; ?>" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="<?php echo $body_class; ?>">
		<div style="<?php echo $wrapper; ?>">
			<table border="0" cellpadding="0" bgcolor="<?php echo $bg; ?>" cellspacing="0" height="100%" width="100%">
				<tr>
					<td align="center" valign="top">
						<div id="template_header_image">
							<?php
								if ( $img = get_option( 'woocommerce_email_header_image' ) ) {
									echo '<p style="margin-top:0;"><img style="max-width: 300px; height: auto" src="' . esc_url( $img ) . '" alt="' . get_bloginfo( 'name' ) . '" /></p>';
								}
							?>
						</div>
<!--[if (gte mso 9)|(IE)]>
<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <![endif]-->
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="content" style="<?php echo $content; ?>">
							<tr>
								<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header" style="<?php echo $template_header; ?>" bgcolor="<?php echo $base; ?>">
										<tr>
											<td>
												<h1 style="<?php echo $header_content_h1; ?>"><?php echo $email_heading; ?></h1>

											</td>
										</tr>
									</table>
									<!-- End Header -->
								</td>
							</tr>
							<tr>
								<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body">
										<tr>
											<td valign="top" style="<?php echo $body_content; ?>">
												<!-- Content -->
												<table border="0" cellpadding="12" cellspacing="0" width="100%">
													<tr>
														<td valign="top">
															<div style="<?php echo $body_content_inner; ?>">
