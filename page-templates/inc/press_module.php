<div id="" class="titlebar-module patient">
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell auto">
        <h2>IGeneX Publications</h2>
      </div>
    </div>
  </div>
</div>
<a class="anchor" id="press_module"><!-- This is for Publications --></a>
<section id="" class="press-module <?php the_field('theme') ?>">
  <div class="grid-container grid-container-padded">

        <div class="grid-x grid-padding-x">
          <div class="cell small-12">
            <h2 class="press-secondary-title">Whitepapers, Studies, and Reports</h2>
          </div>
        </div>

        <?php if( have_rows('press_item','option') ): ?>

          <div class="grid-x grid-padding-x grid-padding-y">

            <?php while( have_rows('press_item','option') ): the_row(); ?>

                <div class="cell large-4">
                  <a href="<?php the_sub_field('press_link');?>" target="_blank"><div class="inner">
                    <div class="content">
                      <div class="date"><?php the_sub_field('press_date'); ?></div>
                      <div class="description"><?php the_sub_field('press_description'); ?></div>
                    </div>
                    <div class="overlay" style="background-image:url('<?php the_sub_field('press_image'); ?>')">

                    </div>
                  </div></a>
                </div>


            <?php endwhile; ?>

          </div>

        <?php endif; ?>



    </div>
  </div>
</section>
