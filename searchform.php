<?php
/**
 * Template for displaying search forms
 *
 * @package _theme
 * @version 1.0
 */
?>

	<form method="get" id="searchform" class="searchform form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon fa">&#xf002;</div>
				<input type="text" class="field form-control" name="s" id="s" placeholder="Search ..." />
			</div><!-- .input-group -->
			<input type="submit" class="btn btn-primary submit" name="submit" id="searchsubmit" value="Search" />
		</div><!-- .form-group -->
	</form>