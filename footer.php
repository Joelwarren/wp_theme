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
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-content -->
		
		<footer id="colophon" class="site-footer" role="contentinfo">
				
			<?php if ( is_active_sidebar('footer') ) { ?>
				
				<div class="container">
					<div class="row">
					
						<section class="footer-widgets">
							<?php dynamic_sidebar( 'footer' ); ?>
						</section><!-- .site-footer -->
			
					</div><!-- .row -->
				</div><!-- .container -->
				
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
		
		</footer><!-- #colophon -->
		
	</div><!-- .site-container -->

<?php wp_footer(); ?>
</body>
</html>