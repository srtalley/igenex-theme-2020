<?php 
/**
 * Contains items specific to the products with the category covid-19-individual. 
 * While most items are in this class, there are a few items that can also be found in the 
 * functions.php file.
 */
namespace IGeneX\Theme\WooCommerce;

class WooCommerceAppointments {

  
    public function __construct() {

        add_action('wp_head', array($this, 'add_structured_data'));


    } // end function construct
    /**
     * Remove time slot headings from WooCommerce Appointments plugin
     */
    public function add_structured_data() {
        if(is_page( 'covid-19-self-swab-instructions' )){
            echo '<script type="application/ld+json">{"@context":"https://schema.org/","@type":"HowTo","name":"HOW TO USE COVID-19 SELF-SWAB KIT","description":"HOW TO COLLECT YOUR ANTERIOR NASAL SWAB SAMPLE FOR COVID-19 TESTING","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","totalTime":"PT2M","supply":[{"@type":"HowToSupply","name":"Nasal Swab"},{"@type":"HowToSupply","name":"Buffer Tube"},{"@type":"HowToSupply","name":"Biohazard Bag"}],"step":[{"@type":"HowToStep","text":"Remove the swab from the container, being careful not to touch the soft end with your hand.","image":"https://igenex.com/covid-19-self-swab-instructions/","name":"Step 1","url":"https://igenex.com/covid-19-self-swab-instructions/"},{"@type":"HowToStep","text":"Insert the swab into your nostril. Do not insert it more than half an inch into your nostril.","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","name":"Step 2","url":"https://igenex.com/covid-19-self-swab-instructions/"},{"@type":"HowToStep","text":"Slowly twist the swab, rubbing it along the insides of your nostril for 15 seconds.","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","name":"Step 3","url":"https://igenex.com/covid-19-self-swab-instructions/"},{"@type":"HowToStep","text":"Place the swab in the tube","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","name":"Step 4","url":"https://igenex.com/covid-19-self-swab-instructions/"}]}</script>';
        }
        if(is_product() && get_the_id() == 1024){
            echo '<script type="application/ld+json">{"@context":"https://schema.org/","@type":"HowTo","name":"HOW IT WORKS: Blood Collection Kit","image":"https://cdn.igenex.com/wp-content/uploads/igenex-blood-collection-kit-whats-in-the-box-no-letters.jpg","supply":{"@type":"HowToSupply","name":"IGeneX Blood Collection Kit"},"step":[{"@type":"HowToStep","text":"Order a collection kit right here on the IGeneX website for a small deposit that will be applied to your testing fees.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-01-1.png","name":"Order a kit","url":"https://igenex.com/product/serum-whole-blood-collection-kit/"},{"@type":"HowToStep","text":"Complete the paperwork with your doctor to determine which tests IGeneX should conduct with your samples.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-02-1.png","name":"Complete Paperwork","url":"https://igenex.com/product/serum-whole-blood-collection-kit/"},{"@type":"HowToStep","text":"Take your collection kit to a blood draw site to have your sample collected.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-03-1.png","name":"Get Blood Drawn","url":"https://igenex.com/product/serum-whole-blood-collection-kit/"},{"@type":"HowToStep","text":"Ship everything to IGeneX. We will conduct the appropriate tests and send the results to your doctor.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-04-1.png","name":"Get Results","url":"https://igenex.com/product/serum-whole-blood-collection-kit/"}]}</script>';
        }
        if(is_product() && get_the_id() == 842){
            echo '<script type="application/ld+json">{"@context":"https://schema.org/","@type":"HowTo","name":"HOW IT WORKS : URINE COLLECTION KIT","image":"https://cdn.igenex.com/wp-content/uploads/2018/02/Urine-Collection-Kit-What-Is-Included.svg","supply":{"@type":"HowToSupply","name":"IGeneX Urine Collection Kit"},"step":[{"@type":"HowToStep","text":"Order a collection kit right here on the IGeneX website for a small deposit that will be applied to your testing fees.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-01-1.png","name":"Order a kit","url":"https://igenex.com/product/urine-collection-kit/"},{"@type":"HowToStep","text":"Complete the paperwork with your doctor to determine which tests IGeneX should conduct with your samples.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-02-1.png","name":"Complete Paperwork","url":"https://igenex.com/product/urine-collection-kit/"},{"@type":"HowToStep","text":"Draw your urine sample in the privacy of your own home.","image":"https://cdn.igenex.com/wp-content/uploads/urine-test.png","name":"Draw Sample","url":"https://igenex.com/product/urine-collection-kit/"},{"@type":"HowToStep","text":"Ship everything to IGeneX. We will conduct the appropriate tests and send the results to your doctor.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-04-1.png","name":"Get Results","url":"https://igenex.com/product/urine-collection-kit/"}]}</script>';
        }
        if(is_product() && get_the_id() == 1025){
            echo '<script type="application/ld+json">{"@context":"https://schema.org/","@type":"HowTo","name":"How To Use IGX MISCELLANEOUS COLLECTION KIT","description":"The Miscellaneous Collection Kit is compatible with tests that require samples other than blood or urine, such as cerebral spinal fluid (CSF), tissue, placenta, breast milk, etc. We also offer a Blood Collection Kit and Urine Collection Kit that are compatible with other tests. Please note that the Miscellaneous Collection Kit is not the actual test. You still need to work with a doctor to order your tests. You will then send everything to IGeneX for testing.","image":"https://cdn.igenex.com/wp-content/uploads/2018/03/IGeneX-Miscellaneous-Test-Kit-Box-Contents.svg","supply":{"@type":"HowToSupply","name":"IGenex IGX MISCELLANEOUS COLLECTION KIT"},"step":[{"@type":"HowToStep","text":"Order a collection kit right here on the IGeneX website for a small deposit that will be applied to your testing fees","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-01-1.png","name":"Order a kit","url":"https://igenex.com/product/misc-collection-kit/"},{"@type":"HowToStep","text":"Complete the paperwork with your doctor to determine which tests IGeneX should conduct with your samples.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-02-1.png","name":"Complete Paperwork","url":"https://igenex.com/product/misc-collection-kit/"},{"@type":"HowToStep","text":"Take your collection kit to a specialist to get your sample drawn.","image":"https://cdn.igenex.com/wp-content/uploads/csf-tube-1.png","name":"Get Sample Drawn","url":"https://igenex.com/product/misc-collection-kit/"},{"@type":"HowToStep","text":"Ship everything to IGeneX. We will conduct the appropriate tests and send the results to your doctor.","image":"https://cdn.igenex.com/wp-content/uploads/how-it-works-04-1.png","name":"Get Results","url":"https://igenex.com/product/misc-collection-kit/"}]}</script>';
        }
    }
   
} // end class

$igenex_woocommerce_appointments = new WooCommerceAppointments();