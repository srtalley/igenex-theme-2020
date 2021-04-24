<a class="anchor" id="sidebar_module"></a>
<div id="" class="sidebar <?php the_field('theme'); ?>" style="background-image:url('<?php the_sub_field('sidebar_background_image'); ?>')">
  <div class="grid-container">
    <div class="grid-x align-middle slider-container">
      <div class="cell small-12 medium-8 large-6">
        <div class="bar active">
          <div class="grid-x grid-padding-x align-middle inner">
            <div class="cell small-8 small-offset-1">
                <?php the_sub_field('sidebar_content'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
