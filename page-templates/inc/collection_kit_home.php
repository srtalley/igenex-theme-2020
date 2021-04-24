<a class="anchor" id="collection_kit_module"></a>
<section id="" class="collection-kits alternate <?php the_field('theme'); ?> <?php the_sub_field('kit_show_product_images'); ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x">
      <div class="cell text-<?php the_sub_field('kit_alignment'); ?>">
        <?php if (get_sub_field('kit_details')): ?><?php else: ?><div class="spacer"></div><?php endif; ?>
        <h2><?php the_sub_field('kit_headline'); ?></h2>
        <?php if (get_sub_field('kit_details')): ?><div class="spacer"></div><?php endif; ?>
        <p><?php the_sub_field('kit_details'); ?></p>

        <?php $primary_kit = get_sub_field('primary_kit'); ?>
      </div>
    </div>
    <div class="grid-x grid-padding-x grid-padding-y">
    <?php $theme = get_field('theme'); ?>


    <?php if (have_rows('kit_repeater')): ?>



        <?php while (have_rows('kit_repeater')): the_row(); ?>


          <?php
          $post_object = get_sub_field('kit_select');
          // add_filter($post_object, 'my_post_object_query', 'kit_select', 1777);
          if ($post_object):
            // override $post
            $post = $post_object;
            setup_postdata($post);

            ?>

            <?php if ($primary_kit == $post->ID): ?>


              <div class="cell large-6">
                <div class="grid-x grid-padding-y">



              <div class="cell large-12" id="primary">
                <!-- COLLECTION KIT CONTENT START -->
                <div class="inner <?php the_sub_field('kit_style'); ?>" style="background-color:<?php the_field('kit_color_scheme'); ?>; color:<?php the_field('kit_color_scheme'); ?>">
                  <div class="titlebar" style="background-color:<?php the_field('kit_color_scheme'); ?>; color: white;"><?php the_field('kit_title_bar'); ?></div>


                    <img src="<?php the_field('kit_image'); ?>" class="kit-image">

                  <div class="content">
                    <div class="headline"><h2><?php the_title(); ?></h2></div>
                  	<p><?php the_field('kit_description'); ?></p>
                    <div class="compatible home">
                      <div class="grid-x">
                        <!-- loops through the list of compatible items and prepends a checkmark -->
                        <?php 
                        if(get_field('kit_compatibility')) {
                          foreach (get_field('kit_compatibility') as $key => $value) {
                            echo "<div class='cell small-6 xlarge-4'>" . "&#10003;&nbsp;" . $value . "</div>"; 
                          } 
                        }?>
                      </div>
                    </div>
                    <div class="woo">
                      <div class="grid-x align-middle">
                        <div class="cell large-shrink text-center large-text-left price-container">
                          <div class="price">
                            <div class="small-text-center">
                              <span data-tooltip data-options="disable_for_touch:true" aria-haspopup="true" data-allow-overlap="true" class="has-tip top" data-click-open="false" data-disable-hover="false" tabindex="1" title="This deposit covers the cost of your test kit and will be deducted from your final testing fees.">Deposit
                            		<span class="info-tip">
                            			<svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><title>ToolTip</title><g transform="translate(0 -1)" fill="none" fill-rule="evenodd"><circle fill="#00AEEF" cx="4.5" cy="5.5" r="4.5"/><text font-family="Georgia-BoldItalic, Georgia" font-size="8" font-style="italic" font-weight="bold" fill="#FFF"><tspan x="3.037" y="8">i</tspan></text></g></svg>
                            		</span>
                          		</span>
                            </div>
                            <?php
                            $product = wc_get_product(get_field('kit_id_for_patients'));
                            $pricePatient = $product->get_price_html();
                            echo $pricePatient;
                            ?>
                          </div>

                        </div>
                        <div class="cell large-auto text-center button-container">
                          <a href="<?php echo site_url(); ?>/?add-to-cart=<?php the_field('kit_id_for_patients'); ?>" class="button hide show-for-patient" style="background-color:<?php the_field('kit_color_scheme'); ?>; color:<?php the_field('kit_color_scheme'); ?>;">Add this Kit to Cart</a>
                          <a href="<?php echo site_url(); ?>/?add-to-cart=<?php the_field('kit_id_for_physicians'); ?>" class="button hide show-for-physician" style="background-color:<?php the_field('kit_color_scheme'); ?>; color:<?php the_field('kit_color_scheme'); ?>;">Add this Kit to Cart</a>
                            <div class="test-details"><a href="<?php if ($theme == 'patient'): the_field('kit_test_details_patient'); else: the_field('kit_test_details_physician'); endif; ?>">Kit Details &rsaquo;</a></div>
                        </div>
                      </div>

                    </div>
                  </div>


                </div>
                <!-- COLLECTION KIT CONTENT END -->
              </div>

            </div>

          </div>

            <?php endif; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly?>
          <?php endif; ?>


        <?php endwhile; ?>



    <?php endif; ?>





    <!-- remaining cells -->




    <?php if (have_rows('kit_repeater')): ?>

      <div class="cell large-6">
        <div class="grid-x grid-padding-y">

          <div class="cell large-12 text-center large-text-left" style="font-weight:bold; color:#B6BDC1;margin-top: -55px;">
            You may also need:
          </div>
        <?php while (have_rows('kit_repeater')): the_row(); ?>


          <?php
          $post_object = get_sub_field('kit_select');
          // add_filter($post_object, 'my_post_object_query', 'kit_select', 1777);
          if ($post_object):
            // override $post
            $post = $post_object;
            setup_postdata($post);

            ?>

            <?php if ($primary_kit != $post->ID): ?>

              <div class="cell large-12 secondary">
                <!-- COLLECTION KIT CONTENT START -->
                <div class="inner <?php the_sub_field('kit_style'); ?>" style="background-color:<?php the_field('kit_color_scheme'); ?>; color:<?php the_field('kit_color_scheme'); ?>">
                  <div class="titlebar" style="background-color:<?php the_field('kit_color_scheme'); ?>; color: white;"><?php the_field('kit_title_bar'); ?></div>


                    <img src="<?php the_field('kit_image'); ?>" class="kit-image">

                  <div class="content">
                    <div class="grid-x">
                      <div class="cell "><div class="headline"><h2><?php the_title(); ?></h2></div></div>
                  	  <div class="cell "><p><?php the_field('kit_description'); ?></p></div>
                    </div>
                    <div class="woo" style="margin-top:0;padding-top:0;">
                      <div class="grid-x align-middle">
                        <div class="cell large-shrink text-center large-text-left price-container">
                          <div class="price">
                            <div class="small-text-center">
                              <span data-tooltip aria-haspopup="true" class="has-tip top" data-click-open="false" data-disable-hover="false" data-allow-overlap="true" tabindex="1" title="This deposit covers the cost of your test kit and will be deducted from your final testing fees.">Deposit
                            		<span class="info-tip">
                            			<svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><title>ToolTip</title><g transform="translate(0 -1)" fill="none" fill-rule="evenodd"><circle fill="#00AEEF" cx="4.5" cy="5.5" r="4.5"/><text font-family="Georgia-BoldItalic, Georgia" font-size="8" font-style="italic" font-weight="bold" fill="#FFF"><tspan x="3.037" y="8">i</tspan></text></g></svg>
                            		</span>
                          		</span>
                            </div>
                            <?php
                            $product = wc_get_product(get_field('kit_id_for_patients'));
                            $pricePatient = $product->get_price_html();
                            echo $pricePatient;
                            ?>
                          </div>

                        </div>
                        <div class="cell large-auto text-center button-container">
                          <a href="<?php echo site_url(); ?>/?add-to-cart=<?php the_field('kit_id_for_patients'); ?>" class="button hide show-for-patient" style="background-color:<?php the_field('kit_color_scheme'); ?>; color:<?php the_field('kit_color_scheme'); ?>;">Add this Kit to Cart</a>
                          <a href="<?php echo site_url(); ?>/?add-to-cart=<?php the_field('kit_id_for_physicians'); ?>" class="button hide show-for-physician" style="background-color:<?php the_field('kit_color_scheme'); ?>; color:<?php the_field('kit_color_scheme'); ?>;">Add this Kit to Cart</a>
                            <div class="test-details"><a href="<?php if ($theme == 'patient'): the_field('kit_test_details_patient'); else: the_field('kit_test_details_physician'); endif; ?>">Kit Details &rsaquo;</a></div>
                        </div>
                      </div>

                    </div>
                  </div>


                </div>
                <!-- COLLECTION KIT CONTENT END -->
              </div>

            <?php endif; ?>

            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly?>
          <?php endif; ?>


        <?php endwhile; ?>
      </div>
      </div>
    </div>

    <?php endif; ?>
    <div class="grid-x align-center grid-padding-y">
      <div class="cell shrink">
      </div>
    </div>
    <div class="grid-x show-for-physician">
      <div class="cell medium-10 medium-offset-1 large-8 large-offset-2 align-center text-center">
        Receipt of payment for the testing and a signed Requisition Form is required upon submission of patient's test specimen to IGeneX, with the exception of Medicare patients.
      </div>
    </div>    
    <div class="grid-x align-center grid-padding-y">
      <div class="cell shrink">
      </div>
    </div>
    <div class="grid-x align-center grid-padding-x grid-padding-y">
      <div class="cell shrink">
        <a href="https://igenex.com/wp-content/uploads/IGenex-PriceSheet.pdf" target="_blank">View Panel & Test Price List ></a>
      </div>
      <div class="cell shrink">
        <a href="https://igenex.com/wp-content/uploads/2018/01/BS-F-037-PAYMENT-AND-BILLING-POLICIES-REV.-006-10-21-16.pdf" target="_blank">View Payment & Billing Process ></a>
      </div>
    </div>

  </div>




</section>
