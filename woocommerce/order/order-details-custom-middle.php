<?php 
// get the TC transaction ID to use as the order number
$tc_transid = get_post_meta( $order->get_id(), '_tc_transid', true );

?>
		<div class="grid-x grid-margin-x grid-padding-x">
    <div class="cell">
        <h1 style="padding-bottom: 10px;padding-top: 20px;"><?php _e( 'Order details', 'woocommerce' ); ?></h1>
        <p style="margin-bottom: 30px;">Your IGeneX Kit Order #<?php echo $tc_transid; ?><br /></p>
    </div>
</div>

<?php

	foreach ( $order_items as $item_id => $item ) {
			$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );
?>
<div class="grid-x grid-margin-x grid-padding-x order-details <?php echo $product->get_slug(); ?>" id="<?php echo 'product-'.$order->get_id(); ?>" style="margin-bottom: 25px;" >
		<div class="cell large-12">
				<div class="grid-x grid-margin-x grid-padding-x">
						<div class="cell large-12">
							<h1 style="padding-bottom: 0px;margin-bottom: 0px;font-size: 32px;"><?php echo $product->get_title(); ?></h1>
							<p style="line-height: 30px;"><span class="woocommerce-Price-amount amount" style="font-size: 16px;">$<?php echo $item->get_total(); ?></span> (<?php echo $item->get_quantity(); ?> Kit(s) x $<?php echo $product->get_price(); ?>)</p>
						</div>
						<div class="cell large-12">
							<p><?php echo $product->get_short_description(); ?></p>
							<?php 
							$appointments_launched = false;
								if($appointments_launched) {
									do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, false );
								}
							?>
						</div>
				</div>
		</div>
</div>

<?php
	}
	?>
<div class="grid-x grid-margin-x grid-padding-x text-left">
		<div class="cell large-12">
			<h4 style="padding-bottom: 20px;padding-left: 15px;font-weight: bold;">Total: $<?php echo $order->get_total(); ?></h4>
		</div>
</div>