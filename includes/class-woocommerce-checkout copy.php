<?php 
/**
 * Contains items specific to the products with the category covid-19-individual. 
 * While most items are in this class, there are a few items that can also be found in the 
 * functions.php file.
 */
namespace IGeneX\Theme\WooCommerce;

class Checkout {

  
    public function __construct() {
        
        add_action( 'woocommerce_before_checkout_form', array($this, 'woocommerce_modify_before_checkout_form') );


        add_action('woocommerce_checkout_process', array($this, 'dst_set_woocommerce_checkout_payment_method'), 10);
        add_action('woocommerce_checkout_order_processed', array($this, 'dst_woocommerce_checkout_process_hook'), 10);

        add_action( 'woocommerce_order_status_completed', array($this, 'igx_delete_completed_order'), 999, 1);
        add_action( 'woocommerce_thankyou', array($this, 'custom_woocommerce_auto_complete_order') );
        add_filter( 'woocommerce_checkout_fields', array($this, 'custom_override_default_address_fields') );
        add_action( 'woocommerce_checkout_create_order', array($this, 'igx_order_type_checkout_field_save'), 20, 2 );
        add_filter( 'default_checkout_billing_country', array($this, 'change_default_checkout_country') );
        add_action( 'woocommerce_review_order_after_submit', array($this, 'woocommerce_modify_checkout_terms') );
        add_filter( 'woocommerce_cart_item_name', array($this, 'product_thumbnail_in_checkout'), 20, 3 );

        add_action('wp_head', array($this, 'physician_checkout'));
        add_action('wp_ajax_physician_checkout', array($this, 'physician_checkout_ajax'));
        add_action('wp_ajax_nopriv_physician_checkout', array($this, 'physician_checkout_ajax'));

        // COVID 19 Individual Items

        add_action( 'woocommerce_checkout_process', array($this,'covid_19_individual_modify_billing_fields_on_checkout') );

        add_action('woocommerce_before_checkout_form', array($this, 'setup_covid_19_individual'));





    } // end function construct

    /**
     * Add a checkout banner above the checkout fields
     */
    public function woocommerce_modify_before_checkout_form() {

        ?>
        <div class="patient cbanner">
            <div class="grid-container">
                <div class="grid-x grid-margin-x grid-padding-x">
                    <div class="cell large-12 small-12 medium-12">
                    <h4 style="padding-top: 6px;">Checkout</h4>
                    </div>
                </div>
            </div>
        </div>
        <?php 
    }

    // add_action('woocommerce_after_checkout_validation', 'deny_pobox_postcode');

    // function deny_pobox_postcode( $posted ) {

    //   $address  = ( isset( $posted['shipping_address_1'] ) ) ? $posted['shipping_address_1'] : $posted['billing_address_1'];
    //   $postcode = ( isset( $posted['shipping_postcode'] ) ) ? $posted['shipping_postcode'] : $posted['billing_postcode'];

    //   $replace  = array(" ", ".", ",");
    //   $address  = strtolower( str_replace( $replace, '', $address ) );
    //   $postcode = strtolower( str_replace( $replace, '', $postcode ) );

    //   if ( strstr( $address, 'pobox' ) || strstr( $postcode, 'pobox' ) ) {
    //     wc_add_notice( sprintf( __( "Sorry, we cannot ship to PO Boxes, if that’s your only shipping option please call customer service so we can provide guidance.") ) ,'error' );
    //   }
    // }



    /* Force the gateway to be processed even on a physician order */

    /*
    * Set the $_POST payment_method to offline_gateway 
    */
    public function dst_set_woocommerce_checkout_payment_method() {
        $_POST['payment_method'] = 'offline_gateway';
    }

    /*
    * Hook into the woocommerce_checkout_order_processed hook
    * in order to filter the needs_payment function. We don't 
    * want to run this until the order has been processed,
    * otherwise the credit card form is shown on the checkout
    * page.
    */

    public function dst_woocommerce_checkout_process_hook(){
        add_filter( 'woocommerce_cart_needs_payment', array($this, 'dst_filter_woocommerce_cart_needs_payment'), 10, 2 ); 
    }

    /*
    * Always return true for the cart needs_payment function
    */
    public function dst_filter_woocommerce_cart_needs_payment( $payment_status, $cart ) { 
        return true;
    }
            
