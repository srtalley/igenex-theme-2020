<?php
/*
Template Name: Woo
*/
get_header();
//$hero_article = get_field('hero_article');
// if(function_exists('xdebug_disable')) { xdebug_disable(); }
// ini_set('display_errors','Off');
// ini_set('error_reporting', E_ALL );
// define('WP_DEBUG', false);
// define('WP_DEBUG_DISPLAY', false);

?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- <div class="grid-container">
<div class="grid-x">
	<div class="cell large-12 empty-cart"> -->
<?php the_content(); ?>
<!-- </div>
</div>
</div> -->

<?php endwhile;?>


<?php get_footer(); ?>
