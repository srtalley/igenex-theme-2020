<a class="anchor" id="test_a_tick_module"></a>
<section id="" class="test-a-tick alternate <?php the_field('theme'); ?>" style="background-image:url('<?php the_sub_field('test_a_tick_bg'); ?>')">
  <div class="grid-container">
    <div class="grid-x align-middle slider-container">
      <div class="cell small-12 medium-8 large-5">
        <div class="bar active">
          <div class="grid-x align-middle inner">
            <div class="cell small-10">
              <h2><?php the_sub_field('test_a_tick_title') ?></h2>
              <p><?php the_sub_field('test_a_tick_description') ?></p>

              <?php

              $link = get_sub_field('test_a_tick_button');

              if( $link ): ?>

              	<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>

              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
