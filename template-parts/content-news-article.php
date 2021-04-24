<?php
/**
 * Template to display the news articles
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
    <?php 
    $article_logo_image = get_field('logo_image');
    if ( !empty($article_logo_image) ) : ?>
			<div class="single-featured">
            <a href="<?php echo esc_url( get_field('external_link') ); ?>" target="_blank"><img class="news-article-logo" src="<?php echo $article_logo_image['url'];?>" /></a>
			</div>
    <?php endif;
    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_field('external_link') ) . '" rel="bookmark" target="_blank">', '</a></h2>' );

?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<p class="entry-date"><?php echo get_the_date(); ?></p>

        <a href="<?php echo esc_url( get_field('external_link') ); ?>" target="_blank">READ MORE</a>

		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
	<footer>
		<?php
			wp_link_pages(
				array(
					'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					'after'  => '</p></nav>',
				)
			);
		?>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
</article>
