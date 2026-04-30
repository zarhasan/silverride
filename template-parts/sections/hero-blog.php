<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$featured_args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post_status' => 'publish',
);

$featured_query = new WP_Query($featured_args);
?>

<?php if ($featured_query->have_posts()) : ?>
    <?php while ($featured_query->have_posts()) : $featured_query->the_post(); 
        $categories = get_the_category();
        $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Blog Post';
    ?>
    <section class="bg-white py-12 lg:py-20" data-section-id="<?php echo esc_attr($template_part_name); ?>">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                <div class="aspect-[4/3] overflow-hidden rounded-lg">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover">
                </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="flex flex-col justify-center">
                    <div class="flex items-center gap-3 text-sm mb-4">
                        <span class="text-blue-700 font-medium"><?php echo $category_name; ?></span>
                        <span class="text-gray-400">&middot;</span>
                        <time class="text-gray-500"><?php echo get_the_date('F j, Y'); ?></time>
                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-[2.5rem] font-bold text-gray-900 leading-tight mb-6">
                        <?php echo esc_html(get_the_title()); ?>
                    </h1>

                    <p class="text-lg text-gray-700 leading-relaxed mb-8">
                        <?php echo esc_html(get_the_excerpt()); ?>
                    </p>

                    <a href="<?php echo esc_url(get_permalink()); ?>" class="inline-flex items-center justify-center self-start px-8 py-3 text-base font-semibold text-white bg-blue-800 rounded-full hover:bg-blue-900 transition-colors duration-200">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>
