<?php
/*
Template Name: FAQ
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
            <?php while ( have_posts() ) : the_post(); ?>
                    <?php 
                    $dst_structured_data_faq .= ' {';
                        $dst_structured_data_faq .= '   "@type": "Question",';
                        $dst_structured_data_faq .= '   "name": "' . wp_strip_all_tags(get_the_title()) . '",';
                        $dst_structured_data_faq .= '   "acceptedAnswer": {';
                        $dst_structured_data_faq .= '     "@type": "Answer",';
                        $dst_structured_data_faq .= '     "text": "' . wp_strip_all_tags(get_the_content()) . '"';
                        $dst_structured_data_faq .= '    }';
                        $dst_structured_data_faq .= '  }';

                        $dst_structured_data_faq .= ']';
                        $dst_structured_data_faq .= '}';
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header>
                        <?php echo get_igenex_breadcrumbs();?>

                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
                        </div>

                    </article>
			<?php endwhile; ?>
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
