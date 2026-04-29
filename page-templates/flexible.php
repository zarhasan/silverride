<?php
/**
 * Template Name: Page (Flexible)
 *
 */

get_header(); 

$sections = get_field('sections');

?>

<div id="content">
  <?php if(!empty($sections)): ?>
        <?php foreach ($sections as $index => $section): ?>
            <?php $id = 'section-'.$index + 1; ?>
            <?php get_template_part('template-parts/sections/' . $section['acf_fc_layout'], $section['type'] ?? 'default', array_merge($section, ['id' => $id])); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>