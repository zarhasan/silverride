<?php
/**
 * Template Name: Blog
 *
 */

$blog_search = isset($_GET['query']) ? sanitize_text_field(wp_unslash($_GET['query'])) : '';
$blog_category_slug = isset($_GET['category']) ? sanitize_text_field(wp_unslash($_GET['category'])) : '';
$blog_sort_order = (isset($_GET['sort']) && $_GET['sort'] === 'oldest') ? 'ASC' : 'DESC';

get_header();

get_template_part('template-parts/sections/filters-blog');

if(empty($blog_search) && empty($blog_category_slug)) {
    // Only show hero section when no filters are applied
    get_template_part('template-parts/sections/hero-blog');
};

get_template_part('template-parts/sections/blog-default', null, array(
    'blog_search' => $blog_search,
    'blog_category_slug' => $blog_category_slug,
    'blog_sort_order' => $blog_sort_order,
));

get_footer();
