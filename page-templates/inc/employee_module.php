<a class="anchor" id="employee_module"></a>
<section id="" class="employees alternate">
  <div class="grid-container grid-container-padded">
    <div class="grid-x">
      <div class="cell auto">
        <h2>Our Leadership</h2>
      </div>
    </div>
    <?php if( have_rows('employee_list','option') ): ?>
    <div class="grid-x">
        <?php while( have_rows('employee_list','option') ): the_row(); ?>
        <?php
        $color = get_sub_field('employee_color_scheme');
        $darker = darken_color($color);
        ?>

        <div class="cell large-6 grid">
          <div class="titlebar" style="background-color:<?php the_sub_field('employee_color_scheme') ?>">
            <?php the_sub_field('employee_name')?><small><?php the_sub_field('employee_title') ;?></small>
          </div>
          <figure>
            <?php $image = wp_get_attachment_image_src(get_sub_field('employee_photo'), 'full'); ?>
            <div class="img-container" style="background-image:url('<?php echo $image[0]; ?>')">

            </div>

            <figcaption>
              <div class="inner">
                <?php the_sub_field('employee_excerpt') ;?>
                <a class="employee-more">More &rsaquo;</a>
                <div class="top-layout">
                  <h3>Dr. Jyotsna Shah</h3>
                  <small>PRESIDENT & LABORATORY DIRECTOR</small>
                </div>
              </div>
            </figcaption>

            <div class="overlay" style="background-color:<?php echo $darker ?>">
              <div class="grid-x grid-padding-x grid-padding-y" style="height:100%;">
                <div class="cell small-10 large-11">
                  <div class="extended">
                    <div class="inner">
                      <?php the_sub_field('employee_desc') ?>
                    </div>
                  </div>
                </div>
                <div class="cell small-2 large-1">
                  <a class="employee-less">&lsaquo;</a>
                </div>
              </div>
            </div>
          </figure>



          <!-- <?php the_sub_field('employee_desc') ;?><br/> -->
        </div>

<?php endwhile; ?>
    </div>

<?php endif; ?>

  </div>
</section>