    // Delete successful orders IF it's not a covid-19-individual order
    public function igx_delete_completed_order($order_id) {
        $order = wc_get_order( $order_id );
        $is_covid_19_individual_order = apply_filters('igx_order_contains_covid_19_individual', $order);
        if(!$is_covid_19_individual_order) {
            wp_delete_post($order_id,true);
        } else {
            do_action('action_scheduler_after_process_queue');
        }
    }
    /**
     * Auto Complete all WooCommerce orders.
     */
    public function custom_woocommerce_auto_complete_order( $order_id ) {
        if ( ! $order_id ) {
            return;
        }

        $order = wc_get_order( $order_id );
        $order->update_status( 'completed' );
    }

    /**
     * Add or change fields for COVID-19 tests
     */
    public function custom_override_default_address_fields($fields){
        global $woocommerce;
        $country = $woocommerce->customer->get_billing_country();
        if($country == 'US' || $country == 'CA' ){
                $fields['billing']['billing_postcode']['required'] = true;
                $fields['billing']['billing_state']['required'] = true;
            // $fields['shipping']['billing_postcode']['required'] = false;
        }
            else {
                $fields['billing']['billing_postcode']['required'] = false;
                $fields['billing']['billing_state']['required'] = false;
        }
        // Remove the phone field
        $remove_phone_field = false;

        // Remove the fax field
        $remove_fax_field = false;

        // Remove Physician field & make client ID required
        $remove_physician_field = false;

        // Require the client ID field
        $require_client_id = false;

        // Remove the date of birth field
        $remove_dateofbirth_field = true;

        // Remove the client ID field
        $remove_clientid_field = false;
        // Remove the client ID field
        $remove_title_field = false;
        // Remove the client ID field
        $remove_upin_field = false;
        // Remove the client ID field
        $remove_npi_field = false;


        // Remove the gender field 
        $remove_gender_field = true;

        // Remove the race field
        $remove_race_field = true;
        
        // Remove the ethnicity field
        $remove_ethnicity_field = true;

        // Remove shipping email
        $remove_shipping_email_field = true;

        // Remove shipping passport/resident ID
        $remove_shipping_passport_field = true;

        // Remove the patient names 
        // $remove_patient_names = true;

        // Show Residential question 
        $remove_residential_question = true;
        // COVID Product IDs
        // $covid_product_ids = array(18229,18231,18232);
        foreach( WC()->cart->get_cart() as $key => $item ){
            // Check if a COVID item 

            // get the terms 
            $product_term_slugs = wp_get_post_terms($item['product_id'],'product_cat',array('fields'=>'id=>slug'));
            foreach($product_term_slugs as $product_term_slug) {
                if($product_term_slug == 'covid-19') {
                    $remove_physician_field = true;
                    $require_client_id = true;
                    }
                    if($product_term_slug == 'covid-19-individual') {
                    add_action( 'woocommerce_before_order_notes', array($this,'igx_order_type_covid_19_individual_field') );

                    $remove_physician_field = true;
                    $remove_clientid_field = true;
                    $remove_title_field = true;
                    $remove_upin_field = true;
                    $remove_npi_field = true;
                    $remove_phone_field = true;
                    $remove_fax_field = true;
                
                    $remove_dateofbirth_field = false;
                    $remove_gender_field = false;
                    $remove_race_field = false;
                    $remove_ethnicity_field = false;
                    // $remove_patient_names = false;
                    $remove_shipping_email_field = false;
                    $remove_shipping_passport_field = false;
                // $fields['billing']['billing_email']['label'] = $fields['billing']['billing_email']['label'] . " (Test results will be sent to this email address.)";
                // $fields['billing']['billing_first_name']['label'] = 'Billing ' . $fields['billing']['billing_first_name']['label'];
                // $fields['billing']['billing_last_name']['label'] = 'Billing ' . $fields['billing']['billing_last_name']['label'];          
                // }
                // if($product_term_slug == 'consultation') {
                // $fields['billing']['billing_first_name']['label'] = "Patient's " . $fields['billing']['billing_first_name']['label'];
                // $fields['billing']['billing_last_name']['label'] = "Patient's " . $fields['billing']['billing_last_name']['label'];
                // $fields['billing']['billing_wooccm18']['label'] = "Patient's " . $fields['billing']['billing_wooccm18']['label'];       
                // } 
                    foreach($fields['shipping'] as $key => $value) {
                        $fields['shipping'][$key]['label'] = 'Patient\'s ' . $value['label'];
                    }
                    $fields['shipping']['shipping_wooccm13']['label'] = 'Patient\'s Email Address (Test results will be sent to this email address.)';
                    $fields['shipping']['shipping_address_2']['label'] = '';

                }
            }
            if(in_array('consultation', $product_term_slugs)) {
                $require_client_id = false;
            }
        }

        if($remove_phone_field) {
            // Remove the phone field 
            unset($fields['billing']['billing_phone']);
        }
        if($remove_fax_field) {
            // Remove the fax field
            unset($fields['billing']['billing_myfield16']);
        }
        if($remove_physician_field) {
            // Remove the physician drop down
            unset($fields['billing']['billing_myfield1']);
        }
        if($remove_clientid_field) {
            // Remove the physician drop down
            unset($fields['billing']['billing_myfield14']);
        }
        if($remove_title_field) {
            // Remove the physician drop down
            unset($fields['billing']['billing_myfield15']);
        }
        if($remove_upin_field) {
            // Remove the physician drop down
            unset($fields['billing']['billing_myfield12']);
        }
        if($remove_npi_field) {
            // Remove the physician drop down
            unset($fields['billing']['billing_myfield13']);
        }
        if($remove_dateofbirth_field) {
            // Remove the gender drop down
            // unset($fields['billing']['billing_wooccm18']);
            unset($fields['shipping']['shipping_wooccm9']);
        }
        if($remove_gender_field) {
            // Remove the gender drop down
            // unset($fields['billing']['billing_wooccm19']);
            unset($fields['shipping']['shipping_wooccm10']);
        }
        if($remove_race_field) {
            // Remove the gender drop down
            // unset($fields['billing']['billing_wooccm20']);
            unset($fields['shipping']['shipping_wooccm11']);
        }
        if($remove_ethnicity_field) {
            // Remove the gender drop down
            // unset($fields['billing']['billing_wooccm21']);
            unset($fields['shipping']['shipping_wooccm12']);
        }
        // if($remove_patient_names) {
            // unset($fields['billing']['billing_wooccm22']);
            // unset($fields['billing']['billing_wooccm23']);
        // }
        if($remove_shipping_email_field) {
            // Remove the shipping email address
            unset($fields['shipping']['shipping_wooccm13']);

        }
        if($remove_shipping_passport_field) {
            // Remove the passport/resident ID field
            unset($fields['shipping']['shipping_wooccm14']);
        }

        if($require_client_id) {
            $fields['billing']['billing_myfield14']['required'] = true;
            $fields['billing']['billing_myfield14']['placeholder'] = 'Enter your Client ID';        
        }
        if($remove_residential_question) {
            // Remove the physician drop down
            unset($fields['billing']['billing_myfield17']);
        }

        return $fields;
    }

