<a class="anchor" id="kit_table_module"></a>
<section id="" class="kit-table alternate <?php the_field('theme'); ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <h2><?php the_sub_field('kit_table_headline');?></h2>
      </div>
    </div>
    <div class="grid-x grid-padding-x">
      <div class="cell small-12">
      <?php $counter = 0; ?>


    <table class="top">
      <tr>
        <td class="panel">Panels</td>
        <td class="blood">Blood</td>
        <td class="urine">Urine</td>
        <td class="misc">Misc</td>
      </tr>
    </table>
    <ul id="kit-table" class="accordion kit-table" data-accordion data-allow-all-closed="true">
    <?php if( have_rows('kit_row', 'option') ): ?>
    <?php while( have_rows('kit_row','option') ): the_row(); ?>
        <?php $counter++; ?>
        <li class="accordion-item" id="" data-accordion-item />
          <a href="#drawer<?php echo $counter ?>" class="accordion-title" id="drawer<?php echo $counter ?>">
            <?php the_sub_field('disease_title'); ?>

          </a>
          <?php if(get_sub_field('more_info')) :  ?><div class="more-info"><a href="<?php the_sub_field('more_info') ?>">More Information</a></div><?php endif; ?>

          <?php if( have_rows('sub_item') ): ?>
              <div id="drawer<?php echo $counter ?>" class="accordion-content" data-tab-content>
                <table class="bottom">
                  <?php while( have_rows('sub_item') ): the_row(); ?>
                  <tr class="<?php if ( get_sub_field('subitem')) { echo "top-level";} ?>">
                    <td><?php the_sub_field('panel_title'); ?></td>



                    <td class="check blood">
                    <?php
                    if (get_sub_field('panel_tests')) {
                      $blood = get_sub_field('panel_tests');

                      if (in_array("Blood", $blood)) {
                        echo "&#10003;";
                      }
                    }

                    ?>
                    </td>
                    <td class="check urine">
                    <?php
                    if (get_sub_field('panel_tests')) {
                      $urine = get_sub_field('panel_tests');

                      if (in_array("Urine", $urine)) {
                        echo "&#10003";
                      }
                    }
                    ?>
                    </td>
                    <td class="check misc">
                    <?php
                    if (get_sub_field('panel_tests')) {
                      $misc = get_sub_field('panel_tests');
                      if (in_array("Misc", $misc)) {
                        echo "&#10003";
                      }
                    }
                    ?>
                    </td>

                  </tr>
                  <?php endwhile; ?>
                </table>

              </div>

          <?php endif; ?>



        </li>


    <?php endwhile; ?>

    </ul>

<?php endif; ?>
      </div>
    </div>
  </div>
</section>
