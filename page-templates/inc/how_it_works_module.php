<a class="anchor" id="how_it_works_module"></a>
<section id="" class="how-it-works alternate">
<?php if( have_rows('how_it_works','option') ): ?>
<?php while( have_rows('how_it_works','option') ): the_row(); ?>
  <div class="grid-container grid-container-padded">
    <div class="grid-x">
      <div class="cell auto text-center hiw-title">
        <?php the_sub_field('title');?>
      </div>
    </div>


    <div class="grid-x">
        <div class="cell large-12 grid-x steps-grid">
            <div class="small-12 large-3 hiw-step1 text-center">
                <?php $step_1_image = get_sub_field('step_1_image'); ?>
                <img class="hiw-desktop" src="<?php echo $step_1_image['url'];?>" />
                <?php $step_1_image_mobile = get_sub_field('step_1_image_mobile'); ?>
                <img class="hiw-mobile" src="<?php echo $step_1_image_mobile['url'];?>" />
                <div class="hiw-inner">
                    <h2><?php the_sub_field('step_1_title')?></h2>
                    <p><?php the_sub_field('step_1_content') ;?></p>
                </div>
            </div>
            <div class="small-12 large-3 hiw-step hiw-step2 text-center">
                <?php $step_2_image = get_sub_field('step_2_image'); ?>
                <img class="hiw-desktop" src="<?php echo $step_2_image['url'];?>" />
                <?php $step_2_image_mobile = get_sub_field('step_2_image_mobile'); ?>
                <img class="hiw-mobile" src="<?php echo $step_2_image_mobile['url'];?>" />
                <div class="hiw-inner">
                    <h2><?php the_sub_field('step_2_title')?></h2>
                    <p><?php the_sub_field('step_2_content') ;?></p>
                </div>
            </div>
            <div class="small-12 large-3 hiw-step hiw-step3 text-center">
                <?php $step_3_image = get_sub_field('step_3_image'); ?>
                <img class="hiw-desktop" src="<?php echo $step_3_image['url'];?>" />
                <?php $step_3_image_mobile = get_sub_field('step_3_image_mobile'); ?>
                <img class="hiw-mobile" src="<?php echo $step_3_image_mobile['url'];?>" />
                <div class="hiw-inner">
                    <h2><?php the_sub_field('step_3_title')?></h2>
                    <p><?php the_sub_field('step_3_content') ;?></p>
                </div>
            </div>
            <div class="small-12 large-3 hiw-step hiw-step4 text-center">
                <?php $step_4_image = get_sub_field('step_4_image'); ?>
                <img class="hiw-desktop" src="<?php echo $step_4_image['url'];?>" />
                <?php $step_4_image_mobile = get_sub_field('step_4_image_mobile'); ?>
                <img class="hiw-mobile" src="<?php echo $step_4_image_mobile['url'];?>" />
                <div class="hiw-inner">
                    <h2><?php the_sub_field('step_4_title')?></h2>
                    <p><?php the_sub_field('step_4_content') ;?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</section>