    /**
     * Add a hidden field for the covid_19_individual test at checkout
     */

    public function igx_order_type_covid_19_individual_field() {
        echo '<input type="hidden" name="igx_order_type" value="covid_19_individual">';
    }
    /**
     * Save the hidden order type field at checkout
     */
    public function igx_order_type_checkout_field_save( $order, $data ) {

        if( ! isset($_POST['igx_order_type']) ) return;

        if( ! empty($_POST['igx_order_type']) ){
            $order->update_meta_data( '_igx_order_type', sanitize_text_field( $_POST['igx_order_type'] ) );
        }
    }

    public function change_default_checkout_country() {
        return 'US'; // country code
    }

    /**
     * Add disclaimer below checkout
     */
    public function woocommerce_modify_checkout_terms() { 
        ?>
        <div class="patient-checkout-disclaimer-wrapper">
            <p class="patient-checkout-disclaimer">Please note: If you order more than one of a single kit type, you’ll see one charge on your credit card statement. For insurance and billing purposes, if you order different kit types they will be billed as separate charges on your credit card.</p>
        </div>
        <?php
    }
    /**
     * Add product image in checkout
     */
    public function product_thumbnail_in_checkout( $product_name, $cart_item, $cart_item_key ){
        if ( is_checkout() ) {
    
            $product_image   = $cart_item['data']->get_image(array( 200, 200));
            $image_html  = '<div class="product-item-thumbnail">'.$product_image.'</div> ';
            $product_name = $image_html . $product_name;
        }
        return $product_name;
    }
        
