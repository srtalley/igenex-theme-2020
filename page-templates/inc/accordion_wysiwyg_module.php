<a class="anchor" id="accordion_wysiwyg_module"></a>
<section id="" class="accordion-wysiwyg <?php the_field('theme'); ?>" style="background-color: <?php the_sub_field('accordion_section_background'); ?>">
<div class="grid-container grid-container-padded <?php the_sub_field('accordion_class'); ?>">
  <?php   $drawer_color = get_sub_field('accordion_drawer_color');
          $drawer_text_color = get_sub_field('accordion_drawer_text_color');
          $counter = 0; ?>
  <div class="grid-x">
    <div class="cell">
    <div class="spacer" style="background-color: <?php echo $drawer_color; ?>;"></div>  
    <h2><?php the_sub_field('accordion_section_heading');?></h2>
      <?php if( have_rows('accordion_item') ): ?>
      <ul id="int" class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true" >
        <?php while( have_rows('accordion_item') ): the_row(); ?>
        <li class="accordion-item" data-accordion-item>
          <!-- Accordion tab title -->
          <a href="#panel-<?php echo get_row_index(); ?>" class="accordion-title scroll" style="background-color: <?php echo $drawer_color; ?>; color: <?php echo $drawer_text_color; ?>;"><?php the_sub_field('drawer_label'); ?></a>

          <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
          <div class="accordion-content <?php the_sub_field('accordion_item_class'); ?>" data-tab-content id="panel-<?php echo get_row_index(); ?>">

            <?php if( have_rows('accordion_section') ): ?>
            <?php while( have_rows('accordion_section') ): the_row(); ?>
            <div class="d grid-x alternate">
              <div class="cell small-12">
                <div class="grid-x grid-padding-x grid-padding-y">
                  <div class="cell small-12">
                    <?php the_sub_field('accordion_section_wysiwyg'); ?>
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
