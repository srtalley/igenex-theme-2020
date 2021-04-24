<a class="anchor" id="blood_draw_module"></a>
<section id="" class="blood-draw alternate <?php the_field('theme'); ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x">
      <div class="cell medium-1">
        <h2>Blood Draw Sites</h2>
      </div>
      <div class="cell medium-10 medium-offset-1">

        <?php if( have_rows('blood_draw_logos','option') ): ?>

            <div class="grid-x grid-padding-x align-center">

            <?php while( have_rows('blood_draw_logos','option') ): the_row(); ?>

                <div class="cell small-6 large-4 text-center">
                  <a href="<?php the_sub_field('blood_draw_link');?>" target="_blank"><img src="<?php the_sub_field('blood_draw_image'); ?>"></a>
                </div>


            <?php endwhile; ?>

            </div>

        <?php endif; ?>


      </div>
    </div>
  </div>
</section>
