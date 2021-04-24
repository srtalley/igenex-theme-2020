<?php
require_once( dirname( __FILE__ ) . '/includes/class-woocommerce-checkout.php');
require_once( dirname( __FILE__ ) . '/includes/class-woocommerce-order-receipt.php');
require_once( dirname( __FILE__ ) . '/includes/class-woocommerce-covid-19-individual.php');
require_once( dirname( __FILE__ ) . '/includes/class-structured-data.php');

// require_once( dirname( __FILE__ ) . '/includes/class-woocommerce-appointments.php');

/**
 * Disable WordPress lazy loading
 */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

add_action( 'wp_enqueue_scripts', 'ds_enqueue_assets', 115 );
function ds_enqueue_assets() {
  
  wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato|Montserrat:400,700,800', array(), '');

  wp_enqueue_script( 'featherlight', get_stylesheet_directory_uri() . '/lib/featherlight.min.js', '', '1.7.12', true );
  wp_enqueue_style( 'featherlight', get_stylesheet_directory_uri() . '/lib/featherlight.min.css', array(), '1.7.12');
  wp_enqueue_script( 'masonry-fp', get_stylesheet_directory_uri() . '/lib/masonry.js', '', '4.2.1', true );
  wp_enqueue_script( 'magnific-popup', get_stylesheet_directory_uri() . '/lib/jquery.magnific-popup.min.js', '', '1.1.0', true );
  wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri() . '/lib/magnific-popup.css', array(), '1.1.0');
  wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/lib/isotope.pkgd.min.js', '', '3.0.6', true );
  wp_enqueue_script( 'youtube-iframe-api', '//www.youtube.com/iframe_api', '', '', true );
  // wp_enqueue_script( 'igenex', get_stylesheet_directory_uri() . '/lib/igenex.js', '', '1.0.1', true );
  add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );


}//end function ds_enqueue_assets
/**
 * Add items to wp_head
 */
// add_action('wp_head', 'igenex_head');
// function igenex_head() {
// 	if(is_page( 'covid-19-self-swab-instructions' )){   
//     echo '<script type="application/ld+json">{"@context":"https://schema.org/","@type":"HowTo","name":"HOW TO USE COVID-19 SELF-SWAB KIT","description":"HOW TO COLLECT YOUR ANTERIOR NASAL SWAB SAMPLE FOR COVID-19 TESTING","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","totalTime":"PT2M","supply":[{"@type":"HowToSupply","name":"Nasal Swab"},{"@type":"HowToSupply","name":"Buffer Tube"},{"@type":"HowToSupply","name":"Biohazard Bag"}],"step":[{"@type":"HowToStep","text":"Remove the swab from the container, being careful not to touch the soft end with your hand.","image":"https://igenex.com/covid-19-self-swab-instructions/","name":"Step 1","url":"https://igenex.com/covid-19-self-swab-instructions/"},{"@type":"HowToStep","text":"Insert the swab into your nostril. Do not insert it more than half an inch into your nostril.","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","name":"Step 2","url":"https://igenex.com/covid-19-self-swab-instructions/"},{"@type":"HowToStep","text":"Slowly twist the swab, rubbing it along the insides of your nostril for 15 seconds.","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","name":"Step 3","url":"https://igenex.com/covid-19-self-swab-instructions/"},{"@type":"HowToStep","text":"Place the swab in the tube","image":"https://www.youtube.com/watch?v=SW_RMsoZ8Uc","name":"Step 4","url":"https://igenex.com/covid-19-self-swab-instructions/"}]}</script>';
// 	}
// }
// loads acf option pages (globals)
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global Settings',
		'menu_slug' 	=> 'theme-global-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-global-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'iGeneX Leadership',
		'menu_title'	=> 'Leadership',
		'parent_slug'	=> 'theme-global-settings',
  ));
  
  acf_add_options_sub_page(array(
		'page_title' 	=> 'How It Works Description',
		'menu_title'	=> 'How It Works',
		'parent_slug'	=> 'theme-global-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Collection Kits',
		'menu_title'	=> 'Collection Kits',
		'parent_slug'	=> 'theme-global-settings',
	));


  acf_add_options_sub_page(array(
		'page_title' 	=> 'Forms and Policies',
		'menu_title'	=> 'Forms and Policies',
		'parent_slug'	=> 'theme-global-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Blood Draw Sites',
		'menu_title'	=> 'Blood Draw Sites',
		'parent_slug'	=> 'theme-global-settings',
	));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Press',
		'menu_title'	=> 'Press',
		'parent_slug'	=> 'theme-global-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Kit Tables',
		'menu_title'	=> 'Kit Tables',
		'parent_slug'	=> 'theme-global-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Lab Certifications',
		'menu_title'	=> 'Lab Certifications',
		'parent_slug'	=> 'theme-global-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Top Navigation',
		'menu_title'	=> 'Top Navigation',
		'parent_slug'	=> 'theme-global-settings',
	));
}

