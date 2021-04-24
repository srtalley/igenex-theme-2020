<?php
/**
 * Template Name: Success Stories
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();
?>
<div class="success-stories-page">
	<div id="" class="titlebar-module patient">
	<div class="grid-container">
		<div class="grid-x ">
		<div class="cell auto">
			<h2><?php echo get_the_title(); ?></h2>
		</div>
		</div>
	</div>
    </div>
    <section class="page-content">
		<div class="grid-x">
            <div class="cell small-12 large-10 large-offset-1">
                <?php the_content(); ?>
            </div> 
		</div>
	</section>
	<section class="success-stories-grid">
        <div class="grid-x">
            <div class="cell small-12 large-10 large-offset-1">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $success_story_args = array( 
                'orderby' => 'date',
                'post_type' => 'success-story',
                'posts_per_page' => 20,
                'paged' => $paged
                );
            $success_story_query = new WP_Query($success_story_args); ?>
			<div class="grid-x">
				<?php if ( $success_story_query->have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( $success_story_query->have_posts() ) : $success_story_query->the_post(); ?>
					    <div class="cell small-12 success-article">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="grid-x row">
                                    <div class="column cell align-self-top small-12 medium-3 large-3 large-offset-1 headshot">
                                        <?php 
                                        the_title( '<h2 class="entry-title"><a href="' . get_the_permalink() . '" rel="bookmark">', '</a></h2>' );

                                        echo '<a href="' . get_the_permalink() . '" rel="bookmark">';
                                        the_post_thumbnail();
                                        echo '</a>';
                                        ?>
                                    </div>
                                    <div class="column cell align-self-middle small-12 medium-8 medium-offset-1 large-6 large-offset-1 entry-content">
                                        <?php the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>" class="entry-link">Read the Full Story &raquo;</a>
                                    </div>
                                </div>
                            </article>
					    </div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>

                    <?php endif; // End have_posts() check. ?>
                    </div>
					<?php /* Display navigation to next/previous pages when applicable */ ?>
					<?php
                    
                    if($paged) { ?>
                        <div class="pagination row grid-x small-12">
                            <div class="column grid-x small-12 large-6 large-offset-3 align-center">

                        <?php 
                            echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $success_story_query->max_num_pages,
                                'current'      => max( 1, get_query_var( 'paged' ) ),
                                'format'       => '?paged=%#%',
                                'show_all'     => false,
                                'type'         => 'plain',
                                'end_size'     => 2,
                                'mid_size'     => 1,
                                'prev_next'    => true,
                                'prev_text'    => sprintf( '<i></i> %1$s', __( '&larr; Older', 'foundationpress' ) ),
                                'next_text'    => sprintf( '%1$s <i></i>', __( 'Newer &rarr;', 'foundationpress' ) ),
                                'add_args'     => false,
                                'add_fragment' => '',
                            ) );
                        ?>
                        </div>
                    </div>   
                    <?php
                    }?>
					

				<?php wp_reset_query(); ?>
            </div>
        </div>
	</section>


</div>
<?php get_footer();
