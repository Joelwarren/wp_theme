<?php
/**
 * Header template for the theme
 *
 * Displays all of the <head> section and everything up till <div class="site-inner">.
 *
 * @package _theme
 * @version 1.0
 */
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php if( is_tag() || is_author() || is_date() ) echo '<meta name="robots" content="noindex">'; ?>
	
	<title><?php wp_title(); ?></title>
	
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

	<div class="site-container">
	
		<header itemtype="http://schema.org/WPHeader" itemscope="itemscope" role="banner" class="site-header">
			<nav class="navbar navbar-inverse" role="navigation">
			  <div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<a type="button" href="#" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
						Menu
					</a>
					<a class="navbar-brand" href="<?php echo site_url(); ?>">
						<img alt="Spacemakers" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar">
					<?php 
						wp_nav_menu( 
							array( 
								'theme_location' 	=> 'primary', 
								'container'         => false,
								'container_class'   => false,
								'depth'             => 2,
								'menu_class'        => 'nav navbar-nav navbar-right',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker()
							) 
						);
					?>
				</div><!-- .navbar-collapse -->
			  </div><!-- .container -->
			</nav>
		</header><!-- .site-header -->
		
		<div class="site-inner">