function register_my_menus() {
  register_nav_menus(
    array(
      'patient-menu' => __( 'Patient Menu' ),
			'footer-patient' => __( 'Footer Patient' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );
// Register Custom Taxonomy
function faq_type_taxonomy() {

  $labels = array(
      'name'                       => _x( 'FAQ Categories', 'Taxonomy General Name', 'igenex' ),
      'singular_name'              => _x( 'FAQ Category', 'Taxonomy Singular Name', 'igenex' ),
  );
  $rewrite = array(
      'slug'                       => 'frequently-asked-questions/faq-category',
      'with_front'                 => false,
      'hierarchical'               => false,
  );
  $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                    => $rewrite,
      'show_in_rest'               => true,
  );
  register_taxonomy( 'faq-category', array( 'updates' ), $args );

}
// add_action( 'init', 'faq_type_taxonomy', 0 );

function create_post_type() {


  register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQs' ),
        'singular_name' => __( 'FAQ' )
      ),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'taxonomies' => array( 'faq-category' ),
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
      'rewrite' => array(
        'slug' => 'frequently-asked-questions/%faq_categories%',
        'with_front' => false
      )
    )
  );
  add_post_type_support( 'faq', 'page-attributes' );

  /**
   * Disable single page for faq
   */
  function igx_faq_redirect_post() {
    if ( is_singular( 'faq' ) ) {
      wp_redirect( home_url(), 301 );
      exit;
    }
  }
  add_action( 'template_redirect', 'igx_faq_redirect_post' );

  register_taxonomy(
    'faq_categories',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    'faq',             // post type name
    array(
        'hierarchical' => true,
        'label' => 'FAQ Categories', // display name
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'frequently-asked-questions',    // This controls the base slug that will display before each term
            'with_front' => false  // Don't display the category base before
        )
    )
  );
  function igx_faq_pre_get_post( $query ) {
      if( is_tax( 'faq_categories' ) && !is_admin() && $query->is_main_query() ) {
          $query->set( 'posts_per_page', -1 );
          $query->set( 'orderby', array('date' => 'DESC' ));
      }
  }
  add_action( 'pre_get_posts', 'igx_faq_pre_get_post', 11);

	register_post_type( 'kit',
    array(
      'labels' => array(
        'name' => __( 'Collection Kits' ),
        'singular_name' => __( 'Collection Kit' )
      ),
      'public' => true,
      'rewrite' => array(
        'slug' => 'kit',
        'with_front' => false
      )
    )
  );
	register_post_type( 'disease',
    array(
      'labels' => array(
        'name' => __( 'Diseases' ),
        'singular_name' => __( 'Disease' )
      ),
      'public' => true,
			'template' => 'disease',
      'has_archive' => true,
      'rewrite' => array(
        'slug' => 'disease',
        'with_front' => false
      )
    )
  );
  register_post_type( 'press-release',
    array(
      'labels' => array(
        'name' => __( 'Press Releases' ),
        'singular_name' => __( 'Press Release' )
      ),
      'public' => true,
			'template' => 'press-release',
      'has_archive' => true,
      'rewrite' => array(
        'slug' => 'press-release',
        'with_front' => false
      )
    )
  );
  register_post_type( 'news-article',
    array(
      'labels' => array(
        'name' => __( 'News Articles' ),
        'singular_name' => __( 'News Article' )
      ),
      'public' => false,
      'show_ui' => true,
      'has_archive' => false,
      'rewrite' => array(
        'slug' => 'news-article',
        'with_front' => false
      )
    )
  );
  register_post_type( 'success-story',
    array(
      'labels' => array(
        'name' => __( 'Success Stories' ),
        'singular_name' => __( 'Success Story' )
      ),
      'public' => true,
      'show_ui' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
      'rewrite' => array(
        'slug' => 'igenex-success-stories',
        'with_front' => false
      )
    )
  );
}
add_action( 'init', 'create_post_type', 0 );

