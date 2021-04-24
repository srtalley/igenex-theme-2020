<a class="anchor" id="employee_module"></a>
<section id="" class="employee_module alternate">


  <div class="grid-container grid-container-padded">

    <h2>Our Leadership</h2>


    <div class="grid">
      <div class="grid-sizer"></div>

      <?php if( have_rows('employee_list','option') ): ?>
          <?php while( have_rows('employee_list','option') ): the_row(); ?>
              <?php
              $color = get_sub_field('employee_color_scheme');
              $darker = darken_color($color);
              ?>
              <?php $i = get_row_index(); ?>
              <div class="grid-item item-<?php echo $i; ?>">
                <div class="inner">
                  <div class="grid-x">
                    <div class="cell auto titlebar titlebar-<?php echo $i; ?>" style="background-color: <?php the_sub_field('employee_color_scheme'); ?>">
                      <h3><?php the_sub_field('employee_name'); ?></h3> <nobr><?php the_sub_field('employee_title'); ?></nobr>
                    </div>
                  </div>
                  <div class="grid-x grid-padding-x overlay emp-<?php echo $i; ?>" style="background-color:<?php echo $darker ?>">
                    <div class="cell small-11">
                      <?php the_sub_field('employee_desc'); ?>
                      <a class="clicker" data-item="emp-<?php echo $i; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12">
                          <polygon fill="#FFF" fill-rule="evenodd" points="2.109 0 9 6.891 15.891 0 18 2.109 9 11.109 0 2.109" transform="matrix(1 0 0 -1 0 11.11)"/>
                        </svg>
                      </a>
                    </div>
                  </div>
                  <div class="grid-x grid-padding-x align-stretch content emp-<?php echo $i; ?>">
                    <?php $image = get_sub_field('employee_photo'); ?>
                    <!-- <div class="cell photo <?php //if ( $i == 1) : ?> offset medium-6 large-2 <?php //else: ?> large-4 <?php //endif; ?>" style="background-image:url('<?php //echo $image['url']; ?>'); background-size:cover; background-position:center top; min-height:275px;"> -->
                    <div class="cell photo large-4" style="background-image:url('<?php echo $image['url']; ?>'); background-size:cover; background-position:center top; min-height:275px;">


                    </div>
                    <?php //if ( $i == 1) : ?>
                    <!-- <div class="cell small-3 show-for-large align-self-middle">
                      <h3 style="color:<?php //the_sub_field('employee_color_scheme'); ?>"><?php //the_sub_field('employee_name'); ?></h3>
                      <div class="large-title"><?php //the_sub_field('employee_title'); ?></div>
                    </div> -->
                    <?php //endif; ?>

                    <div class="cell auto align-self-middle info">
                      <div class="excerpt">
                        <?php the_sub_field('employee_excerpt'); ?>
                        <div class="expand"><a class="clicker" data-item="emp-<?php echo $i; ?>">More
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12">
                          <polygon fill="#1AABE2" fill-rule="evenodd" points="2.109 0 9 6.891 15.891 0 18 2.109 9 11.109 0 2.109"/>
                        </svg>
                        </a></div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

          <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div>






</section>
