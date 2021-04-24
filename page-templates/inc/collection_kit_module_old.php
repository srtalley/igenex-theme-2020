<a class="anchor" id="collection_kit_module"></a>
<section id="" class="collection-kits alternate <?php the_field('theme'); ?>">
<?php $kitStyle = get_sub_field('collection_kit_style'); ?>
<?php $kitImages = get_sub_field('collection_kit_image_toggle'); ?>
  <div class="grid-container-fluid grid-container-padded <?php echo $kitStyle ?>">

    <div class="grid-x grid-padding-x">
      <div class="cell">
        <h2>Collection Kits</h2>
      </div>
    </div>



    <?php if( have_rows('kit','option') ): ?>
      <div class="grid-x grid-padding-x grid-padding-y">

        <?php while( have_rows('kit','option') ): the_row(); ?>

          <div class='cell pod small-12 large-auto'>

            <div class="inner <?php echo $kitStyle; ?> <?php echo $kitImages; ?>" style="background-color:<?php the_sub_field('collection_color_scheme'); ?>">
              <div class="titlebar" style="background-color:<?php the_sub_field('collection_color_scheme'); ?>">
                <?php the_sub_field('collection_title_bar'); ?>
              </div>
              <div class="image-container">
                <img src="<?php the_sub_field('collection_image'); ?>">
              </div>
              <div class="content" style="color:<?php the_sub_field('collection_color_scheme'); ?>">
                <div class="headline-container"><h2 style="color:<?php the_sub_field('collection_color_scheme'); ?>"><?php the_sub_field('collection_title'); ?></h2></div>
                <p><?php the_sub_field('collection_description'); ?></p>


                <?php if (get_sub_field('collection_compatibility')): ?>
                Compatible with:
                <ul>
                <?php
                  foreach (get_sub_field('collection_compatibility') as $key => $value) {
                    $color = get_sub_field('collection_color_scheme');
                    echo "
                    <li>
                    <svg xmlns='http://www.w3.org/2000/svg' width='18' height='13' viewBox='0 0 18 13'>
                      <polygon class='check-fill' fill='" . $color . "' points='53.727 618.284 49.432 614.209 48 615.567 53.727 621 66 609.358 64.568 608' transform='translate(-48 -608)'/>
                    </svg>

                    " .$value . "</li>";
                  }
                 ?>
               </ul>
             <?php endif; ?>
             <?php
                $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
              ?>
             <div class="grid-x grid-padding-x grid-padding-y text-center">
               <?php if (get_sub_field('collection_deposit')): ?>

               <?php if (strpos($url,'physician') == false) { ?>

               <?php } ?>
                <?php endif; ?>
               <div class="cell">
                 <div class="grid-x">
                   <div class="cell auto">

                 <?php if (strpos($url,'physician') == false) { ?>
                   <div class="text-left">
                     <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="This deposit covers the cost of your test kit and will be deducted from your final testing fees.">&nbsp;&nbsp;Deposit
                 		<span class="info-tip">
                 			<svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"><title>ToolTip</title><g transform="translate(0 -1)" fill="none" fill-rule="evenodd"><circle fill="#00AEEF" cx="4.5" cy="5.5" r="4.5"/><text font-family="Georgia-BoldItalic, Georgia" font-size="8" font-style="italic" font-weight="bold" fill="#FFF"><tspan x="3.037" y="8">i</tspan></text></g></svg>
                 		</span>
                 		</span>
                   </div>
                 <?php } ?>


                 <?php if (strpos($url,'physician') !== false) { ?>
                   <?php
                      $section_content = get_sub_field('physician_short_code', false, false);
                      $section_content = apply_filters('the_content', $section_content);
                      echo '<div class="woo ' .  $kitStyle  . '">' . $section_content . '</div>';
                    ?>
                  <?php } else { ?>
                    <?php
                       $section_content = get_sub_field('patient_short_code', false, false);
                       $section_content = apply_filters('the_content', $section_content);
                       echo '<div class="woo ' . $kitStyle . '">' . $section_content . '</div>';
                     ?>
                  <?php } ?>
                </div>



                  </div>
               </div>
             </div>


              </div>



            </div>

          </div>
        <?php endwhile; ?>

      </div>
    <?php endif; ?>














    <?php

    /*
    *  Loop through post objects (assuming this is a multi-select field) ( don't setup postdata )
    *  Using this method, the $post object is never changed so all functions need a seccond parameter of the post ID in question.
    */

    $post_objects = get_sub_field('select_collection_kit');

    if ($post_objects): ?>
        <div class="grid-x grid-padding-x grid-padding-y">
        <?php foreach ($post_objects as $post_object): ?>
            <div class='cell small-12 medium-6 large-4'>
              <div class="inner">
                <div class="titlebar" style="background-color:<?php the_field('kit_color_scheme', $post_object->ID); ?>">titlebar</div>
                <?php if (get_sub_field('kit_show_icons')): ?>
                <div class="icon-container">
                  <img src="<?php the_field('kit_icon', $post_object->ID); ?>" alt="" />
                </div>
                <?php endif ?>
                <div class="content">
                  <div class="headline-container"><h2 style="color:<?php the_field('kit_color_scheme', $post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></h2></div>
                  <p><?php the_field('kit_description', $post_object->ID); ?></p>


                  <a href="<?php echo the_field('kit_button', $post_object->ID); ?>" class="button" style="background-color:<?php the_field('kit_color_scheme', $post_object->ID); ?>">Get This Kit</a>
                  <br/>
                  <a href="<?php echo the_field('test_details', $post_object->ID); ?>">Test Details ></a>

                </div>


              </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endif;
    ?>
  </div>
</section>
