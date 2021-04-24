<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

$text_align = is_rtl() ? 'right' : 'left';

do_action( 'woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>

<h2>
	<?php
	if ( $sent_to_admin ) {
		$before = '<a class="link" href="' . esc_url( $order->get_edit_order_url() ) . '">';
		$after  = '</a>';
	} else {
		$before = '';
		$after  = '';
	}
	/* translators: %s: Order ID. */
	echo wp_kses_post( $before . sprintf( __( '[Order #%s]', 'woocommerce' ) . $after . ' (<time datetime="%s">%s</time>)', $order->get_order_number(), $order->get_date_created()->format( 'c' ), wc_format_datetime( $order->get_date_created() ) ) );
	?>
</h2>

<!-- Begin Custom --> 
<table cellspacing="0" cellpadding="0">
<?php
	$order_items = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
	foreach ( $order_items as $item_id => $item ) {
			$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );
?>
	<tr>
			<td>
				<div style="font-size: 32px;padding-bottom: 0px;"><?php echo $product->get_title(); ?></div><br />
				<span style="font-size: 16px;">$<?php echo $item->get_total(); ?></span> (<?php echo $item->get_quantity(); ?> Kit(s) x $<?php echo $product->get_price(); ?>)<br />
				<?php echo $product->get_short_description(); ?><br />
		</td>
	</tr>

<?php	} //end foreach 	?>
</table>
<!-- End Custom --> 
<?php do_action( 'woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email ); ?>
