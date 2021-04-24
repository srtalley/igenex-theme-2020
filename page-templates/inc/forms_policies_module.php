<a class="anchor" id="policies_module"></a>
<section id="" class="policies alternate <?php the_field('theme'); ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x policies_forms_container">
      <div class="cell gird-x small-12 large-8">

      <div class="cell policies_container">
        <h2>Forms &amp; Policies</h2>

      <?php if( have_rows('policies_item','option') ): ?>

          <div class="masonry">

            <?php while( have_rows('policies_item','option') ): the_row(); ?>

                <div class="item">

                    <img src="<?php the_sub_field('policies_icon'); ?>">
                    <h3><?php the_sub_field('policies_item_title') ?></h3>
                    <?php $colorscheme = get_sub_field('policies_color_scheme') ?>
                    <?php if( have_rows('policies_line_item') ): ?>
                        <ul>
                        <?php while( have_rows('policies_line_item') ): the_row(); ?>
                            <li>
                              <?php $link = get_sub_field('policies_line_item_link');

                              if( $link ): ?>

                              	<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="22" viewBox="0 0 40 22">
                                  <path fill="<?php echo $colorscheme ?>" fill-rule="evenodd" d="M655,1165 C649,1165 644,1160 644,1154 C644,1148 649,1143 655,1143 L676,1143 C680.4,1143 684,1146.6 684,1151 C684,1155.4 680.4,1159 676,1159 L659,1159 C656.2,1159 654,1156.8 654,1154 C654,1151.2 656.2,1149 659,1149 L674,1149 L674,1152 L659,1152 C657.8,1152 657,1152.8 657,1154 C657,1155.2 657.8,1156 659,1156 L676,1156 C678.8,1156 681,1153.8 681,1151 C681,1148.2 678.8,1146 676,1146 L655,1146 C650.6,1146 647,1149.6 647,1154 C647,1158.4 650.6,1162 655,1162 L674,1162 L674,1165 L655,1165 L655,1165 Z" transform="translate(-644 -1143)"/>
                                </svg>
                                </a>
                                <p><a class="policy-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php the_sub_field('policies_line_item_description') ?></a></p>
                              <?php endif; ?>


                              </a>

                            </li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                </div>

            <?php endwhile; ?>

          </div>

      <?php endif; ?>
      </div> <!-- cell policies_container -->
      </div> <!-- columns small-12 large-8 -->
      <div class="cell grid-x small-12 large-4">

      <div class="cell instructional_container">
        <h2>Instructional Video</h2>
        <div class="masonry">
          <div class="item"> 
            <?php echo get_field('instructional_video', 'option'); ?>
          </div>
        </div>
        
      </div>
      </div> <!-- cell small-12 large-4 -->
    </div>
  </div>
</section>
