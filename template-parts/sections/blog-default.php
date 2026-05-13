<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$post_count = $args['post_count'] ?? 12;
$category = $args['category'] ?? 0;
$custom_query = $args['query'] ?? null;
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);

$search = $args['blog_search'] ?? '';
$category_slug = $args['blog_category_slug'] ?? '';
$sort_order = $args['blog_sort_order'] ?? 'DESC';

if ($custom_query) {
    $query = $custom_query;
} else {
    $paged = max(1, get_query_var('paged'));

    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_count,
        'post_status' => 'publish',
        'order' => $sort_order,
        'orderby' => 'date',
        'paged' => $paged,
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

?>

<section class="bg-white my-12 lg:my-20 <?php echo esc_attr($hide_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
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

        <?php if ($query->max_num_pages > 1) : ?>
        <div class="mt-12">
            <?php get_template_part('template-parts/pagination', null, ['query' => $query]); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
