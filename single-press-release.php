<?php
/*
Template Name: Press Release
*/
get_header(); ?>
<?php //get_template_part( 'template-parts/featured-image' ); ?>
<div id="" class="titlebar-module patient">
	<div class="grid-container">
		<div class="grid-x">
		<div class="cell auto">
			<h2>Press Release</h2>
		</div>
		</div>
	</div>
</div>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		 </main>
	</div>
</div>
<?php get_footer();
