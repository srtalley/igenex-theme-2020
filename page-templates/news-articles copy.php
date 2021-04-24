<?php
/**
 * Template Name: News Articles
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();
?>
<div class="news-articles-page">
	<div id="" class="titlebar-module patient">
	<div class="grid-container">
		<div class="grid-x">
		<div class="cell auto">
			<h2><?php echo get_the_title(); ?></h2>
		</div>
		</div>
	</div>
	</div>
	<section class="news-articles-grid">
		<div class="grid-container">
				<?php
					$news_article_args = array( 
						'orderby' => 'date',
						'post_type' => 'news-article',
						);
					$news_article_query = new WP_Query($news_article_args); ?>
			<div class="grid-x grid-padding-y grid-padding-x">
				<div class="grid-sizer"></div>
				<?php if ( $news_article_query->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( $news_article_query->have_posts() ) : $news_article_query->the_post(); ?>
					<div class="grid-item">
					<!-- <div class="cell small-12 large-4"> -->
						<div class="card">
							<?php get_template_part( 'template-parts/content', 'news-article'); ?>
						</div>
					</div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; // End have_posts() check. ?>
					<?php /* Display navigation to next/previous pages when applicable */ ?>
					<?php
					if ( function_exists( 'foundationpress_pagination' ) ) :
						foundationpress_pagination();
					elseif ( is_paged() ) :
					?>
						<nav id="post-nav">
							<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
							<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
						</nav>
					<?php endif; ?>
					</div>

				<?php wp_reset_query(); ?>

		</div>
	</section>
	<section class="press-releases-list">
		<div class="grid-container">
			<div class="grid-x grid-padding-y grid-padding-x">
				<div class="cell small-12">
					<h2>Press Releases</h2>
					<?php
					$press_release_args = array( 
						'orderby' => 'date',
						'post_type' => 'press-release',
						);
					$press_release_query = new WP_Query($press_release_args); ?>
					<?php if ( $press_release_query->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( $press_release_query->have_posts() ) : $press_release_query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<p class="entry-date"><?php echo get_the_date(); ?></p>
						<?php the_title( '<p class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></p>' ); ?>
					</article>

					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="page-content">
		<div class="grid-container">
			<?php the_content(); ?>
		</div>
	</section>
</div>
<?php get_footer();
