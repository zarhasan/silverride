<?php
/**
 * Template Name: Blog
 *
 */

$blog_search = isset($_GET['query']) ? sanitize_text_field(wp_unslash($_GET['query'])) : '';
$blog_category_slug = isset($_GET['category']) ? sanitize_text_field(wp_unslash($_GET['category'])) : '';
$blog_sort_order = (isset($_GET['sort']) && $_GET['sort'] === 'oldest') ? 'ASC' : 'DESC';

$featured_post_id = 0;
if ( empty( $blog_search ) && empty( $blog_category_slug ) ) {
    $featured_posts = get_posts( array(
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'order'          => $blog_sort_order,
        'orderby'        => 'date',
        'fields'         => 'ids',
    ) );
    $featured_post_id = ! empty( $featured_posts ) ? $featured_posts[0] : 0;
}

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
    'exclude_post_id' => $featured_post_id,
));

get_footer();
