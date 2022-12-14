<?php
/*
Template Name: Front
*/
get_header();
$hero_article = get_field('hero_article');
?>

<?php if( $hero_article ): ?>
	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($hero_article->ID), 'thumbnail' ); ?>
	<header class="front-hero" role="banner" style="background: url('<?php echo $url ?>') bottom center; background-size: cover; background-position: bottom;">
		<div class="marketing">
			<div class="tagline">
				<h4 class="subheader"><?php echo get_the_category($hero_article->ID)[0]->name ?></h4>
				<h1><?php echo $hero_article->post_title; ?></h1>
				<a role="button" class="download large button sites-button hide-for-small-only" href="<?php echo get_permalink($hero_article->ID)?>">Learn More</a>
			</div>
		</div>
	</header>
<?php endif; ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
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
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="section-divider">
	<hr />
</div>


<section class="benefits">
	<header>
		<h2>Build Foundation based sites, powered by WordPress</h2>
		<h4>Foundation is the professional choice for designers, developers and teams. <br /> WordPress is by far, <a href="http://trends.builtwith.com/cms">the world's most popular CMS</a> (currently powering 38% of the web).</h4>
	</header>

	<div class="semantic">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/demo/semantic.svg" alt="semantic">
		<h3>Semantic</h3>
		<p>Everything is semantic. You can have the cleanest markup without sacrificing the utility and speed of Foundation.</p>
	</div>

	<div class="responsive">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/demo/responsive.svg" alt="responsive">
		<h3>Responsive</h3>
		<p>You can build for small devices first. Then, as devices get larger and larger, layer in more complexity for a complete responsive design.</p>

	</div>

	<div class="customizable">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/demo/customizable.svg" alt="customizable">
		<h3>Customizable</h3>
		<p>You can customize your build to include or remove certain elements, as well as define the size of columns, colors, font size and more.</p>

	</div>

	<div class="professional">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/demo/professional.svg" alt="professional">
		<h3>Professional</h3>
		<p>Millions of designers and developers depend on Foundation. We have business support, training and consulting to help grow your product or service.</p>
	</div>

	<div class="why-foundation">
		<a href="/kitchen-sink">See what's in Foundation out of the box ???</a>
	</div>

</section>

<?php get_footer();
