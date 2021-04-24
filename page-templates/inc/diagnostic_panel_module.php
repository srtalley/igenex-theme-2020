<a class="anchor" id="diagnostic_panel_module"></a>
<section id="" class="kit-table alternate <?php the_field('theme'); ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <h2><?php the_sub_field('panel_section_headline');?></h2>
      </div>
    </div>
    <div class="grid-x grid-padding-x">
      <div class="cell small-12">

<?php if (have_rows('sub_item_copy')): ?>
  <table class="top" cellspacing="4">
    <tr>
      <td class="panel">Panels</td>
      <td class="blood">Blood</td>
      <td class="urine">Urine</td>
      <td class="misc">Misc</td>
    </tr>
  </table>
    <table class="bottom" cellspacing="4">
    <?php while (have_rows('sub_item_copy')): the_row(); ?>

          <tr class="<?php if (get_sub_field('subitem')) {
    echo "top-level";
} ?>">
            <td><?php the_sub_field('panel_title'); ?></td>
            <td class="check blood">
            <?php
            if (get_sub_field('panel_tests')) {
              $blood = get_sub_field('panel_tests');

              if (in_array("Blood", $blood)) {
                echo "&#10003;";
              }
            }

            ?>
            </td>
            <td class="check urine">
            <?php
            if (get_sub_field('panel_tests')) {
              $urine = get_sub_field('panel_tests');

              if (in_array("Urine", $urine)) {
                echo "&#10003";
              }
            }
            ?>
            </td>
            <td class="check misc">
            <?php
            if (get_sub_field('panel_tests')) {
              $misc = get_sub_field('panel_tests');
              if (in_array("Misc", $misc)) {
                echo "&#10003";
              }
            }
            ?>
            </td>
          </tr>
    <?php endwhile; ?>

    <tr>
      <td colspan="4" style="text-indent: 60px; border-top:3px solid white;">
        <small>(*) Not yet available for New York residents.</small>
      </td>
    </tr>
    </table>
<?php endif; ?>
    </div>
  </div>
</div>
</section>
