<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$featured_args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'order' => $blog_sort_order ?? 'DESC',
    'orderby' => 'date',
);

if (!empty($blog_search)) {
    $featured_args['s'] = $blog_search;
}

if (!empty($blog_category_slug)) {
    $featured_args['category_name'] = $blog_category_slug;
}

$featured_query = new WP_Query($featured_args);
?>

<?php if ($featured_query->have_posts()) : ?>
    <?php while ($featured_query->have_posts()) : $featured_query->the_post(); 
        $categories = get_the_category();
        $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Blog Post';
    ?>
    <section class="bg-white my-12 lg:my-20" data-section-id="<?php echo esc_attr($template_part_name); ?>">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                <div class="aspect-[16/10] overflow-hidden rounded-lg">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover">
                </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="flex flex-col justify-center">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-primary font-medium"><?php echo $category_name; ?></span>
                        <span class="text-gray-400">&middot;</span>
                        <time class="text-gray-500"><?php echo get_the_date('F j, Y'); ?></time>
                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-[2.5rem] font-bold text-gray-900 leading-tight mb-6">
                        <?php echo esc_html(get_the_title()); ?>
                    </h1>

                    <p class="text-lg text-gray-700 leading-relaxed mb-8">
                        <?php echo esc_html(get_the_excerpt()); ?>
                    </p>

                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary self-start">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
