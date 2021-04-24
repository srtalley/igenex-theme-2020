<?php
/*
Template Name: Symptom Checker
*/
get_header();
?>
<header class="cat-banner" style="background-color:rgba(37,48,140,1.00)">
    <div class="cat-banner-container">Symptom Checker</div>
</header>
<header class="symptom-checker-hero show-for-large" style="background:url(<?php echo get_field('hero_image'); ?>);">
    <div id="symtom-checker-intro-hero">
        <div class="flex-item-hero">
            <div class="hero-title"><?php echo get_field('hero_title'); ?></div>
            <div class="hero-subtitle"><?php echo get_field('hero_sub_title'); ?></div>
            <!--<a role="button" class="sg-button take-the-quiz" href="#">Take the Quiz</a>-->
        </div>
    </div>
</header>
  
<div class="iframe-container" id="symptom-checker-container">
    <iframe class="surveygizmo_link" src="<?php echo get_field('surveygizmo_link'); ?>"></iframe>
</div>

<?php get_footer(); ?>
<?php wp_footer(); ?>
