<?php
if (get_field('theme') == 'patient') {
  $bgcolor = "#19ABE2";
} else {
  $bgcolor = "#138D81";
}

?>

<a class="anchor" id="licensing_module"></a>
<section id="" class="licensing" style="background-color:<?php echo $bgcolor ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x grid-padding-x">
      <div class="cell auto">
        <h2>Licensing &amp; Accreditation</h2>
        <h4 style="max-width: 700px;margin: 10px auto 0 !important; font-size: 22px;">IGeneX is licensed in all 50 states because we are CLIA certified. Some states require a separate license. Click a state below to view license.</h4>
      </div>
    </div>
    <?php if( have_rows('licenses') ): ?>
    <div class="grid-x grid-padding-x">
      <div class="cell small-8 small-offset-2">
        <div class="grid-x grid-padding-x grid-padding-y align-middle">
          <?php while( have_rows('licenses') ): the_row(); ?>
            <div class="cell small-4">
              <?php $image = wp_get_attachment_image_src(get_sub_field('state'), 'full'); ?>
              <a href="<?php the_sub_field('license_link') ?>" target="_blank" class="state"><img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" /></a>
            </div>
          <?php endwhile; ?>
        </div>
      </div>


    </div>
    <?php endif; ?>
  </div>
</section>
