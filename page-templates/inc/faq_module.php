<?php 

// This is the template for FAQ pages and includes a component to build the 
// structured data for FAQ pages

$dst_structured_data_faq  = '{';
$dst_structured_data_faq .= ' "@context": "https://schema.org",';
$dst_structured_data_faq .= ' "@type": "FAQPage",';
$dst_structured_data_faq .= ' "mainEntity": [';

?>

<a class="anchor" id="faq_module"></a>
<?php

  // $acf_module_theme = 'patient';
  if(get_sub_field('theme') != null && get_sub_field('theme') != '') {
    $acf_module_theme = get_sub_field('theme');
  } 

?>
<section id="" class="faqs alternate <?php echo $acf_module_theme ?>">
<?php
  $total_num_faq = 10;
  if(get_sub_field('faq_count') > 0) {
    $total_num_faq = get_sub_field('faq_count');
  } else if($acf_shortcode_faq_count != null && ($acf_shortcode_faq_count > 0 || $acf_shortcode_faq_count == '-1')) {
    $total_num_faq = $acf_shortcode_faq_count;
  }
  if($acf_shortcode_category == null || $acf_shortcode_category == '') {
    $acf_shortcode_category = 'general';
  }
  $args = array(
  'orderby' => 'date',
  'post_type' => 'faq',
  // 'category_name' => $acf_shortcode_category,
  'posts_per_page' => $total_num_faq,
  'tax_query' => array(
    array(
      'taxonomy' => 'faq_categories',
      'field' => 'slug',
      'terms' => $acf_shortcode_category
    )
  )
  );
  $the_query = new WP_Query( $args );
  $total_results = $the_query->found_posts;
  if($total_results % 2 == 0){
    $column_break_num = intval($total_results / 2);
  }else{
    $column_break_num = intval($total_results / 2)+1;
  }

?>

<div class="grid-container grid-container-padded">
  <?php if(!$acf_shortcode_hide_title): ?>
  <div class="grid-x">
    <div class="cell small-12">
        <h2>FAQs</h2>
    </div>
  </div>
  <?php endif; ?>
  <div class="grid-x">
    <div class="cell small-12">
      <ul class="accordion" data-accordion data-allow-all-closed="true">
        <?php 
          $counter = 0; 
        ?>
        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php 
          $counter++; 
          $dst_structured_data_faq .= ' {';
            $dst_structured_data_faq .= '   "@type": "Question",';
            $dst_structured_data_faq .= '   "name": "' . wp_strip_all_tags(get_the_title()) . '",';
            $dst_structured_data_faq .= '   "acceptedAnswer": {';
            $dst_structured_data_faq .= '     "@type": "Answer",';
            $dst_structured_data_faq .= '     "text": "' . wp_strip_all_tags(get_the_content()) . '"';
            $dst_structured_data_faq .= '    }';
            $dst_structured_data_faq .= '  }';
            if($counter != $total_results) {
              $dst_structured_data_faq .= ',';
            } else {
              $dst_structured_data_faq .= ']';
              $dst_structured_data_faq .= '}';
            }?>
        <li class="accordion-item" data-accordion-item>
          <!-- <div class="accordion-item-span"> -->
            <!-- Accordion tab title -->
            <a href="#" class="accordion-title"><?php the_title() ;?></a>

            <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
            <div class="accordion-content" data-tab-content>
              <?php the_content() ;?>

            </div>
          <!-- </div> -->
        </li>
        <?php if ($counter == $column_break_num) : ?>
          <li class="accordion-column-break"></li>
        <?php endif; ?>
        <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
        <?php wp_reset_query(); ?>

      </ul>
    </div>
  </div>
  <?php
  $faq_count = $total_num_faq;

  if(($faq_count != '-1') &&$faq_count <= $counter ) :
    $faq_button_link = '#';
    if(get_sub_field('faq_button') != null && get_sub_field('faq_button') != '') {
      $faq_button_link = get_sub_field('faq_button');
    } else if($acf_shortcode_faq_count != null && $acf_shortcode_faq_count != '') {
      $faq_button_link = $acf_shortcode_faq_button;
    }
   ?>
  <div class="grid-x align-center">
    <div class="cell shrink">
      <a href="<?php echo $faq_button_link ?>" class="button">More FAQs</a>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php     
    // echo the structured data 
    $dst_structured_data_faq_wrapper  = '<script type="application/ld+json">';
    $dst_structured_data_faq_wrapper .= $dst_structured_data_faq;
    $dst_structured_data_faq_wrapper .= '</script>';
    echo $dst_structured_data_faq_wrapper; 
?>
</section>