function ds_faq_change_category_link( $link, $post ) {
  if ( $post->post_type === 'faq' ) {
      if ( $terms = get_the_terms( $post->ID, 'faq_categories' ) )
          $link = str_replace( '%faq_categories%', current( $terms )->slug, $link );
      else
          $link = str_replace( '%faq_categories%', 'uncategorized', $link );
  }

  return $link;
}

add_filter( 'post_type_link', 'ds_faq_change_category_link', 10, 2 );



add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );

function remove_pgz_theme_support() {
remove_theme_support( 'wc-product-gallery-zoom' );
}

// custom function to darken hex value
function darken_color($rgb, $darker=1.25) {

	$hash = (strpos($rgb, '#') !== false) ? '#' : '';
	$rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
	if(strlen($rgb) != 6) return $hash.'000000';
	$darker = ($darker > 1) ? $darker : 1;

	list($R16,$G16,$B16) = str_split($rgb,2);

	$R = sprintf("%02X", floor(hexdec($R16)/$darker));
	$G = sprintf("%02X", floor(hexdec($G16)/$darker));
	$B = sprintf("%02X", floor(hexdec($B16)/$darker));

	return $hash.$R.$G.$B;
}

function my_acf_input_admin_footer() {

?>
<script type="text/javascript">
(function($) {

	// JS here
  acf.add_filter('color_picker_args', function( args, $field ){

  	// do something to args
  	args.palettes = ['#29398B', '#19ABE2', '#EB2A57','#93278C', '#3F4AAB', '#F8AE17','#138D81', '#78B442', '#3F474A']

  	// return
  	return args;

  });

})(jQuery);
</script>
<?php

}


