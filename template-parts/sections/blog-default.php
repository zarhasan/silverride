<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$post_count = $args['post_count'] ?? 12;
$category = $args['category'] ?? 0;
$custom_query = $args['query'] ?? null;

if ($custom_query) {
    $query = $custom_query;
} else {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $post_count,
        'post_status' => 'publish',
        'offset' => 1,
    );

    if (!empty($category)) {
        $args['cat'] = $category;
    }

    $query = new WP_Query($args);
}

$total_posts = $query->found_posts;
$show_view_more = $total_posts > $post_count;
?>

<section class="bg-white py-12 lg:py-20" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
            <?php if ($query->have_posts()) : ?>
                <?php 
                $post_index = 0;
                while ($query->have_posts()) : $query->the_post(); 
                    $post_index++;
                ?>
                    <?php get_template_part('template-parts/post-card'); ?>

                    <?php 
                    // Insert logo promo block after 4th post to match screenshot layout
                    if ($post_index === 4) : 
                    ?>
                        <div class="hidden lg:flex flex-col items-center justify-center aspect-[4/3]">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex flex-col items-center text-blue-900 no-underline">
                                <span class="text-3xl font-bold tracking-tight leading-none">SilverRide</span>
                                <span class="text-[0.65rem] font-semibold tracking-[0.25em] mt-1 uppercase">There With Care</span>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center col-span-full text-gray-600">No posts found.</p>
            <?php endif; ?>
        </div>

        <?php if ($show_view_more || $query->have_posts()) : ?>
        <div class="text-center mt-12">
            <button type="button" class="inline-flex items-center justify-center px-8 py-3 text-base font-semibold text-blue-800 border-2 border-blue-800 rounded-full hover:bg-blue-800 hover:text-white transition-colors duration-200">
                Read Less
            </button>
        </div>
        <?php endif; ?>
    </div>
</section>
