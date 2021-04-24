<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<div id="" class="titlebar-module patient">
	<div class="grid-container">
		<div class="grid-x">
		<div class="cell auto">
			<h2>FAQs</h2>
		</div>
		</div>
	</div>
</div>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
		<?php if ( have_posts() ) : 
			?>
			<header>
				<?php echo get_igenex_breadcrumbs();?>
			</header>
			<?php /* Start the Loop */ ?>
			<div class="faq-category-titles">
			<ul>
			<?php while ( have_posts() ) : the_post(); ?>

				<li>
				<a href="<?php the_permalink(); ?>"><?php the_title() ;?></a>
				</li>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>


			</ul>
			</div>
		</main>
	</div>
</div>

<?php get_footer();
