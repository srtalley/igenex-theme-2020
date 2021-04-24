<a class="anchor" id="map_module"></a>
<div id="">
<div class="grid-x">
  <div class="cell">

<?php
$section_content = get_sub_field('map_shortcode', false, false);
$section_content = apply_filters('the_content', $section_content);
echo $section_content;
?>

</div>
</div>
</div>
