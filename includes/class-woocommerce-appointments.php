<?php 
/**
 * Contains items specific to the products with the category covid-19-individual. 
 * While most items are in this class, there are a few items that can also be found in the 
 * functions.php file.
 */
namespace IGeneX\Theme\WooCommerce;

class WooCommerceAppointments {

  
    public function __construct() {

        add_filter( 'woocommerce_appointments_gcal_sync', array($this, 'gcal_sync_order_details'), 10, 2 );

        add_filter( 'woocommerce_appointments_times_split', array($this, 'bwp_hide_times_split_labels') );

    } // end function construct
    /**
     * Remove time slot headings from WooCommerce Appointments plugin
     */

    public function bwp_hide_times_split_labels() {
        return array(
            'allday'   => array(
                'name' => '',
                'from' => strtotime( '00:00' ),
                'to'   => strtotime( '24:00' ),
            ),
        );
    }
    /** 
     * Sync additional data to the Google Calendar
     */
    public function gcal_sync_order_details( $data, $appointment ) {
        $order = $appointment->get_order();
        if ( $order ) {

            //CUSTOM 
            $order = $appointment->get_order();

            // get the TC transaction ID to use as the order number
            $tc_transid = get_post_meta( $order->get_id(), '_tc_transid', true );
            $product    = $appointment->get_product();
            $product_id = $appointment->get_product_id();

            $shippingFirstName = $order->get_shipping_first_name();
            $shippingLastName = $order->get_shipping_last_name();
            
            $summary = 'Patient: ' . $shippingFirstName . ' ' . $shippingLastName . ( $product ? ' - ' . html_entity_decode( $product->get_title() ) : '' );

            $description = 'Order # ' . $tc_transid . PHP_EOL;

            $description .= 'Service: ' . rawurldecode( $appointment->get_product()->get_name() ) . PHP_EOL;
            $description .= 'Billing Name: ' . rawurldecode( $order->billing_first_name ) . ' ' . rawurldecode( $order->billing_last_name ). PHP_EOL;
            $description .= 'Patient Name: ' . rawurldecode( $shippingFirstName ) . ' ' . rawurldecode( $shippingLastName ) . PHP_EOL;
            $description .= 'When: ' . $appointment->get_start_date() . PHP_EOL;
			$description .= 'Duration: ' . $appointment->get_duration() . PHP_EOL;
            
            // Merge all data.
            $data['description'] = $description;
            $data['summary'] = $summary;
        }
    
        return $data;
    }
} // end class

$igenex_woocommerce_appointments = new WooCommerceAppointments();