    /** 
     * Physician checkout ajax
     */
    public function physician_checkout() {

        if(is_checkout()) {
            // do the checkout stuff
            ?>
            <script type="text/javascript">
                //v1
                jQuery(function($) {

                $(document).ready(function() {
                    var ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>";

                    $('#billing_myfield1_field').on('change', function() {

                    var select_item = $(this).find('select');

                    console.log('Selection field changed to ' + $(select_item).val());

                    var physician_select_value = $(select_item).val();

                    var physician_select_action =
                        $.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            dataType: 'json',
                            data: {
                                'action': 'physician_checkout',
                                'physician_select_value': physician_select_value,
                            },
                            success: function (response) {
                                
                            if(response.update_cart == 'true') {
                            var messages_len = response.messages.length;
                            for(var i=0; i<messages_len; i++) {
                                if(i==0){
                                $('.woocommerce-notices-wrapper').first().html('<h3>' + response.messages[i].cart_notices + '</h3>').hide().slideDown(1000);
                                } else {
                                $('.woocommerce-notices-wrapper').first().append('<h3>' + response.messages[i].cart_notices + '</h3>').hide().slideDown(1000);
                                }
                                console.log(response.messages[i].console_notices);
                            } // end for

                            var t = { updateTimer: !1,  dirtyInput: !1,
                                reset_update_checkout_timer: function() {
                                    clearTimeout(t.updateTimer)
                                },
                                trigger_update_checkout: function() {
                                    t.reset_update_checkout_timer(), t.dirtyInput = !1,
                                    $(document.body).trigger("update_checkout")
                                }
                            };
                            $(document.body).trigger('update_checkout');
                            console.log('Event: update_checkout');
                            }
                        }
                    }); //end physician_select_action

                }); // end select on change

                }); // document ready
                }); // outer wrapper
            </script>
            <?php
        } // end if is_checkout

    } // end function physician_checkout


    public function physician_checkout_ajax() {

        $physician_value = $_POST['physician_select_value'];
        $messages;
        $update_cart_totals = false;
        // get the cart items 
        foreach( WC()->cart->get_cart() as $cart_key => $cart_item ){
        
        // Blood collection kit
        if($cart_item['product_id'] == 1024 && ($physician_value == '1' || $physician_value == 'Yes')) {      
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 1087, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if

        if($cart_item['product_id'] == 1087 && ($physician_value == '0' || $physician_value == 'No')) {
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 1024, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if


        // Miscellaneous collection kit
        if($cart_item['product_id'] == 1025 && ($physician_value == '1' || $physician_value == 'Yes')) {      
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 1086, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if

        if($cart_item['product_id'] == 1086 && ($physician_value == '0' || $physician_value == 'No')) {
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 1025, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if


        // Urine collection kit
        if($cart_item['product_id'] == 842 && ($physician_value == '1' || $physician_value == 'Yes')) {      
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 1084, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if

        if($cart_item['product_id'] == 1084 && ($physician_value == '0' || $physician_value == 'No')) {
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 842, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if


        // Tick Test
        if($cart_item['product_id'] == 1034 && ($physician_value == '1' || $physician_value == 'Yes')) {      
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 1085, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if

        if($cart_item['product_id'] == 1085 && ($physician_value == '0' || $physician_value == 'No')) {
            $messages[] = $this->dst_woocommerce_replace_cart_item($cart_key, $cart_item['data'], 1034, $cart_item['quantity']);
            $update_cart_totals = true;
        } // end if
        
        } // end foreach

        if($update_cart_totals) {
            $update_cart = 'true';
        } else {
            $update_cart = 'false';
        }

        $response = array(
            'messages' => $messages,
            'update_cart' => $update_cart,
        );
        wp_send_json($response);
        wp_die();
    } // end bnb_create_wc_orders_ajax  


    public function dst_woocommerce_replace_cart_item($remove_item_key, $remove_item_data, $add_item_id, $add_item_qty) {

        WC()->cart->remove_cart_item($remove_item_key);
        WC()->cart->add_to_cart( $add_item_id, $add_item_qty );
        $removed_item_title = $remove_item_data->get_title();
        $added_item_title = get_the_title($add_item_id);

        $update_notices = array(
            'cart_notices' => 'Removed ' . $removed_item_title . ' and added ' . $added_item_title,
            'console_notices' => 'Removed ' . $remove_item_data->get_id() . ' and added ' . $add_item_id,
        );
        return $update_notices;
    }

    public function setup_covid_19_individual() {

        $is_covid_19_individual_order = apply_filters('igx_cart_contains_covid_19_individual', WC()->cart->get_cart());
        if($is_covid_19_individual_order) {
            add_filter( 'woocommerce_cart_needs_shipping_address', '__return_true', 50 );
            $this->covid_19_individual_switch_billing_shipping();
            $this->covid_19_individual_checkout_styling();
            add_action('woocommerce_before_checkout_shipping_form', array($this, 'covid_19_individual_add_title_before_shipping_form'));

            add_action( 'woocommerce_after_order_notes', array($this, 'covid_19_individual_add_billing_checkbox'));


            // add_action( 'woocommerce_before_checkout_form', array($this, 'add_shipping_fields') );

            // add_filter( 'gettext', array($this, 'woocommerce_modify_billing_field_strings'), 20, 3 );

        }
    }
    /**
     * Force the shipping fields to show if certain conditions are met
     */
    // public function add_shipping_fields() {
        // $is_covid_19_individual_order = apply_filters('igx_cart_contains_covid_19_individual', WC()->cart->get_cart());

        // if($is_covid_19_individual_order) {
            // add_filter( 'woocommerce_cart_needs_shipping_address', '__return_true', 50 );
        // }
    // }
    /**
     * Change Billing Details to Patient & Billing Details if appropriate
     */
    // public function woocommerce_modify_billing_field_strings( $translated_text, $text, $domain ) {
    //     switch ( $translated_text ) {
    //         case 'Billing details' :
    //             $is_covid_19_individual_order = apply_filters('igx_cart_contains_covid_19_individual', WC()->cart->get_cart());
    //             if($is_covid_19_individual_order) {
    //                 $translated_text = __( 'Patient & Billing Details', 'woocommerce' );
    //             }
    //         break;
    //     }
    //     return $translated_text;
    // }
    /**
     * Add a patient details banner
     */
    public function covid_19_individual_add_title_before_shipping_form() {
        echo '<h3>Patient Details</h3>';
    }
    /**
     * Switch the position of the billing and shipping fields
     */
    public function covid_19_individual_switch_billing_shipping() {
        $instance = \WC_Checkout::instance();
        remove_action( 'woocommerce_checkout_billing', array( $instance, 'checkout_form_billing' ) );
        remove_action( 'woocommerce_checkout_shipping', array( $instance, 'checkout_form_shipping' ) );
        add_action( 'woocommerce_checkout_billing', array( $instance, 'checkout_form_shipping' ), 10 );
        add_action( 'woocommerce_checkout_shipping', array( $instance, 'checkout_form_billing' ), 10 );
    }
    /**
     * Style the checkout items
     */
    public function covid_19_individual_checkout_styling() {
        ?>

        <style type="text/css">
            #ship-to-different-address {
                display: none !important;
            }
            .shipping_address {
                display: block !important;
            }
            .col-2 .woocommerce-billing-fields {
                display: none;
            }
        </style>

        <?php
    }
    /**
     * Add the billing checkbox switch
     */
    public function covid_19_individual_add_billing_checkbox() {
        woocommerce_form_field( 'billing-info-is-different', array( // CSS ID
            'type'          => 'checkbox',
            'class'         => array('form-row billing-info-is-different'), // CSS Class
            'label_class'   => array('woocommerce-form__label billing-info-is-different checkbox'),
            'input_class'   => array('woocommerce-form__input billing-info-is-different input-checkbox'),
            'required'      => false, // Mandatory or Optional
            'label'         => 'Billing information is different than patient information', // Label and Link
         ));
         echo '<input type="hidden" name="covid_19_individual_patient_is_same_as_billing" value="true">';

        ?>

        <script type="text/javascript">
            jQuery(function ( $ ) {
                
                $('document').ready(function(){
                    $('#billing-info-is-different').on('click', function(e){
                        if($(this).is(":checked")){
                            $('.col-2 .woocommerce-billing-fields').show();
                            $('input[name="covid_19_individual_patient_is_same_as_billing"]').val("false");
                        }
                        else if($(this).is(":not(:checked)")){
                            $('.col-2 .woocommerce-billing-fields').hide();
                            $('input[name="covid_19_individual_patient_is_same_as_billing"]').val("true");
                        }
                    });
                    // $('#place_order').on('click', function(){
                    //     // copy the patient fields to the billing fields if necessary
                    //     if($('#billing-info-is-different-checkbox').is(":not(:checked)")){

                    //         // WooCommerce checkout 
                    //         $('#shipping_first_name').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_first_name');
                    //         });
                    //         $('#shipping_last_name').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_last_name');
                    //         });
                    //         $('#shipping_first_name').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_company');
                    //         });
                    //         $('#shipping_address_1').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_address_1');
                    //         });
                    //         $('#shipping_address_2').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_address_2');
                    //         });
                    //         $('#shipping_city').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_city');
                    //         });
                    //         $('#shipping_country').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_country');
                    //         });
                    //         $('#shipping_state').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_state');
                    //         });
                    //         $('#shipping_postcode').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_postcode');
                    //         });
                    //         $('#shipping_wooccm13').on('blur', function(e) {
                    //             update_billing_field($(this).val(), '#billing_email');
                    //         });
                    //     }
                    // });
                    
                });

                // function update_billing_field(value, field) {
                //     if($(field).val() == '') {
                //         $(field).val(value);
                //     }
                // }

            });
        </script>
        <?php
                
    }

    /**
     * Check and process the fields on checkout and display errors if necessary
     */
    public function covid_19_individual_modify_billing_fields_on_checkout() {

        $cart_has_covid_19_individual_test = apply_filters('igx_cart_contains_covid_19_individual', WC()->cart->get_cart());
        if($cart_has_covid_19_individual_test) {

            // copy shipping fields to billing if appropriate
            if(isset($_POST['covid_19_individual_patient_is_same_as_billing']) && $_POST['covid_19_individual_patient_is_same_as_billing'] == 'true') {
                
                $_POST['billing_first_name'] = $_POST['shipping_first_name'];
                $_POST['billing_last_name'] = $_POST['shipping_last_name'];
                $_POST['billing_company'] = $_POST['shipping_company'];
                $_POST['billing_address_1'] = $_POST['shipping_address_1'];
                $_POST['billing_address_2'] = $_POST['shipping_address_2'];
                $_POST['billing_city'] = $_POST['shipping_city'];
                $_POST['billing_country'] = $_POST['shipping_country'];
                $_POST['billing_state'] = $_POST['shipping_state'];
                $_POST['billing_postcode'] = $_POST['shipping_postcode'];
                $_POST['billing_email'] = $_POST['shipping_wooccm13'];

            }
            // Add error messages 
            if ( ! (int) isset( $_POST['covid_19_individual_travel_agreement'] ) ) {
                $agreement_reminder_text = '<strong>We\'re sorry, but you are not able to order a test at this time if you are not traveling domestically or internationally.</strong>';

                wc_add_notice( __( $agreement_reminder_text ), 'error' );
            }
            if ( $_POST['shipping_first_name'] == '' ) {
                wc_add_notice( __( '<strong>Patient First Name</strong> is a required field.' ), 'error' );
            }
            if ( $_POST['shipping_last_name'] == '' ) {
                wc_add_notice( __( '<strong>Patient Last Name</strong> is a required field.' ), 'error' );
            }
            if ( $_POST['shipping_address_1'] == '' ) {
                wc_add_notice( __( '<strong>Patient Address</strong> is a required field.' ), 'error' );
            }
            if ( $_POST['shipping_city'] == '') {
                wc_add_notice( __( '<strong>Patient City</strong> is a required field.' ), 'error' );
            }
            if ( $_POST['shipping_state'] == '' ) {
                wc_add_notice( __( '<strong>Patient State</strong> is a required field.' ), 'error' );
            }
            if ( $_POST['shipping_postcode'] == '' ) {
                wc_add_notice( __( '<strong>Patient Zip Code</strong> is a required field.' ), 'error' );
            }
            if ( $_POST['shipping_wooccm13'] == '' ) {
                wc_add_notice( __( '<strong>Patient Email Address</strong> is a required field.' ), 'error' );
            }

        }
    } // end function 

} // end class

$igenex_woocommerce_checkout = new Checkout();