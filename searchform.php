<?php
/**
 * The template for displaying search form
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
 ?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<input type="text" class="input-group-field" value="" name="s" id="s" placeholder="Search">
	<button type="submit" id="searchsubmit">
		<image src="/assets/img/static/search-icon.png">
	</button>
</form>
