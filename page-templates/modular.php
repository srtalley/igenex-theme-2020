<?php
/*
Template Name: Modular
Template Post Type: page, disease, post, diseases
*/
get_header(); ?>

<?php
if (have_rows('module_builder')) :

  // loop through the rows of data
  while (have_rows('module_builder')) : the_row();

    // check current row layout

    if (get_row_layout() == 'accordion_wysiwyg_module') :

      include('inc/accordion_wysiwyg_module.php');

    elseif (get_row_layout() == 'advantage_module') :

      include('inc/advantage_module.php');

    elseif (get_row_layout() == 'blood_draw_module') :

      include('inc/blood_draw_module.php');

    elseif (get_row_layout() == 'collection_kit_module') :

      include('inc/collection_kit_main.php');

    elseif (get_row_layout() == 'collection_kit_summary_module') :

      include('inc/collection_kit_summary_module.php');

    elseif (get_row_layout() == 'diagnostic_panel_module') :

      include('inc/diagnostic_panel_module.php');

    elseif (get_row_layout() == 'elementor_template_module') :

      include('inc/elementor_module.php');

    elseif (get_row_layout() == 'employee_module') :

      include('inc/employee_module2.php');

    elseif (get_row_layout() == 'faq_module') :

      include('inc/faq_module.php');

    elseif (get_row_layout() == 'forms_policies_module') :

      include('inc/forms_policies_module.php');

    elseif (get_row_layout() == 'hero_module') :

      include('inc/hero_module.php');

    elseif (get_row_layout() == 'how_it_works_module') :

      include('inc/how_it_works_module.php');

    elseif (get_row_layout() == 'icon_grid_module') :

      include('inc/icon_grid_module.php');

    elseif (get_row_layout() == 'image_grid_module') :

      include('inc/image_grid_module.php');

    elseif (get_row_layout() == 'interpreting_module') :

      include('inc/interpreting_module.php');
      
    elseif (get_row_layout() == 'kit_table_module') :

      include('inc/kit_table_module.php');

    elseif (get_row_layout() == 'lab_cert_module') :

      include('inc/lab_cert_module.php');

    elseif (get_row_layout() == 'licensing_module') :

      include('inc/licensing_module.php');

    elseif (get_row_layout() == 'map_module') :

      include('inc/map_module.php');

    elseif (get_row_layout() == 'press_module') :

      include('inc/press_module.php');

    elseif (get_row_layout() == 'side_bar_module') :

      include('inc/sidebar_module.php');

    elseif (get_row_layout() == 'test_a_tick_module') :

      include('inc/test_a_tick_module.php');

    elseif (get_row_layout() == 'tick_talk_resource_module') :

      include('inc/tick_talk_resource_module.php');

    elseif (get_row_layout() == 'title_bar_module') :

      include('inc/title_bar_module.php');

    elseif (get_row_layout() == 'wysiwyg_module') :

      include('inc/wysiwyg_module.php');

    elseif (get_row_layout() == 'wysiwyg_wizard_module') :

      include('inc/wysiwyg_wizard_module.php');

    endif;
  endwhile;
endif;
?>

<?php get_footer(); ?>
