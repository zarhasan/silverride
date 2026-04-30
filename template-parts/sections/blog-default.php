<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$post_count = $args['post_count'] ?? 12;
$category = $args['category'] ?? 0;
$custom_query = $args['query'] ?? null;

$search = $args['blog_search'] ?? '';
$category_slug = $args['blog_category_slug'] ?? '';
$sort_order = $args['blog_sort_order'] ?? 'DESC';

if ($custom_query) {
    $query = $custom_query;
} else {
    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_count,
        'post_status' => 'publish',
        'order' => $sort_order,
        'orderby' => 'date',
        'offset' => 1,
    );

    if (!empty($category)) {
        $query_args['cat'] = $category;
    }

    if (!empty($search)) {
        $query_args['s'] = $search;
    }

    if (!empty($category_slug)) {
        $query_args['category_name'] = $category_slug;
    }

    $query = new WP_Query($query_args);
}

$total_posts = $query->found_posts;
$show_view_more = $total_posts > $post_count;
?>

<section class="bg-white my-12 lg:my-20" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
            <?php if ($query->have_posts()) : ?>
                <?php 
                $post_index = 0;
                while ($query->have_posts()) : $query->the_post(); 
                    $post_index++;
                ?>
                    <?php get_template_part('template-parts/post-card'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center col-span-full text-gray-600">No posts found.</p>
            <?php endif; ?>
        </div>

        <?php if ($show_view_more || $query->have_posts()) : ?>
        <div class="text-center mt-12">
            <button type="button" class="btn btn-primary">
                Load More
            </button>
        </div>
        <?php endif; ?>
    </div>
</section>
