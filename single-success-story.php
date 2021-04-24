<?php
/*
Template Name: Press Release
*/
get_header(); ?>
<div id="" class="titlebar-module patient">
	<div class="grid-container">
		<div class="grid-x">
		<div class="cell auto">
			<h2><a href="/igenex-success-stories">IGeneX Success Stories</a></h2>
		</div>
		</div>
	</div>
</div>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
            <?php while ( have_posts() ) : the_post(); ?>
            			
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header>
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            <?php the_post_thumbnail(); ?>  
                        </header>
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
                        </div>

                    </article>
			<?php endwhile; ?>
         </main>
         <aside class="sidebar" id="success-story-sidebar">
			<div class="sidebar-inner">
                <?php 
                    $related_success_story_args = array( 
                        'orderby' => 'rand',
                        'post__not_in' => array(get_the_ID()),
                        'post_type' => 'success-story',
                        'posts_per_page' => 24,
                        'paged' => $paged
                        );
                    $related_success_story_query = new WP_Query($related_success_story_args); ?>

                <?php if ( $related_success_story_query->have_posts() ) : ?>
                    <div class="grid-x grid-padding-x grid-padding-y small-12">
                        <div class="cell grid-x align-center small-12"><h3>Read More Lyme Stories</h4>
                        </div>
                        <div class="related-stories-icons grid-x">
                    <?php while ( $related_success_story_query->have_posts() ) : $related_success_story_query->the_post(); ?>
                        <div class="cell small-4">
                            <?php 
                            echo '<a href="' . get_the_permalink() . '" rel="bookmark">';
                            the_post_thumbnail('thumbnail');
                            echo '</a>';
                            ?>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
			</div>
		</aside>
	</div>
</div>
<?php get_footer();
