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

get_header(); 

// This is the template for FAQ pages and includes a component to build the 
// structured data for FAQ pages

$dst_structured_data_faq  = '{';
	$dst_structured_data_faq .= ' "@context": "https://schema.org",';
	$dst_structured_data_faq .= ' "@type": "FAQPage",';
	$dst_structured_data_faq .= ' "mainEntity": [';

?>
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
			<header class="grid-container">
				<?php echo get_igenex_breadcrumbs();?>
			</header>
			<?php /* Start the Loop */ ?>
			<!-- <section class="faqs"> -->

			<div class="faqs grid-container">
				<div class="grid-x">
					<div class="cell small-12">
						<ul class="accordion" data-accordion data-allow-all-closed="true" data-deep-link="true" data-deep-link-smudge="true" data-deep-link-smudge-delay="600">
							<?php 
							global $wp_query;
							$total_results = count( $wp_query->posts );
							$counter = 0; 
							while ( have_posts() ) : the_post();
							
								$counter++; 
								$dst_structured_data_faq .= ' {';
								$dst_structured_data_faq .= '   "@type": "Question",';
								$dst_structured_data_faq .= '   "name": "' . wp_strip_all_tags(get_the_title()) . '",';
								$dst_structured_data_faq .= '   "acceptedAnswer": {';
								$dst_structured_data_faq .= '     "@type": "Answer",';
								$dst_structured_data_faq .= '     "text": "' . wp_strip_all_tags(get_the_content()) . '"';
								$dst_structured_data_faq .= '    }';
								$dst_structured_data_faq .= '  }';
								if($counter != $total_results) {
									$dst_structured_data_faq .= ',';
								} else {
									$dst_structured_data_faq .= ']';
									$dst_structured_data_faq .= '}';
								}
								
								$slug = rtrim(get_permalink(), '/');
								$slug = basename($slug);

								?>
								<li class="accordion-item" data-accordion-item>
									<!-- Accordion tab title -->
									<a href="#<?php echo $slug; ?>" class="accordion-title"><?php the_title() ;?></a>
									<!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
										<div class="accordion-content" data-tab-content id="<?php echo $slug; ?>">
											<?php the_content() ;?>
										</div>
								</li> <!-- accordion-item --> 
							<?php endwhile; ?>
						</ul><!-- grid-x -->
					</div><!-- cell small-12 -->
				</div> <!-- grid-x -->
			</div> <!-- faqs grid-container grid-container-padded -->
			<!-- </section>  -->
			<!-- faqs -->
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; // End have_posts() check. ?>
		</main>
	</div>
</div>

<?php      
// echo the structured data 
$dst_structured_data_faq_wrapper  = '<script type="application/ld+json">';
$dst_structured_data_faq_wrapper .= $dst_structured_data_faq;
$dst_structured_data_faq_wrapper .= '</script>';
echo $dst_structured_data_faq_wrapper; 

get_footer();
