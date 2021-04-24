<?php
if (get_field('theme') == 'patient') {
  $bgcolor = "#19ABE2";
} else {
  $bgcolor = "#138D81";
}

?>

<a class="anchor" id="wysiwyg_module"></a>
<section id="" class="wysiwyg" style="background-color:<?php echo $bgcolor ?>">
  <div class="grid-container grid-container-fluid">
    <div class="grid-x grid-padding-x align-middle">
      <div class="cell medium-5">
        <!-- <img src="/assets/img/static/building.jpg"> -->
        <div class="img-container">
          <div class="img-wrapper" style="background:url('<?php the_sub_field('wysiwyg_image') ?>'); background-position:center; background-size:cover; background-repeat: no-repeat;">

          </div>
        </div>
      </div>
      <div class="cell medium-6 medium-offset-1">
        <h2><?php the_sub_field('wysiwyg_title') ?></h2>
        <p><?php the_sub_field('wysiwyg_desc') ?></p>
      </div>
    </div>
  </div>
</section>
