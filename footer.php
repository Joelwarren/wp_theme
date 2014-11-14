<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the class="site-inner" div and all content after
 *
 * @package _theme
 * @version 1.0
 */
?>

		</div><!-- .site-inner -->
	
		<?php if ( is_active_sidebar('footer') ) { ?>
			
			<?php $count = _theme_get_widget_count('footer'); ?>
			<footer itemtype="http://schema.org/WPFooter" itemscope="itemscope" role="contentinfo" class="site-footer widget-count-<?php echo $count; ?>">
				<div class="container">
					<div class="row">
						<?php dynamic_sidebar( 'footer' ); ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</footer><!-- .site-footer -->
			
		<?php } ?>
	
		<div class="site-meta">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<span class="copyright"><?php echo _theme_copyright_year(); ?></span> - <a href="<?php echo get_permalink(2); ?>">Privacy policy</a>
					</div><!-- .col -->
					<div class="col-xs-12 col-md-6">
						<span class="credit">Website by <a href="http://wiild.com.au" target="_blank">Wiild Interactive</a></span>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-meta -->
		
	</div><!-- .site-container -->

<?php wp_footer(); ?>
</body>
</html>