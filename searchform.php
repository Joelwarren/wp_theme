<?php
/**
 * Template for displaying search forms
 *
 * @package _theme
 * @version 1.0
 */
?>

	<form method="get" id="searchform" class="searchform inline" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field form-control" name="s" id="s" placeholder="Search" />
		<input type="submit" class="btn btn-default submit" name="submit" id="searchsubmit" value="Search" />
	</form>