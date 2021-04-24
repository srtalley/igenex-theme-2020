<?php
/*
Template Name: Tick Talk
*/
get_header(); 
?>
<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container d">
	<div class="main-grid">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'tick-talk' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		 </main>
		<aside class="sidebar" id="tick-talk-sidebar">
			<div class="sidebar-inner">
				<?php dynamic_sidebar('tick-talk-sidebar'); ?>
			</div>
		</aside>
	</div>
</div>
<?php get_footer();
