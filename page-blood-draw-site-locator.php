<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<style>
    /* fix for issue with loading bootstrap */
    .igenex_nav a:hover, .igenex_nav a:focus,
    .footer-main a:hover, .footer-main a:focus {
        text-decoration: none;
    }
    h1 {
        border-bottom: 3px solid;
        display: inline-block;
        font-size: 30px;
        margin: 25px auto;
        padding-top: 20px;
    }

    main.main-content article header {
        display: none;
    }

    input,
    select,
    .wpml_above_map .store_locator_field select,
    textarea,
    .select2-container-multi .select2-choices .select2-search-field input {
        padding:  10px !important;
    }

    .search-options-btn {
        background-color: #19abe2;
    }

    .footer-main {
        clear: both;
        display: block;
        float: none;
    }

    #store-locator-id.row.ob_stor-relocator {
        float: none;
        margin-bottom: 50px !important;
        margin-top: 50px !important;
        max-width: 1200px !important;
    }

    #store_locator_search_form input#store_locatore_search_btn {
        background-color: #29398b;
    }

    #store_locator_search_form select#store_locatore_search_radius{
        padding: 0px 12px!important!important;
    }
    select#wpsl_store_locator_category{
        padding: 0px 12px!important!important;
        }
    #store_locator_search_form #store_locatore_search_input{
        font-size: 14px!important;
        padding: 0px 12px!important;
        }

    #store-locator-id .map-listings,
    .map-listings {
        padding-top: 68px;
    }

    #store-locator-id .circle-count,
    .map-listings .circle-count {
        background-color: #73bd44; /* #ff2965; */
    }

    #store-locator-id .wpsl-distance,
    .map-listings .wpsl-distance {
        background-color: #00e4ff;
    }

    #store-locator-id .wpsl-phone a,
    .map-listings .wpsl-phone a {
        color: #19abe2;
    }

    #store-locator-id .wpsl-wesite-link a,
    .map-listings .wpsl-website-link a {
        color: #29398b;
    }

    #store-locator-id .wpsl-name a,
    .map-listings .wpsl-name a {
        color: #29398b;   
    }

    #wpsl_store_locator_category,
    #s2id_store_locator_tag {
        display: none !important;
    }

    #store-locator-id .search-options-btn,
    .map-listings .search-options-btn {
        float: left;
        margin-top: 17px;
        width: 26%;
    }

    #store-locator-id .store-search-fields,
    .map-listings .store-search-fields {
        float: left;
        width: 74%;
    }
    @media (min-width: 1200px) {
        #store_locatore_search_map {
            margin-left: 26%;
            width: 74%!important;
        }
    }
    @media (max-width: 1199px) {
        #store_locatore_search_map {
            margin-left: 30%;
            width: 70% !important;
        }
    }
    @media (max-width: 992px) {
        #store_locatore_search_map {
            margin-left: 40%;
            width: 60% !important;
        }
    }
    @media (max-width: 768px) {
        #store_locatore_search_map {
            margin-left: 50%;
            width: 50% !important;
        }
        #store-locator-id .map-listings, .map-listings {
            padding-top: 168px;
        }
    }
    @media (max-width: 600px) {
        #store_locatore_search_map {
            margin-left: 0;
            width: 100% !important;
        }
        #store-locator-id .map-listings, .map-listings {
            padding-top: 0;
        }
    }
</style>

<?php // get_template_part( 'template-parts/featured-image' ); ?>

<div id="" class="titlebar-module patient">
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell auto">
        <h2><?php echo get_the_title(); ?></h2>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
    <div class="main-grid">
        <main class="main-content" style="padding: 0 25px;">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/content', 'page' ); ?>
                <?php // comments_template(); ?>
            <?php endwhile;?>
        </main>
        <?php // get_sidebar(); ?>
    </div>
</div>
<?php get_footer();
