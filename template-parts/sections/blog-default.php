<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$post_count = $args['post_count'] ?? 12;
$category = $args['category'] ?? 0;
$link = $args['link'] ?? [];
$custom_query = $args['query'] ?? null;

if ($custom_query) {
    $query = $custom_query;
} else {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_count,
        'post_status' => 'publish',
    );

    if (!empty($category)) {
        $args['cat'] = $category;
    }

    $query = new WP_Query($args);
}

$total_posts = $query->found_posts;
$show_view_more = $total_posts > $post_count;
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <h2 class="text-3xl md:text-4xl lg:text-[2.5rem] font-semibold text-center text-[#1B1B1B] mb-12">
            <?php echo esc_html($title); ?>
        </h2>

        <?php if ($description) : ?>
            <p class="text-center text-lg text-[#1B1B1B] mb-8 max-w-3xl mx-auto">
                <?php echo wp_kses_post($description); ?>
            </p>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part('template-parts/post-card'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center col-span-3 text-[#1B1B1B]">No posts found.</p>
            <?php endif; ?>
        </div>

        <?php if ($show_view_more) : ?>
        <div class="text-center mt-10">
            <a href="/blogs" class="text-lg inline-flex items-center justify-center px-8 py-3 text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                View More News & Blogs
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
