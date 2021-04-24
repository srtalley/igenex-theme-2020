<?php
/**
 * Basic WooCommerce support
 * For an alternative integration method see WC docs
 * http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="grid-container product-page">
		<div class="grid-x grid-margin-x grid-padding-x">
			<?php woocommerce_content(); ?>
		</div>
</div>
<?php get_footer(); ?>
