<a class="anchor" id="collection_kit_summary_module"></a>
<?php 
$custom_style = '';
$section_margin_top = get_sub_field('margin_top'); 
if(!empty($section_margin_top)){
  $custom_style = 'style="margin-top: ' . $section_margin_top . 'px;"';
 }
?>
<section id="" class="collection-kits <?php the_field('theme'); ?> <?php the_sub_field('kit_show_product_images'); ?>" <?php echo $custom_style; ?>>
  <div class="grid-container" style="padding: 0 15px 80px;">
    <div class="grid-x">
      <div class="cell text-<?php the_sub_field('kit_alignment'); ?>">
        <div class="spacer"></div>
        <h2>COLLECTION KITS</h2>
      </div>
    </div>

        <div class="grid-x" style="padding-top: 30px;">
                
            <div class="small-12 large-4 text-center">
                <img width="385" height="250" src="/wp-content/uploads/blood-kit.jpg" class="attachment-large size-large" alt="">
            </div>
            <div class="small-12 large-6 large-offset-1 align-self-middle"> 
                <p style="font-size: 22px; line-height: 36px;">The first step in getting tested by IGeneX is to order a collection kit. <a href="/physician/order-a-test-kit/">Doctors</a> and <a href="/order-a-test-kit/">patients</a> can order a kit directly from our website. This includes the Blood Collection Kit, Urine Collection Kit, or Miscellaneous Collection Kit.</p>
            </div>

        </div>
    
</section>
