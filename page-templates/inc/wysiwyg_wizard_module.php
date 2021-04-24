<a class="anchor" id="wysiwyg_wizard_module"></a>
<section id="" class="wysiwyg_wizard alternate <?php the_field('theme');?>">
<?php
// check if the flexible content field has rows of data
if (have_rows('layout_wysiwyg')):
    // loop through the rows of data
    while (have_rows('layout_wysiwyg')) : the_row(); ?>
    <div class="">
    <div class="grid-container">
      <div class="grid-x grid-padding-x grid-padding-y">
      <?php
        // check current row layout
        if (get_row_layout() == '2_columns'): ?>
        <?php
        if (have_rows('half_1')) :
            while (have_rows('half_1')) : the_row(); ?>
            <?php if (get_sub_field('col_2_1_text')) : ?>
              <div class="cell large-6">
                <?php the_sub_field('col_2_1_text'); ?>
              </div>

            <?php else: ?>
              <div class="cell large-6">
                <img src="<?php the_sub_field('col_2_1_image'); ?>">
              </div>
            <?php endif ?>
              <?php
            endwhile;
        endif;
        ?>
        <?php
        if (have_rows('half_2')) :
            while (have_rows('half_2')) : the_row(); ?>
            <?php if (get_sub_field('col_2_2_text')) : ?>
              <div class="cell large-6">
                <?php the_sub_field('col_2_2_text'); ?>
              </div>
            <?php else: ?>
              <div class="cell large-6 small-order-1 medium-order-2">
                <img src="<?php the_sub_field('col_2_2_image'); ?>">
              </div>
              <?php endif ?>
              <?php
            endwhile;
        endif;
        ?>
      <?php elseif(get_row_layout() == '1_column'): ?>
        <?php
        if (have_rows('full_width')) :
            while (have_rows('full_width')) : the_row(); ?>
        <?php if (get_sub_field('col_1_1_text')) : ?>
          <div class="cell">
            <?php the_sub_field('col_1_1_text'); ?>
          </div>
        <?php else: ?>
          <div class="cell">
            <img src="<?php the_sub_field('col_1_1_image'); ?>">
          </div>
          <?php endif ?>
        <?php endwhile ?>
      <?php endif ?>
      <?php else: ?>

        <?php
          // check current row layout
          if (get_row_layout() == '3_columns'): ?>
          <?php
          if (have_rows('third_1')) :
              while (have_rows('third_1')) : the_row(); ?>
              <?php if (get_sub_field('col_3_1_text')) : ?>
                <div class="cell medium-4">
                  <?php the_sub_field('col_3_1_text'); ?>
                </div>
              <?php else: ?>
                <div class="cell medium-4">
                  <img src="<?php the_sub_field('col_3_1_image'); ?>">
                </div>
              <?php endif ?>
                <?php
              endwhile;
          endif;
          ?>
          <?php
          if (have_rows('third_2')) :
              while (have_rows('third_2')) : the_row(); ?>
              <?php if (get_sub_field('col_3_2_text')) : ?>
                <div class="cell medium-4">
                  <?php the_sub_field('col_3_2_text'); ?>
                </div>
              <?php else: ?>
                <div class="cell medium-4">
                  <img src="<?php the_sub_field('col_3_2_image'); ?>">
                </div>
                <?php endif ?>
                <?php
              endwhile;
          endif;
          ?>
          <?php
          if (have_rows('third_3')) :
              while (have_rows('third_3')) : the_row(); ?>
              <?php if (get_sub_field('col_3_3_text')) : ?>
                <div class="cell medium-4">
                  <?php the_sub_field('col_3_3_text'); ?>
                </div>
              <?php else: ?>
                <div class="cell medium-4">
                  <img src="<?php the_sub_field('col_3_3_image'); ?>">
                </div>
                <?php endif ?>
                <?php
              endwhile;
          endif;
          ?>
  <?php endif; ?>

      <?php endif; ?>
      </div>
    </div>
  </div>
      <?php
    endwhile;
else :
    // no layouts found
endif;
?>
</section>
