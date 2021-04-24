<?php 
/**
 * Contains items specific to the products with the category covid-19-individual. 
 * While most items are in this class, there are a few items that can also be found in the 
 * functions.php file.
 */
namespace IGeneX\Theme\WooCommerce;

class COVID_19_Individual {

  
    public function __construct() {

        add_action( 'woocommerce_review_order_before_submit', array($this, 'igx_add_checkout_covid_19_travel_notice'), 9 );

        // Not being used 10/2020
        add_action( 'woocommerce_before_cart', array($this, 'igx_check_cart_contents') );
        // add_action( 'woocommerce_checkout_process', array($this,'igx_travel_agreement_not_chosen') );

        add_action( 'woocommerce_checkout_process', array($this,'covid_19_individual_modify_billing_fields_on_checkout') );

        add_action('woocommerce_before_checkout_form', array($this, 'setup_covid_19_individual'));

        add_action( 'woocommerce_after_checkout_validation', array($this, 'checkout_validation_removing_billing_field_errors'), 9999, 2 );

        add_filter( 'woocommerce_checkout_required_field_notice', array($this,'filter_woocommerce_checkout_required_field_notice'), 10, 2 ); 

        add_action( 'woocommerce_order_details_before_order_table', array($this, 'covid_19_individual_change_receipt'), 20, 1 );

        // FILTERS
        add_filter( 'igx_product_is_covid_19_individual', array($this, 'igx_check_product_for_covid_19_individual'), 10, 1 );

        add_filter( 'igx_cart_contains_covid_19_individual', array($this, 'igx_check_cart_contents_for_covid_19_individual'), 10, 1 );

        add_filter( 'igx_order_contains_covid_19_individual', array($this, 'check_order_for_covid_19_invdividual'), 10, 1 );

        // END FILTERS

    } // end function construct

    /**
     * Add an action to check the current contents of the cart for the 
     * covid-19-individual tests
     */

    public function igx_check_cart_contents_for_covid_19_individual($cart = null) {
        if($cart == '' || $cart == null) {
            $cart = WC()->cart->get_cart();
        }
        foreach( $cart as $key => $item ){
            $cart_product_term_slugs = wp_get_post_terms($item['product_id'],'product_cat',array('fields'=>'id=>slug'));
            foreach($cart_product_term_slugs as $cart_product_term_slug) {
                if($cart_product_term_slug == 'covid-19-individual') {
                    return true;
                }
            }
        }
        return false;

    } // end function
    

    public function igx_check_cart_contents() {
        $cart_has_covid_19_individual_test = $this->igx_check_cart_contents_for_covid_19_individual();

        if($cart_has_covid_19_individual_test) {
            // add_action( 'woocommerce_proceed_to_checkout', array($this,'igx_covid_travel_notice_checkbox'), 5 );
            ?>
            <style type="text/css">
                .woocommerce-shipping-totals.shipping {
                    display: none !important;
                }
            </style>
            <?php
        }

    } // end function

    /**
     * Add an action to check if the current product contains
     * covid-19-individual tests
     */

