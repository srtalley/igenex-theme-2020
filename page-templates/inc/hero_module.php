<a class="anchor" id="hero_module"></a>
<?php $image = wp_get_attachment_image_src(get_sub_field('hero_image'), 'full'); ?>
<div id="" style="background:url('<?php echo $image[0]; ?>');" class="hero <?php the_sub_field('hero_layout'); ?> <?php the_field('theme'); ?> " >
  <div class="grid-container">
    <div class="grid-x hero-container align-middle">
      <div class="cell small-12 medium-6 large-5">
        <div class="hero-content <?php the_field('theme'); ?>">
          <h1><?php the_sub_field('hero_headline'); ?></h1>
          <?php
          $value = get_sub_field('hero_button');
          if (get_sub_field('hero_button')): ?>
          <a href="<?php echo $value["url"] ?>" class="button">Learn More</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>

</div>