////////////////////////////////////////////////////
// CUSTOM WIDGET AREAS
////////////////////////////////////////////////////
function dst_widgets_init() {

  register_sidebar( array(
    'name'          => 'Tick Talk Sidebar',
    'id'            => 'tick-talk-sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
} //end function ds_widgets_init
add_action( 'widgets_init', 'dst_widgets_init');


////////////////////////////////////////////////////
// WOOCOMMERCE ITEMS
////////////////////////////////////////////////////
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
add_action( 'after_setup_theme', 'woocommerce_support' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);


function get_private_order_notes( $order_id){
    global $wpdb;

    $table_perfixed = $wpdb->prefix . 'comments';
    $results = $wpdb->get_results("
        SELECT *
        FROM $table_perfixed
        WHERE  `comment_post_ID` = $order_id
        AND  `comment_type` LIKE  'order_note'
    ");

    foreach($results as $note){
        $order_note[]  = array(
            'note_id'      => $note->comment_ID,
            'note_date'    => $note->comment_date,
            'note_author'  => $note->comment_author,
            'note_content' => $note->comment_content,
        );
    }
    return $order_note;
}


add_action( 'template_redirect', 'custom_shop_page_redirect' );
function custom_shop_page_redirect() {
    if( is_shop() ){
			wp_redirect( home_url( '/order-a-test-kit/' ) );
		}
}




function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

// allows code in tinymce
function allow_all_tinymce_elements_attributes( $init ) {

    // Allow all elements and all attributes
    $ext = '*[*]';

    // Add to extended_valid_elements if it already exists
    if ( isset( $init['extended_valid_elements'] ) ) {
        $init['extended_valid_elements'] .= ',' . $ext;
    } else {
        $init['extended_valid_elements'] = $ext;
    }

    // return value
    return $init;
}
add_filter('tiny_mce_before_init', 'allow_all_tinymce_elements_attributes');


function woocommerce_after_product_show_how_it_works () {
  the_field('product_page_footer'); 

  // $product = wc_get_product();
  // $order_is_covid_19_individual = apply_filters('igx_product_is_covid_19_individual', $product->get_id());

  // if(!$order_is_covid_19_individual) {
    // include('page-templates/inc/how_it_works_module.php'); 
    // echo do_shortcode('[elementor-template id="23434"]');
  // }
	
	// Get the correct link - if it's a physician product, show the physican page
	// $product = wc_get_product();
	// $product_name = $product->get_name();
	// if (strpos($product_name, 'Physician') === false) {
	// 	$cart_link = "/order-a-test-kit/";
	// } else {
	// 	$cart_link = "/physician/order-a-test-kit/";
	// }
  ?>
  <!-- <div class="grid-x large-12 center" style="padding-bottom: 60px;">
      <div class="cell auto text-center">
          <a class="button" href="<?php //echo $cart_link; ?>" target="">Order Your Test Kit</a>
      </div>
    </div> -->
  <?php
}
add_action( 'woocommerce_after_single_product', 'woocommerce_after_product_show_how_it_works' );

/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/**
 * Modify the price display - hide it for a physician and show deposit
 * info for a patient. 
 */
function woocommerce_modify_price_display($price_html, $product){
  if(is_product()) {
    $order_is_covid_19_individual = apply_filters('igx_product_is_covid_19_individual', $product->get_id());

    if(!$order_is_covid_19_individual) {
      // If this is a patient product (without physician in the name), return the price with tooltip on deposit
      if (strpos($product->get_name(), 'Physician') === false) {
        $price_html .= '<span class="deposit" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="This deposit covers the cost of your test kit and will be deducted from your final testing fees. Receipt of payment for your testing and a signed original Requisition Form is required upon submission of your testing to IGeneX. Please see our Resources page for prices, forms, and payment process.">&nbsp;Deposit
        <span class="info-tip">
          <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><title>ToolTip</title><g transform="translate(0 -1)" fill="none" fill-rule="evenodd"><circle fill="#00AEEF" cx="4.5" cy="5.5" r="4.5"/><text font-family="Georgia-BoldItalic, Georgia" font-size="8" font-style="italic" font-weight="bold" fill="#FFF"><tspan x="3.037" y="8">i</tspan></text></g></svg>
        </span>
        </span>';
        return $price_html;
      } 
    } else {
      return $price_html;
    }
  } else {
    return $price_html;
  }
} // end function woocommerce_modify_price_display

add_filter( 'woocommerce_get_price_html', 'woocommerce_modify_price_display', 100, 2 );

/**
 * Add the view panel links below the cart button
 */
function woocommerce_modify_single_add_to_cart_button() {
    $product = wc_get_product();
    $order_is_covid_19_individual = apply_filters('igx_product_is_covid_19_individual', $product->get_id());

    if(!$order_is_covid_19_individual) {
        $view_panel = $product->get_attribute( 'view_panel' );
      ?>
      <div class="view-panel-links clear">
        <p>
            <a href="<?php echo $view_panel; ?>" target="_blank" class="view-panel">View Panel & Test Price List&nbsp;></a><br />
            <a href="https://igenex.com/wp-content/uploads/2018/01/BS-F-037-PAYMENT-AND-BILLING-POLICIES-REV.-006-10-21-16.pdf" target="_blank" class="view-panel">View Payment & Billing Process&nbsp;></a>
        </p>
      </div>
    <?php 
     }

}
add_action( 'woocommerce_after_add_to_cart_button', 'woocommerce_modify_single_add_to_cart_button' );



/**
 * Add a checkout banner above the checkout fields
 */
function igx_woocommerce_before_single_product_summary() {

  $custom_product_page_image = get_field('custom_product_page_image');
  if($custom_product_page_image != '') {
    $custom_style_tags = "background-image:url('" . $custom_product_page_image['url'] . "');"; 
    ?><style>.woocommerce div.product div.images.woocommerce-product-gallery {display: none !important;} </style><?php
  ?><div class="cell large-12 custom-product-background" style="<?php echo $custom_style_tags;?>" />
  <?php 
  add_action( 'woocommerce_single_product_summary', 'igx_woocommerce_after_single_product_summary', 100);
  } // end if
} // end function
add_action( 'woocommerce_single_product_summary', 'igx_woocommerce_before_single_product_summary', 0 );

function igx_woocommerce_after_single_product_summary() {
    ?>
  </div>

  <?php 
} // end function



function igx_woocommerce_before_add_to_cart_button() {
  ?>
<div class="number-qty-buttons">
  <div class="number-qty-up"></div>
  <div class="number-qty-down"></div>
</div>

<?php 
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'igx_woocommerce_before_add_to_cart_button', 100);


function wl ( $log )  {
  if ( is_array( $log ) || is_object( $log ) ) {
      error_log( print_r( $log, true ) );
  } else {
      error_log( $log );
  }
} // end write_log

/**
 * Add the page or post name to the body class
 */
function add_slug_and_page_name_to_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    $classes[] = $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_slug_and_page_name_to_body_class' );


/**
 * Shortcode to add any of the ACF modular sections 
 */
function add_acf_module_via_shortcode($acf_shortcode_attributes =[], $acf_shortcode_content = null, $acf_shortcode_tag = '') {

  //make the array keys and attributes lowercase
  $acf_shortcode_attributes = array_change_key_case((array)$acf_shortcode_attributes, CASE_LOWER);

  //override any default attributes with the user defined parameters
  $acf_shortcode_custom_attributes = shortcode_atts([
    'module' => 'how_it_works_module',
    'faq_count' => '',
    'faq_button' => '',
    'hide_title' => '',
    'category' => ''
  ], $acf_shortcode_attributes, $acf_shortcode_tag);

  if( $acf_shortcode_custom_attributes['module'] == 'blood_draw_module' ||
      $acf_shortcode_custom_attributes['module'] == 'employee_module' || 
      $acf_shortcode_custom_attributes['module'] == 'faq_module' || 
      $acf_shortcode_custom_attributes['module'] == 'faq_module_v2' || 
      $acf_shortcode_custom_attributes['module'] == 'how_it_works_module' ) {
        if($acf_shortcode_custom_attributes['faq_count'] > 0 || $acf_shortcode_custom_attributes['faq_count'] == '-1' ) {
          $acf_shortcode_faq_count = $acf_shortcode_custom_attributes['faq_count'];
        }
        if($acf_shortcode_custom_attributes['faq_button'] != '' ) {
          $acf_shortcode_faq_button = $acf_shortcode_custom_attributes['faq_button'];
        }
        if($acf_shortcode_custom_attributes['category'] != '' ) {
          $acf_shortcode_category = $acf_shortcode_custom_attributes['category'];
        }        
        
        if($acf_shortcode_custom_attributes['hide_title'] == 'true' ) {
          $acf_shortcode_hide_title = true;
        }
        // $acf_shortcode_template = $acf_shortcode_custom_attributes['template'];
        ob_start();

        include('page-templates/inc/' . $acf_shortcode_custom_attributes['module'] . '.php'); 
        
        $acf_shortcode_link = ob_get_clean();

        return $acf_shortcode_link;
      }
  
} //end function addLightbox

add_shortcode( 'acf-module', 'add_acf_module_via_shortcode' );


// Remove the singular view for the blood draw sites
// add_action(
//   'template_redirect',
//   function () {
//       if (is_singular('store_locator')) {
//          global $wp_query;
//          $wp_query->posts = [];
//          $wp_query->post = null;
//          $wp_query->set_404();
//          status_header(410);
//          nocache_headers();
//       }
//   }
// );

/*
 * Remove COVID products if more than one is in the cart
 */

add_action( 'woocommerce_add_to_cart', 'igx_check_product_added_to_cart', 10, 6 );

function igx_check_product_added_to_cart($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data) {

    // COVID Product IDs
    // $covid_product_ids = array(18229,18231,18232);
    // get the terms 
    $product_term_slugs = wp_get_post_terms($product_id,'product_cat',array('fields'=>'id=>slug'));

    foreach($product_term_slugs as $product_term_slug) {
      if($product_term_slug == 'covid-19') {
        // we are trying to add a COVID test. See if there's already one in the cart and if so, remove it.
        // see if it's not the same test, first

        foreach( WC()->cart->get_cart() as $key => $item ){
          if($product_id != $item['product_id']) {
            $cart_product_term_slugs = wp_get_post_terms($item['product_id'],'product_cat',array('fields'=>'id=>slug'));
            foreach($cart_product_term_slugs as $cart_product_term_slug) {
              if($cart_product_term_slug == 'covid-19') {
                // see the cats for this item 
                // remove the item
                WC()->cart->remove_cart_item($key);
                $cart_product = wc_get_product( $item['data']->get_id());
                $cart_product_title = $cart_product->get_title();
                wc_add_notice( __( 'The product "' . $cart_product_title . '" has been removed from your cart. At this time, you can only order one COVID-19 test.', 'theme_domain' ), 'notice' );
              } // end if
            } // end foreach
          } // end if
        } // end foreach 
      } // end if
     } // end foreach

}

/*
 * Allow only one quantity of the COVID items
 */

// add_action('woocommerce_before_calculate_totals', 'igx_check_product_update_totals', 20, 1 );
// function igx_check_product_update_totals($cart) {
//   if ( is_admin() && ! defined( 'DOING_AJAX' ) )
//   return;

//   if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
//     return;

//   // COVID Product IDs
//   $covid_product_ids = array(18229,18231,18232);
//   $new_qty = 1; // New quantity

//   // Checking cart items
//   foreach( $cart->get_cart() as $cart_item_key => $cart_item ) {
//     $product_id = $cart_item['data']->get_id();
//     // Check for specific product IDs and change quantity
//     if( in_array( $product_id, $covid_product_ids ) && $cart_item['quantity'] != $new_qty ){
//         $cart->set_quantity( $cart_item_key, $new_qty ); // Change quantity
//         wc_add_notice( __( 'At this time, you can only order one COVID-19 test.', 'igenex' ), 'notice' );
//     }
//   }

// }

/* YouTube responsive iframe */
/* https://mediarealm.com.au/articles/wordpress-responsive-youtube-embeds/ */
add_filter('embed_oembed_html', function ($html, $url, $attr, $post_id) {
	if(strpos($html, 'youtube.com') !== false || strpos($html, 'youtu.be') !== false){
  		return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
	} else {
	 return $html;
	}
}, 10, 4);


add_filter('embed_oembed_html', function($code) {
  return str_replace('<iframe', '<iframe class="embed-responsive-item" ', $code);
});

/**
 * Shortcode to add FAQs
 */
// function show_faqs($show_faqs_shortcode_attributes =[], $show_faqs_shortcode_content = null, $show_faqs_shortcode_tag = '') {

//   //make the array keys and attributes lowercase
//   $show_faqs_shortcode_attributes = array_change_key_case((array)$show_faqs_shortcode_attributes, CASE_LOWER);

//   //override any default attributes with the user defined parameters
//   $show_faqs_shortcode_custom_attributes = shortcode_atts([
//     'category' => 'all',
//     'faq_count' => '-1',
//   ], $show_faqs_shortcode_attributes, $show_faqs_shortcode_tag);

//   if( $show_faqs_shortcode_custom_attributes['category'] == 'all' ) {

//         if($acf_shortcode_custom_attributes['faq_count'] > 0 || $acf_shortcode_custom_attributes['faq_count'] == '-1' ) {
//             $acf_shortcode_faq_count = $acf_shortcode_custom_attributes['faq_count'];
//           }
//           if($acf_shortcode_custom_attributes['faq_button'] != '' ) {
//             $acf_shortcode_faq_button = $acf_shortcode_custom_attributes['faq_button'];
//           }
//           if($acf_shortcode_custom_attributes['category'] != '' ) {
//             $acf_shortcode_category = $acf_shortcode_custom_attributes['category'];
//           }        
          
//           if($acf_shortcode_custom_attributes['hide_title'] == 'true' ) {
//             $acf_shortcode_hide_title = true;
//           }
//           $acf_shortcode_template = $acf_shortcode_custom_attributes['template'];
//           ob_start();

//           include('page-templates/inc/' . $acf_shortcode_custom_attributes['module'] . '.php'); 
          
//           $acf_shortcode_link = ob_get_clean();

//           return $acf_shortcode_link;


//         return $show_faqs_shortcode_link;
//       }
  
// } //end function addLightbox

// add_shortcode( 'acf-module', 'add_acf_module_via_shortcode' );

function get_igenex_breadcrumbs()
{
    // Set variables for later use
    $here_text        = __( 'Home' );
    $home_link        = home_url('/');
    $home_text        = __( 'Home' );
    $link_before      = '<span typeof="v:Breadcrumb">';
    $link_after       = '</span>';
    $link_attr        = ' rel="v:url" property="v:title"';
    $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $delimiter        = ' &raquo; ';              // Delimiter between crumbs
    $before           = '<span class="current">'; // Tag before the current crumb
    $after            = '</span>';                // Tag after the current crumb
    $page_addon       = '';                       // Adds the page number if the query is paged
    $breadcrumb_trail = '';
    $category_links   = '';

    /** 
     * Set our own $wp_the_query variable. Do not use the global variable version due to 
     * reliability
     */
    $wp_the_query   = $GLOBALS['wp_the_query'];
    $queried_object = $wp_the_query->get_queried_object();

    // Handle single post requests which includes single pages, posts and attatchments
    if ( is_singular() ) 
    {
        /** 
         * Set our own $post variable. Do not use the global variable version due to 
         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
         */
        $post_object = sanitize_post( $queried_object );

        // Set variables 
        $title          = apply_filters( 'the_title', $post_object->post_title );
        $parent         = $post_object->post_parent;
        $post_type      = $post_object->post_type;
        $post_id        = $post_object->ID;
        $post_link      = $before . $title . $after;
        $parent_string  = '';
        $post_type_link = '';

        if ( 'post' === $post_type ) 
        {
            // Get the post categories
            $categories = get_the_category( $post_id );
            if ( $categories ) {
                // Lets grab the first category
                $category  = $categories[0];

                $category_links = get_category_parents( $category, true, $delimiter );
                $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
                $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
            }
        }

        if ( !in_array( $post_type, ['post', 'page', 'attachment'] ) )
        {
            $post_type_object = get_post_type_object( $post_type );
            $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );
            $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
        }

        if ( 'faq' === $post_type ) 
        {
            // Get the faq categories
            $faq_categories = get_the_terms( $post_id, 'faq_categories' );
            if ( $faq_categories ) {

                // Lets grab the first category
                $faq_category  = $faq_categories[0];
                $faq_category_term_links = get_term_link($faq_category);
                $faq_category_links = get_term_parents_list( $faq_category->term_id, 'faq_categories', array('separator' => $delimiter));

            }
            $archive_link = str_replace('%faq_categories%/' , '', $archive_link);
            $post_type_link   = sprintf( $link, $archive_link, 'Frequently Asked Questions' );

        }
        // Get post parents if $parent !== 0
        if ( 0 !== $parent ) 
        {
            $parent_links = [];
            while ( $parent ) {
                $post_parent = get_post( $parent );

                $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

                $parent = $post_parent->post_parent;
            }

            $parent_links = array_reverse( $parent_links );

            $parent_string = implode( $delimiter, $parent_links );
        }

        // Lets build the breadcrumb trail
        if ( $parent_string ) {
            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
        } else {
            $breadcrumb_trail = $post_link;
        }
      if ( $faq_category_links && $post_type_link ) {
        $breadcrumb_trail = $post_type_link . $delimiter . $faq_category_links . $delimter . $breadcrumb_trail;

      } else if($post_type_link) {
        $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

      }

      if ( $category_links )
            $breadcrumb_trail = $category_links . $breadcrumb_trail;
    }

    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
    if( is_archive() )
    {

        if (    is_category()
             || is_tag()
             || is_tax()
        ) {

            // Set the variables for this section
            $term_object        = get_term( $queried_object );
            $taxonomy           = $term_object->taxonomy;
            $term_id            = $term_object->term_id;
            $term_name          = $term_object->name;
            $term_parent        = $term_object->parent;
            $taxonomy_object    = get_taxonomy( $taxonomy );
            $current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
            $parent_term_string = '';
            if ( $taxonomy == 'faq_categories' ) {
              $current_term_link  = $before . $term_name . $after;
            }
            if ( 0 !== $term_parent )
            {
                // Get all the current term ancestors
                $parent_term_links = [];
                while ( $term_parent ) {
                    $term = get_term( $term_parent, $taxonomy );

                    $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

                    $term_parent = $term->parent;
                }

                $parent_term_links  = array_reverse( $parent_term_links );
                $parent_term_string = implode( $delimiter, $parent_term_links );
            }

            if ( $parent_term_string ) {
                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
            } else {
                $breadcrumb_trail = $current_term_link;
            }

        } elseif ( is_author() ) {

            $breadcrumb_trail = __( 'Author archive for ') .  $before . $queried_object->data->display_name . $after;

        } elseif ( is_date() ) {
            // Set default variables
            $year     = $wp_the_query->query_vars['year'];
            $monthnum = $wp_the_query->query_vars['monthnum'];
            $day      = $wp_the_query->query_vars['day'];

            // Get the month name if $monthnum has a value
            if ( $monthnum ) {
                $date_time  = DateTime::createFromFormat( '!m', $monthnum );
                $month_name = $date_time->format( 'F' );
            }

            if ( is_year() ) {

                $breadcrumb_trail = $before . $year . $after;

            } elseif( is_month() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

            } elseif( is_day() ) {

                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
                $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
            }

        } elseif ( is_post_type_archive() ) {

            $post_type        = $wp_the_query->query_vars['post_type'];
            $post_type_object = get_post_type_object( $post_type );

            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

        }
    }   

    // Handle the search page
    if ( is_search() ) {
        $breadcrumb_trail = __( 'Search query for: ' ) . $before . get_search_query() . $after;
    }

    // Handle 404's
    if ( is_404() ) {
        $breadcrumb_trail = $before . __( 'Error 404' ) . $after;
    }

    // Handle paged pages
    if ( is_paged() ) {
        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        $page_addon   = $before . sprintf( __( ' ( Page %s )' ), number_format_i18n( $current_page ) ) . $after;
    }

    $breadcrumb_output_link  = '';
    $breadcrumb_output_link .= '<div class="igenex-breadcrumb">';
    if (    is_home() || is_front_page() ) {
        // Do not show breadcrumbs on page one of home and frontpage
        if ( is_paged() ) {
            $breadcrumb_output_link .= $here_text . $delimiter;
            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
            $breadcrumb_output_link .= $page_addon;
        }
    } else if($taxonomy == 'faq_categories') {
      $archive_link = esc_url( get_post_type_archive_link( 'faq') );
      $archive_link = str_replace('%faq_categories%/', '', $archive_link);
      $breadcrumb_output_link .= sprintf( $link, $archive_link, 'Frequently Asked Questions' );
      
     
            $breadcrumb_output_link .= $delimiter . $term_name;
    } else if('faq' === $post_type) {

      $breadcrumb_output_link .= $breadcrumb_trail;
      $breadcrumb_output_link .= $page_addon;

    } else {
        $breadcrumb_output_link .= $here_text . $delimiter;
        $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a>';
        $breadcrumb_output_link .= $delimiter;
        $breadcrumb_output_link .= $breadcrumb_trail;
        $breadcrumb_output_link .= $page_addon;
    }
    $breadcrumb_output_link .= '</div><!-- .breadcrumbs -->';

    return $breadcrumb_output_link;
}

/**
 * Replace the stylesheet loading function so we can update the versions
 */
define('STYLESHEET_VERSION', '2020.10.07');
define('JS_VERSION', '2020.08.10a');


if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {
		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . foundationpress_asset_path( 'app.css' ), array(), STYLESHEET_VERSION, 'all' );

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

    // Deregister the jquery-migrate version bundled with WordPress.
    wp_deregister_script( 'jquery-migrate' );

    // CDN hosted jQuery migrate for compatibility with jQuery 3.x
		wp_enqueue_script( 'jquery-migrate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.2.0/jquery-migrate.min.js', array(), '3.2.0', false );

		// wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		// wp_enqueue_script( 'jquery-migrate' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/dist/assets/js/' . foundationpress_asset_path( 'app.js' ), array( 'jquery' ), JS_VERSION, true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		//wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;

/**
 * Show a message if the TC gateway is in test mode
 */
add_action('admin_notices', 'igx_gateway_admin_notice');
function igx_gateway_admin_notice(){
  // HERE define you payment gateway ID (from $this->id in your plugin code)
  $payment_gateway_id = 'offline_gateway';

  // Get an instance of the WC_Payment_Gateways object
  $payment_gateways   = WC_Payment_Gateways::instance();

  // Get the desired WC_Payment_Gateway object
  $payment_gateway    = $payment_gateways->payment_gateways()[$payment_gateway_id];

  if($payment_gateway->use_test_data) {
    echo '<div class="notice notice-error">
    <p><strong>WARNING:</strong> The TrustCommerce Gateway is in Test Mode. No real transactions will be processed.</p>
    </div>';
  }
}




// add_action('woocommerce_checkout_process', 'dst_set_woocommerce_checkout_payment_method', 10);
// add_action('woocommerce_checkout_order_processed','dst_woocommerce_checkout_process_hook', 10);
//     /* Force the gateway to be processed even on a physician order */

//     /*
//     * Set the $_POST payment_method to offline_gateway 
//     */
//   function dst_set_woocommerce_checkout_payment_method() {
//       $_POST['payment_method'] = 'offline_gateway';
//   }

//   /*
//   * Hook into the woocommerce_checkout_order_processed hook
//   * in order to filter the needs_payment function. We don't 
//   * want to run this until the order has been processed,
//   * otherwise the credit card form is shown on the checkout
//   * page.
//   */

//   function dst_woocommerce_checkout_process_hook(){
//       add_filter( 'woocommerce_cart_needs_payment', 'dst_filter_woocommerce_cart_needs_payment', 10, 2 ); 
//   }

//   /*
//   * Always return true for the cart needs_payment function
//   */
//   function dst_filter_woocommerce_cart_needs_payment( $payment_status, $cart ) { 
//       return true;
//   }
          