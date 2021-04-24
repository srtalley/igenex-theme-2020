<a class="anchor" id="advantage_module"></a>
<section id="" class="advantage alternate <?php the_field('theme'); ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x grid-padding-x align-stretch">
      <?php if (get_sub_field('igenex_advantage_image')) : ?>
      <div class="cell medium-2 star text-right">

        <img src="<?php the_sub_field('igenex_advantage_image'); ?>">

      </div>
      <?php endif; ?>
      <div class="cell medium-4">
        <h2><?php the_sub_field('igenex_advantage_headline'); ?></h2>

      </div>
      <div class="cell medium-auto">
        <p><?php the_sub_field('igenex_advantage_description') ?></p>
        <?php if(get_sub_field('igenex_advantage_button')): ?>
          <a href="<?php the_sub_field('igenex_advantage_button') ?>" class="button"><?php the_sub_field('igenex_advantage_cta_text') ?></a>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>
