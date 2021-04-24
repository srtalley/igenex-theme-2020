<a class="anchor" id="lab_cert_module"></a>
<section id="" class="lab-certs <?php the_field('theme') ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x grid-padding-x align-middle">
      <div class="cell medium-5">

        <h2><?php the_field('lab_cert_title','option') ?></h2>
        <p><?php the_field('lab_cert_description','option') ?></p>
      </div>
      <div class="cell medium-6 medium-offset-1 align-self-middle">
        <div class="logo-container">
          <div class="grid-x align-middle logo">
            <div class="cell">
              <a href="<?php the_field('lab_cert_link','option') ?>" target="_blank"><img src="<?php the_field('lab_cert_logo','option') ?>"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
