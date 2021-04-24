<a class="anchor" id="interpret_module"></a>
<section id="" class="interpret alternate <?php the_field('theme'); ?>">
<div class="grid-container grid-container-padded">
  <?php $counter = 0; ?>
  <div class="grid-x">
    <div class="cell">
      <?php if( have_rows('interpret_test') ): ?>
      <ul id="int" class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true" >
        <?php while( have_rows('interpret_test') ): the_row(); ?>
        <li class="accordion-item" data-accordion-item>
          <!-- Accordion tab title -->
          <a href="#drawer-<?php echo get_row_index(); ?>" class="accordion-title scroll"><?php the_sub_field('drawer_label'); ?></a>

          <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
          <div class="accordion-content" data-tab-content id="drawer-<?php echo get_row_index(); ?>">

            <?php if( have_rows('interpret_section') ): ?>
            <?php while( have_rows('interpret_section') ): the_row(); ?>
            <div class="grid-x alternate">
              <div class="cell small-12">
                <div class="grid-x grid-padding-x grid-padding-y">
                  <div class="cell small-12">
                    <h3><?php the_sub_field('interpret_section_title'); ?></h3>
                  </div>
                  <div class="cell medium-7">
                    <?php the_sub_field('interpret_left_copy'); ?>
                  </div>
                  <div class="cell medium-5">
                    <?php the_sub_field('interpret_right_copy'); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </li>

        <?php endwhile; ?>

      </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
</section>
