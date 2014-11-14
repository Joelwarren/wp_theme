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
			<div class="container">
				
				<div class="site-title" class="navbar-brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" />
						<span><?php bloginfo( 'name' ); ?></span>
					</a>
				</div><!-- .site-title -->
					
				<?php if ( has_nav_menu( 'primary' ) ) { ?>
					<?php if( current_theme_supports( 'bootstrap-navbar' ) ) { ?>
						<nav id="site-nav" class="site-nav navbar navbar-default pull-right" role="navigation">
							<a type="button" href="#" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
								Menu
							</a>
							<div class="collapse navbar-collapse" id="navbar">
								<?php 
									wp_nav_menu( 
										array( 
											'theme_location' 	=> 'primary', 
											'container'         => false,
											'container_class'   => false,
											'depth'             => 2,
											'menu_class'        => 'nav navbar-nav',
											'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
											'walker'            => new wp_bootstrap_navwalker()
										) 
									);
								?>
							</div>
						</nav><!-- .site-nav -->
					<?php } else { ?>
						<nav id="site-nav" class="site-nav" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
						</nav><!-- #site-nav -->
					<?php } ?>
				<?php } ?>
				
			</div><!-- .container -->
		</header><!-- .site-header -->
		
		<div class="site-inner">