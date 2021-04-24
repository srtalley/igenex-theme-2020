<a class="anchor" id="icon_grid_module"></a>
<section id="" class="icon-grid alternate <?php the_field('theme'); ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x text-center">
      <div class="cell auto">
        <h2 style="color:<?php the_sub_field('icon_grid_headline_color'); ?>"><?php the_sub_field('icon_grid_headline'); ?></h2>
      </div>
    </div>

    <?php if( have_rows('icon_card') ): ?>
    <div class="grid-x grid-padding-x grid-padding-y align-center">
      <?php while( have_rows('icon_card') ): the_row(); ?>
        <div class="cell medium-6 large-3 pod">
          <div><img src="<?php the_sub_field('card_icon') ?>"></div>
          <h3 style="color:<?php the_sub_field('card_title_color'); ?>"><?php the_sub_field('card_title') ?></h3>
          <div class="details"><?php the_sub_field('card_info'); ?></div>


        </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>


    <?php if (get_sub_field('icon_card_button_link')): ?>
    <div class="grid-x">
      <div class='cell auto text-center'>
        <?php

        $link = get_sub_field('icon_card_button_link');

        if( $link ): ?>

        	<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

        <?php endif; ?>

      </div>
    </div>
    <?php endif ?>






  </div>




</section>
