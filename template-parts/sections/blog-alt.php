<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? 'The Latest From SilverRide';
$post_count = $args['post_count'] ?? 3;
$category = $args['category'] ?? 0;
$custom_query = $args['query'] ?? null;
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);

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
?>

<section class="bg-white py-16 lg:py-24 <?php echo esc_attr($hide_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-gray-900 text-center mb-12 lg:mb-16">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="flex flex-col">
                        <?php if (has_post_thumbnail()) : ?>
                        <div class="aspect-[4/3] overflow-hidden mb-6">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover">
                        </div>
                        <?php endif; ?>

                        <h3 class="text-[1.625rem] font-bold text-gray-900 mb-4 leading-snug">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="hover:text-primary transition-colors duration-200">
                                <?php echo esc_html(get_the_title()); ?>
                            </a>
                        </h3>

                        <p class="text-base text-gray-700 leading-relaxed mb-6 flex-grow">
                            <?php echo esc_html(get_the_excerpt()); ?>
                        </p>

                        <a href="<?php echo esc_url(get_permalink()); ?>" class="inline-flex items-center justify-center self-start px-6 py-2 text-base font-semibold text-white bg-primary rounded-full hover:bg-primary transition-colors duration-200">
                            Read More
                        </a>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center col-span-full text-gray-600">No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
