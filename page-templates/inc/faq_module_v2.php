<?php 

// This is the template for FAQ pages and includes a component to build the 
// structured data for FAQ pages

  if(get_sub_field('theme') != null && get_sub_field('theme') != '') {
    $acf_module_theme = get_sub_field('theme');
  } 

?>
<section id="" class="faqs faqs_v2 alternate <?php echo $acf_module_theme ?>">
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
  if($total_results < $total_num_faq) {
    $total_num_faq = $total_results;
  }
  if($total_results % 2 == 0){
    $column_break_num = intval($total_results / 2);
  }else{
    $column_break_num = intval($total_results / 2)+1;
  }

  $archive_link = esc_url( get_post_type_archive_link( 'faq') );
  $archive_link = str_replace('%faq_categories%', $acf_shortcode_category, $archive_link);

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
      <ul class="faq-list">
        <?php 
          $counter = 0; 
        ?>
        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
        $counter++; 
        $slug = rtrim(get_permalink(), '/');
        $faq_item_url = $archive_link . '#' . basename($slug);
            ?>
   
        <li>
          <!-- <div class="accordion-item-span"> -->
            <!-- Accordion tab title -->
            <a href="<?php echo $faq_item_url; ?>"><?php the_title() ;?></a>

        </li>
        <?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
        <?php wp_reset_query(); ?>

        <?php 
        if($total_num_faq < $total_results): 
          
          ?>

        
        <li><a href="<?php echo $archive_link; ?>">View More Results &raquo;</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
</section>
