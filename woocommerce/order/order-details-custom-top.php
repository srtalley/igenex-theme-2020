
<?php 

// First, see if the order receipt has already been processed once and if so, don't process again
$email_gtm_processed = get_post_meta( $order->get_id(), '_email_gtm_processed', true );

if(!$email_gtm_processed) {

// Begin Custom 
$order_data = $order->get_data();
$order_total = $order->get_total();
$to_email = $order->get_billing_email();
$order_id = $order_id;
$order_notes = get_private_order_notes( $order_id );
// get the TC transaction ID to use as the order number
$transaction_id = get_post_meta( $order->get_id(), '_tc_transid', true );

// $transaction_id = $order_notes[0]["note_content"];

/* * * * * * * * * * * * * * * * * *
 * CREATE GTM DATA LAYER PUSH VARS *
 * * * * * * * * * * * * * * * * * */

/*
$arrProducts = [];
foreach($order_items as $order_id => $product_data) {
	$product_id = $product_data["product_id"];
	$product_name = $product_data["name"];
	$product_price = $product_data["subtotal"];
	$product_quantity = $product_data["quantity"];
	$arrProductData = array(
		'id' => $product_id,
		'name' => urlencode($product_name),
		'price' => $product_price,
		'quantity' => $product_quantity
	);
	array_push($arrProducts, $arrProductData);
}
$dataLayerPush = array(
	'event' => 'conversion',
	'ecommerce' => array(
		'purchase' => array(
			'actionField' => array(
				'id' => $order_id,
				'revenue' => $order_total
			)
		),
		'products' => $arrProducts
	)
);*/

$arrProducts = [];
$covid_349c_notice = false;
$covid_19_individual = false;
foreach($order_items as $order_id => $product_data) {
	$product_id = $product_data["product_id"];
	$product_name = $product_data["name"];
	$product_price = $product_data["subtotal"];
	$product_quantity = $product_data["quantity"];
	$arrProductData = array(
		'sku' => $product_id,
		'name' => urlencode($product_name),
		'price' => floatval($product_price),
		'quantity' => $product_quantity
	);
	array_push($arrProducts, $arrProductData);
	$product_term_slugs = wp_get_post_terms($product_data['product_id'],'product_cat',array('fields'=>'id=>slug'));
	foreach($product_term_slugs as $product_term_slug) {
        if($product_term_slug == 'consultation') {
			$covid_349c_notice = true;
		} else if($product_term_slug == 'covid-19-individual') {
			$covid_19_individual = true;
		}
	}
}
$dataLayerPush = array(
	'event' => 'conversion',
	'transactionId' => $transaction_id,
	'transactionTotal' => floatval($order_total),
	'transactionProducts' => $arrProducts,
	'ecommerce' => array(
                'purchase' => array(
                        'actionField' => array(
                                'id' => $transaction_id,
                                'revenue' => floatval($order_total)
                        )
                ),
                'products' => $arrProducts
        )
);
?>
<script>
	window.dataLayer = window.dataLayer || [];
	window.dataLayer.push(<?php print_r(json_encode($dataLayerPush)) ?>);
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-96435260-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-96435260-1');
</script>
<?php 

/* END GTM */

// foreach($order_notes as $note){
//     $note_id = $note['note_id'];
//     $note_date = $note['note_date'];
//     $note_author = $note['note_author'];
//     $note_content = $note['note_content'];
//
//     // Outputting each note content for the order
//     echo '<p>'.$note_content.'</p>';
// }

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$api_key = new Mandrill('2Xw84S7fpGF54K3hA_3zHA');
$template_name = 'new-igenex';

$email_content = "";
if($covid_19_individual) {
	$appointments_launched = false;
	if(!$appointments_launched) {
		$email_content .= 'Thank you for ordering a COVID-19 test. Please <a href="https://calendly.com/covid-19-test/same-day-testing" target="_blank">schedule an appointment</a> to visit IGeneX.<br />';
	}
	$template_name = 'testcovid';

}
foreach ( $order_items as $item_id => $item ) {
	$emailproduct = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );
	$email_content = $email_content."<h2><br /><strong>".$emailproduct->get_title()."</strong></h2><br />$".$item->get_total()." (".$item->get_quantity()." Kits(s) x $".$emailproduct->get_price().")<br />".$emailproduct->get_short_description()."<br /><br />";

	if($appointments_launched) {
		// get appointment data
		ob_start();
		do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, false );
		$igx_order_item_meta = ob_get_contents();
		ob_end_clean();
		$email_content = $email_content.$igx_order_item_meta;
	}

}
if($covid_349c_notice) {
	$email_content .= "Please enter Client ID #349C when you place your COVID-19 test order.<br /><br /><br />";
}
	try {
		$mandrill = $api_key;
		// $template_name = 'new-igenex';
		$template_content = array(
//            array(
//                'name' => 'example name',
//                'content' => 'example content'
//            )
		);

		$message = array(
//        'html' => '<p>Example HTML content</p>',
//        'text' => 'Example text content',
				// 'subject' => 'Your IGeneX Kit Order #'.$order_notes[0]["note_content"],
				'subject' => 'Your IGeneX Kit Order #'.$transaction_id,

				'from_email' => 'noreply@igenex.com',
				'from_name' => 'IGeneX',
				'to' => array(
						array(
								'email' => $to_email,
								//'name' => 'Josh',
								'type' => 'to'
						)
				),
				'headers' => array(
						'Reply-To' => 'noreply@igenex.com',
//                'MIME-Version' => '1.0',
//                'Content-Transfer-Encoding' => 'base64',
//                'Content-Disposition' => 'attachment'
				),
				'important' => false,
				'track_opens' => null,
				'track_clicks' => null,
				'auto_text' => null,
				'auto_html' => null,
				'inline_css' => null,
				'url_strip_qs' => null,
				'preserve_recipients' => null,
				'view_content_link' => null,
				'bcc_address' => '',
				'tracking_domain' => null,
				'signing_domain' => null,
				'return_path_domain' => null,
				'merge' => true,
				'merge_language' => 'mailchimp',
				'global_merge_vars' => array(
						array(
								'name' => 'ORDER_HTML',
								'content' => $email_content
						),
						array(
								'name' => 'ORDER_TOTAL',
								'content' => $order_total
						),
						array(
							'name' => 'ORDER_TRANS',
							'content' => $transaction_id
						),

				),
		);
		$async = false;
		$ip_pool = 'Main Pool';

			$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);



	} catch(Mandrill_Error $e) {
			// Mandrill errors are thrown as exceptions
			echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
			// A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
			throw $e;
	}

	add_post_meta($order->get_id(), '_email_gtm_processed', true);

} // end if $email_gtm_processed

// end custom