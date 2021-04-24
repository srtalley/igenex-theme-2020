<a class="anchor" id="collection_kit_module"></a>
<section id="" class="collection-kits alternate <?php the_field('theme'); ?>">



<?php the_sub_field('collection_kit_style') ?>


<?php if (get_sub_field('collection_kit_style') == 'tall-left'): ?>

<?php if( have_rows('collection_kit_global','option') ): ?>


  <div class="kit-container clearfix">
    <?php $counter == 0 ?>
    <?php while( have_rows('collection_kit_global','option') ): the_row(); ?>
        <?php $counter == $counter++ ?>

        <div class="kit kit-<?php echo $counter; ?>">
          <div class="inner">
            <div class="titlebar"><?php echo $counter; ?></div>
            <img src="<?php the_sub_field('kit_product_image'); ?>" class="kit-image">
            <div class="content">
              <h2><?php the_sub_field('kit_label'); ?></h2>
              <p><?php the_sub_field('kit_description'); ?></p>
              <?php if (get_sub_field('kit_compatible')): ?>
              <div class="compatible">
              Compatible with:
              <div class="grid-x grid-margin-x diseases">
              <?php
                foreach (get_sub_field('kit_compatible') as $key => $value) {
                  $color = get_sub_field('collection_color_scheme');
                  echo "
                  <div class='cell small-4'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='18' height='13' viewBox='0 0 18 13'>
                    <polygon class='check-fill' fill='' points='53.727 618.284 49.432 614.209 48 615.567 53.727 621 66 609.358 64.568 608' transform='translate(-48 -608)'/>
                  </svg>

                  " .$value . "</div>";
                }
               ?>

             </div>
             </div>
           <?php endif; ?>
           <div class="grid-x align-middle">
             <div class="cell small-6">
               <div class="price">
                 <?php
                 $product = wc_get_product( get_sub_field('patient_kit_id') );
                 $pricePatient = $product->get_price_html();
                 echo $pricePatient;
                 ?>
               </div>
             </div>
             <div class="cell small-6 text-right">
               <a class="button physician" href="<?php echo site_url(); ?>/?add-to-cart=<?php the_sub_field('physician_kit_id'); ?>">Add to cart</a>
               <a class="button patient" href="<?php echo site_url(); ?>/?add-to-cart=<?php the_sub_field('patient_kit_id'); ?>">Add to cart</a>

             </div>
           </div>
            </div>


          </div>
        </div>

    <?php endwhile; ?>

  </div>


<?php endif; ?>
<?php endif; ?>


</section>
