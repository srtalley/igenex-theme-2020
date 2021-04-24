<?php 
/**
 * Contains items specific to the products with the category covid-19-individual. 
 * While most items are in this class, there are a few items that can also be found in the 
 * functions.php file.
 */
namespace IGeneX\Theme\WooCommerce;

class OrderReceipt {

  
    public function __construct() {
        add_action( 'woocommerce_order_details_after_order_table', array($this, 'woocommerce_modify_order_details_after_order_table'), 20, 1 );


    } // end function construct

    /**
     * Add items below a successful order
     */
    public function woocommerce_modify_order_details_after_order_table($order) { 
        $is_covid_19_individual_order = apply_filters('igx_order_contains_covid_19_individual', $order);
        if($is_covid_19_individual_order) {
                $appointments_launched = false;

                if(!$appointments_launched) {
                ?>
           
            <div class="grid-x grid-margin-x grid-padding-x order-details igx-covid-19-c100-24" id="product-19492" style="margin-bottom: 25px;">
                    <div class="cell large-12" style="background: #ecf8fe; padding-top: 60px; padding-bottom: 60px;">
                        <h2 class="covid-schedule" style="text-align: center;padding-bottom: 0;max-width: 800px;margin: 0 auto;display: block;">Thank you for ordering a COVID-19 test. Please schedule an appointment below to visit IGeneX.</h2> 
                                    <!-- Calendly inline widget begin -->
                     <div class="calendly-inline-widget" data-url="https://calendly.com/covid-19-test/same-day-testing" style="min-width:320px;height:660px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script> 
                    <!-- Calendly inline widget end -->
                    </div>
            </div>
            <style>
            @media (max-width: 679px) {
                .covid-schedule {
                margin-bottom: 30px !important;
                }
            }
            </style> 
            
            <?php 
            } // end if appointments launched
        }
        if(!$is_covid_19_individual_order) {
    
        ?>
    
        <div class="grid-x" style="background-color: #ECF8FE;padding-top: 30px; padding-bottom: 30px;">
            <div class="cell large-4 small-12 align-center" style="display: flex;">
                <div style="width: 80%; background-color: #fff;margin-top: 30px;margin-bottom: 30px;padding: 15px;" class="text-center  while-you-wait">
                <div class="grid-x">
                    <div class="cell small-12">
                        <h3 style="color: #3F474A;">While You Wait</h3>
                    </div>
                    <div class="cell small-12">
                        <img src="/assets/img/static/tear-oval.png" />
                    </div>
                    <div class="cell small-12">
                        <p><a style="display:block;width: 100%;text-decoration: underline;" href="/wp-content/uploads/2018/01/Infographic-AfterKitWasOrdered.pdf" target="_blank">Download the Full Instructions</a></p>
                    </div>
                    <div class="cell small-12 align-center" style="display: flex;">
                        <table style="width: 68%;border: none;">
                            <tr align="left">
                                <td><img src="/assets/img/static/paperclip.png" /></td>
                                <td><a href="/wp-content/uploads/2018/01/SPECIMEN-KIT-INSTRUCTIONS-OCT-16-2017.pdf" target="_blank">Blood Specimen Requirements</a></td>
                            </tr>
                            <tr align="left">
                                <td><img src="/assets/img/static/paperclip.png" /></td>
                                <td><a href="/wp-content/uploads/2018/01/BS-F-021-REV.005-URINE-SPECIMEN-COLLECTION-KIT-10-16-2017-DOMESTIC.pdf" target="_blank">Urine Specimen Requirements</a></td>
                            </tr>
                            <tr align="left">
                                <td><img src="/assets/img/static/paperclip.png" /></td>
                                <td><a href="/wp-content/uploads/2018/01/Doc_Misc_PCR_Instructions_Domestic_IGeneX.pdf" target="_blank">Misc. Specimen Requirements</a></td>
                            </tr>
                        </table>
    
                    </div>
                </div>
                </div>
            </div>
            <div class="cell large-8">
            <div style="width: 80%; background-color: #fff;margin-top: 30px;margin-bottom: 30px;padding: 15px;" class="text-center  while-you-wait">
                <div class="grid-x">
                    <div class="cell small-12">
                    <h3>Blood Draw Sites</h3>
                    </div>
                    <div class="cell small-6">
                        <a href="http://www.openmedicineinstitute.org/drawstations.html" target="_blank"><img src="https://s3.amazonaws.com/igenex-com/email/openmedicineinstitute.png" class="blood-draw-sitesIMG" width="200" /></a>
                    </div>
                    <div class="cell small-6">
                        <a href="https://www.arcpointlabs.com/find-your-location/" target="_blank"><img src="https://s3.amazonaws.com/igenex-com/email/arcpoint-labs.png" class="blood-draw-sitesIMG" width="200" /></a>
                    </div>
                    <div class="cell small-6">
                        <a href="http://www.affiliatedlab.com/About-Us/Locations.aspx" target="_blank"><img src="https://s3.amazonaws.com/igenex-com/email/affiliatedlab.png" class="blood-draw-sitesIMG" width="200" /></a>
                    </div>
                    <div class="cell small-6">
                        <a href="http://www.bioreference.com/thelaboratory/" target="_blank"><img src="https://s3.amazonaws.com/igenex-com/email/bioreference.png" class="blood-draw-sitesIMG" width="200" /></a>
                    </div>
                    <div class="cell small-6">
                        <a href="https://www.anylabtestnow.com/locations/" target="_blank"><img src="https://s3.amazonaws.com/igenex-com/email/anylabtest.png" class="blood-draw-sitesIMG" width="200" /></a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div>
        <?php 
    
        include('../page-templates/inc/how_it_works_module.php'); 
        } // end if not covid-19-individual
        ?>
    </div>
    <!-- Below is now included in order-details-custom-top.php -->
    <!-- <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push(<?php //print_r(json_encode($dataLayerPush)) ?>);
    </script> -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-96435260-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'UA-96435260-1');
    </script> -->
        <?php
    }
} // end class

$igenex_woocommerce_order_receipt = new OrderReceipt();