    public function igx_check_product_for_covid_19_individual($product_id) {
        $product_term_slugs = wp_get_post_terms($product_id,'product_cat',array('fields'=>'id=>slug'));

        foreach($product_term_slugs as $product_term_slug) {
            if($product_term_slug == 'covid-19-individual') {
                return true;
            }
        }
        return false;

    } // end function
    /**
     * Add a checkbox to the cart regarding international or domestic travel 
     * for the covid-19-individual tests
     */
    public function igx_covid_travel_notice_checkbox() {
        echo '<p class="covid-19-checkboxes">Please choose one of the following:</p>';
        woocommerce_form_field( 'covid_19_traveling', array(
            'type'          => 'checkbox',
            'class'         => array('form-row covid-19-checkboxes'),
            'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-covid_19_traveling checkbox'),
            'input_class'   => array('woocommerce-form__input woocommerce-form__input-covid_19_traveling input-checkbox'),
            'required'      => false,
            'label'         => sprintf( __( "I am traveling domestically or internationally in the near future.", "woocommerce" ),
                            '' ),
        ));
        woocommerce_form_field( 'covid_19_testing_purpose', array(
            'type'          => 'checkbox',
            'class'         => array('form-row covid-19-checkboxes'),
            'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-covid_19_testing_purpose checkbox'),
            'input_class'   => array('woocommerce-form__input woocommerce-form__input-covid_19_testing_purpose input-checkbox'),
            'required'      => false,
            'label'         => sprintf( __( "I am getting testing for another purpose.", "woocommerce" ),
                            '' ),
        ));
        // jQuery code start below
        ?>
        <style type="text/css">
            p.covid-19-checkboxes{ 
                 margin-bottom: 10px;
            }
            .form-row.covid-19-checkboxes {
                margin-bottom: 0;
            }
            .form-row.covid-19-checkboxes .optional {
                display: none !important;
            }
            .checkout-button.button {
                margin-top: 10px !important;
            }
            .form-row.covid-19-checkboxes label {
                font-size: 16px;
            }
        </style>
        <script src="https://unpkg.com/sweetalert2@8.8.1/dist/sweetalert2.all.min.js"></script>
        <script src="https://unpkg.com/promise-polyfill@8.1.0/dist/polyfill.min.js"></script>
        <script type="text/javascript">
        jQuery( function($){
            var a = '.checkout-button',     b = '#covid_19_traveling', c = '#covid_19_testing_purpose',
            d = '<?php echo wc_get_checkout_url(); ?>',     e = 'disabled';

            // Set disable button state
            $(a).addClass(e).prop('href', '#');

            // Woocommerce Ajax cart events
            $('body').on('updated_cart_totals removed_from_cart', function(){
                if( ! ( $(a).hasClass(e) && ($(b).prop('checked') || $(c).prop('checked')) ) ){
                    $(a).addClass(e).prop('href', '#');
                }
            })

            // On button click event
            $('body').on('click', a, function(e){
                if( ! ($(b).prop('checked') || $(c).prop('checked')) ) {
                    // Disable "Proceed to checkout" button
                    e.preventDefault();
                    // disabling button state
                    if( ! $(a).hasClass(e) ){
                        $(a).addClass(e).prop('href', '#');
                    }
                    // Sweet alert 2
                    swal.fire({
                        title:  '<?php _e("Travel Notice", "woocommerce"); ?>',
                        text:   '<?php _e("We\'re sorry, but you are not able to order a test at this time if you are not traveling domestically or internationally.", "woocommerce"); ?>',
                        type:   'error',
                        timer:  6500,
                        showConfirmButton: false
                    });
                }
            });
            $(b).change(function(){
                if($(this).prop('checked')){
                    enable_proceed_to_checkout();
                    $(c).prop('checked', false);
                } else {
                    disable_proceed_to_checkout();
                }
            });
            $(c).change(function(){
                if($(this).prop('checked')){
                    enable_proceed_to_checkout();
                    $(b).prop('checked', false);
                } else {
                    disable_proceed_to_checkout();
                }
            });
            function enable_proceed_to_checkout() {
                if( $(a).hasClass(e) ){
                    $(a).removeClass(e).prop('href', d);
                }
            }
            function disable_proceed_to_checkout() {
                if( ! $(a).hasClass(e) ){
                    $(a).addClass(e).prop('href', '#');
                }
            }
        });
        </script>
        <?php
    }

    /**
     * Add the agreement checkbox before the submit payment button
     */
        
    public function igx_add_checkout_covid_19_travel_notice() {

        $cart_has_covid_19_individual_test = $this->igx_check_cart_contents_for_covid_19_individual();

        if($cart_has_covid_19_individual_test) {

            $checkout_agreement_text = 'The Patient or Responsible Party has acknowledged at the time of placing the order and appointment reservation that they accept all financial responsibility for services rendered at IGeneX, Inc., responsibility for following all guidance for sample collection, and authorizes IGeneX, Inc. to send test results via secured email.';

            woocommerce_form_field( 'covid_19_individual_travel_agreement', array(
                'type'          => 'checkbox',
                'class'         => array('form-row privacy'),
                'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
                'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
                'required'      => true,
                'label'         => $checkout_agreement_text,
                )); 
        } // end if

    
    } //end function


    /**
     * Show notice if customer does not tick the agreemement box when required
     */ 
        
    // public function igx_travel_agreement_not_chosen() {
    //     $cart_has_covid_19_individual_test = $this->igx_check_cart_contents_for_covid_19_individual();

    //     if($cart_has_covid_19_individual_test) {
    //         if ( ! (int) isset( $_POST['covid_19_individual_travel_agreement'] ) ) {
    //             $agreement_reminder_text = 'We\'re sorry, but you are not able to order a test at this time if you are not traveling domestically or internationally.';

    //             wc_add_notice( __( $agreement_reminder_text ), 'error' );
    //         } // end if
    //     } // end if
    // } // end function 

    /**
     * Filter function to see if the order contains a 
     * covid-19-individual product. Use with the filter 
     * igx_order_contains_covid_19_individual and pass
     * an order object
     */
    public function check_order_for_covid_19_invdividual($order) {
        $items = $order->get_items(); 
        foreach ( $items as $item_id => $item ) {
            $product_term_slugs = wp_get_post_terms($item['product_id'],'product_cat',array('fields'=>'id=>slug'));
            foreach($product_term_slugs as $product_term_slug) {
                if($product_term_slug == 'covid-19-individual') {
                    return true;
                } // end if
            } // end foreach
        } // end foreach
        return false;
    } // end function 


    public function setup_covid_19_individual() {

        $is_covid_19_individual_order = apply_filters('igx_cart_contains_covid_19_individual', WC()->cart->get_cart());
        if($is_covid_19_individual_order) {
            // add_filter( 'woocommerce_cart_needs_shipping_address', '__return_true', 50 );
            add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );
            $this->covid_19_individual_switch_billing_shipping();
            $this->covid_19_individual_checkout_styling();
            add_action('woocommerce_before_checkout_shipping_form', array($this, 'covid_19_individual_add_title_before_shipping_form'));

            add_action( 'woocommerce_after_order_notes', array($this, 'covid_19_individual_add_billing_checkbox'));

        }
    }
  
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
            .woocommerce-shipping-totals.shipping {
                display: none !important;
            }
            .checkbox.woocommerce-form__label.billing-info-is-different {
                font-size: 18px !important;
            }
            .woocommerce-shipping-fields h3 {
                font-family: "Lato", "helvetica neue", helvetica, arial, sans-serif !important;
                font-size: 16px;
                line-height: 1.5em;
                background-color: #19abe2;
                color: #fff;
                padding-top: 9px;
                padding-bottom: 9px;
                padding-left: 10px;
                width: 100%;
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
                $agreement_reminder_text = '<strong>You must agree to authorize IGeneX to send your test results via secured email.</strong>';

                wc_add_notice( __( $agreement_reminder_text ), 'error' );
            }
            // if ( $_POST['shipping_first_name'] == '' ) {
            //     wc_add_notice( __( '<strong>Patient First Name</strong> is a required field.' ), 'error' );
            // }
            // if ( $_POST['shipping_last_name'] == '' ) {
            //     wc_add_notice( __( '<strong>Patient Last Name</strong> is a required field.' ), 'error' );
            // }
            // if ( $_POST['shipping_address_1'] == '' ) {
            //     wc_add_notice( __( '<strong>Patient Address</strong> is a required field.' ), 'error' );
            // }
            // if ( $_POST['shipping_city'] == '') {
            //     wc_add_notice( __( '<strong>Patient City</strong> is a required field.' ), 'error' );
            // }
            // if ( $_POST['shipping_state'] == '' ) {
            //     wc_add_notice( __( '<strong>Patient State</strong> is a required field.' ), 'error' );
            // }
            // if ( $_POST['shipping_postcode'] == '' ) {
            //     wc_add_notice( __( '<strong>Patient Zip Code</strong> is a required field.' ), 'error' );
            // }
            // if ( $_POST['shipping_wooccm13'] == '' ) {
            //     wc_add_notice( __( '<strong>Patient Email Address</strong> is a required field.' ), 'error' );
            // }

        }
    } // end function 

    /**
     * If the patient info is the same, remove the errors about the billing 
     * info fields not being filled out
     */
    function checkout_validation_removing_billing_field_errors( $data, $errors ){

        $cart_has_covid_19_individual_test = apply_filters('igx_cart_contains_covid_19_individual', WC()->cart->get_cart());

        if($cart_has_covid_19_individual_test) {

            if(isset($_POST['covid_19_individual_patient_is_same_as_billing']) && $_POST['covid_19_individual_patient_is_same_as_billing'] == 'true') {
                
                 // Check for any validation errors
                if( ! empty( $errors->get_error_codes() ) ) {
            
                    // Remove all validation errors specific to billing
                    foreach( $errors->get_error_codes() as $code ) {
                        if($code == 'billing_first_name_required' || $code == 'billing_last_name_required' || $code == 'billing_address_1_required' || $code == 'billing_city_required' || $code == 'billing_state_required' || $code == 'billing_postcode_required' || $code == 'billing_country_required' || $code == 'billing_email_required') {
                            $errors->remove( $code );
                        }
                    }
            
                    // Add a unique custom one
                    $errors->add( 'validation', 'Please fill in all required fields to place order.' );
                }
            }
        }
      
    }
    /**
     * Change any required field error messages to remove the word shipping
     */
    public function filter_woocommerce_checkout_required_field_notice( $sprintf, $field_label ) { 
        $cart_has_covid_19_individual_test = apply_filters('igx_cart_contains_covid_19_individual', WC()->cart->get_cart());

        if($cart_has_covid_19_individual_test) {
            // remove any shipping references
            $sprintf = str_replace('Shipping ', '', $sprintf);
        }
        // make filter magic happen here... 
        return $sprintf; 
    } 

    /**
     * Change the shipping label on the checkout form
     */
    public function covid_19_individual_change_receipt($order) {

        $is_covid_19_individual_order = apply_filters('igx_order_contains_covid_19_individual', $order);
        if($is_covid_19_individual_order) {
            add_filter( 'gettext', array($this, 'covid_19_individual_change_order_receipt_strings'), 20, 3 );
        }
    }
    /** 
     * Change strings on the order receipt
     */
    public function covid_19_individual_change_order_receipt_strings( $translated_text, $text, $domain ) {
        switch ( $translated_text ) {
            case 'Shipping address' :
                $translated_text = __( 'Patient details', 'woocommerce' );
            break;
            case 'Billing address' :
                $translated_text = __( 'Billing details', 'woocommerce' );
            break;
        }
        return $translated_text;
    }
} // end class

$igenex_woocommerce_covid_19_individual = new COVID_19_Individual();