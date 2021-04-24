<a class="anchor" id="image_grid_module"></a>
<section id="" class="image-grid alternate">
  <div class="grid-container grid-container-padded">
    <div class="grid-x grid-padding-x grid-padding-y">
      <div class="cell">
        <h2><?php the_sub_field('image_grid_title') ?></h2>
      </div>
    </div>
    <?php if( have_rows('image_grid_images') ): ?>
    <div class="grid-x grid-padding-x grid-padding-y align-center">
      <?php while( have_rows('image_grid_images') ): the_row(); ?>
      <div class="cell small-3 text-center">
        <img src="<?php the_sub_field('image_grid_image'); ?>">
      </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
