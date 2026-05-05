<?php
/**
 * Blog Tint Section Template
 */
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$post_count = intval($args['post_count'] ?? 3);
$category = $args['category'] ?? 0;
$link = $args['link'] ?? [];

$query_args = array(
    'post_type'      => 'post',
    'posts_per_page' => $post_count,
    'post_status'    => 'publish',
);

if (!empty($category)) {
    $query_args['cat'] = $category;
}

$posts = new WP_Query($query_args);
?>

<section class="bg-[#F6F9FF] py-16 md:py-24">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="text-center text-3xl font-bold text-black lg:text-5xl">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <?php if ($description) : ?>
            <div class="text-center text-lg font-normal mt-5 text-black lg:text-[1.25rem]">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if ($posts->have_posts()) : ?>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                <?php while ($posts->have_posts()) : $posts->the_post();
                    $post_image    = has_post_thumbnail() ? array('url' => get_the_post_thumbnail_url(get_the_ID(), 'medium_large'), 'alt' => get_the_title()) : [];
                    $post_category = get_the_category();
                    $post_cat_name = !empty($post_category) ? $post_category[0]->name : '';
                    $post_date     = get_the_date('M j, Y');
                    $post_title    = get_the_title();
                    $post_excerpt  = get_the_excerpt();
                ?>
                <article class="flex flex-col justify-start">
                    <?php if (!empty($post_image)) : ?>
                    <div class="overflow-hidden rounded-lg">
                        <img
                            src="<?php echo esc_url($post_image['url']); ?>"
                            alt="<?php echo esc_attr($post_image['alt'] ?? $post_title); ?>"
                            class="aspect-square w-full object-cover transition-transform duration-300 hover:scale-105 h-96"
                            loading="lazy"
                        >
                    </div>
                    <?php endif; ?>

                    <div class="mt-5 flex items-center gap-2 text-sm text-gray-500">
                        <?php if (!empty($post_cat_name)) : ?>
                        <span class="capitalize text-primary"><?php echo esc_html($post_cat_name); ?></span>
                        <span class="text-gray-400">·</span>
                        <?php endif; ?>
                        <span><?php echo esc_html($post_date); ?></span>
                    </div>

                    <h3 class="mt-5 text-lg sm:text-[1.5rem] font-bold text-black leading-snug">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="hover:text-primary transition-colors">
                            <?php echo esc_html($post_title); ?>
                        </a>
                    </h3>

                    <?php if (!empty($post_excerpt)) : ?>
                        <p class="mt-5 text-base leading-relaxed text-gray-600">
                            <?php echo esc_html($post_excerpt); ?>
                        </p>
                    <?php endif; ?>

                    <a
                        href="<?php echo esc_url(get_permalink()); ?>"
                        class="btn btn-outline self-start mt-5"
                    >
                        Learn More
                    </a>
                </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p class="mt-12 text-center text-gray-600">No posts found.</p>
        <?php endif; ?>
    </div>
</section>
