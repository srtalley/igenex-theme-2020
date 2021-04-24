<a class="anchor" id="tick_talk_module"></a>
<section id="" class="tick_talk_resource alternate <?php the_field('theme') ?>">
  <div class="grid-container grid-container-padded">
    <div class="grid-x grid-padding-x">
      <div class="cell">
        <h2>Tick Talk Resource</h2>
      </div>
    </div>
    <?php switch_to_blog(2); ?>
    <div class="grid-x grid-padding-x">
    <?php
    global $post;
    $args = array( 'numberposts' => 3 );
    $myposts = get_posts( $args );
    foreach( $myposts as $post ) :
      setup_postdata($post); ?>
    	<div class="cell medium-4">

        <?php
        $url = get_the_post_thumbnail_url($post->ID);
        $path = parse_url($url, PHP_URL_PATH);
        $domain = $_SERVER['SERVER_NAME'];
        $image = 'https://' . $domain . '/ticktalk' . $path;
        // $image = str_replace('http://', 'https:/', $image);
        ?>

        <figure>
          <a href="<?php the_permalink(); ?>" target="_blank"><img src="<?php echo $image ?>"></a>
          <figcaption>
            <div class="date"><?php echo get_the_date( 'M d Y' ); ?></div>
            <h3><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="learnmore" target="_blank">Learn More</a>
          </figcaption
        </figure>



      </div>
    <?php endforeach;
    wp_reset_postdata(); ?>
  </div>


    <?php restore_current_blog(); ?>

  </div>
</section>
