<?php
/**
 * The template for displaying all single team member posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Accessibility_Partners
 */

get_header(); 

$photo = get_field('photo');
$job_title = get_field('job_title');
$bio = get_field('bio');
$linkedin = get_field('linkedin');
$connected_user_id = get_field('connected_user');

$fallback_image = get_template_directory_uri() . '/src/screenshots/profile.png';
$display_photo = !empty($photo['url']) ? $photo['url'] : $fallback_image;
?>

<section class="mt-20 mb-16 md:mb-24 md:mt-32 bg-white">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
            <!-- Portrait Column -->
            <div class="order-1 col-span-1 flex justify-center md:justify-start">
                <div class="max-w-md mx-auto md:mx-0">
                    <?php if (!empty($photo['url'])): ?>
                        <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto rounded-lg">
                    <?php else: ?>
                        <img src="<?php echo esc_url($fallback_image); ?>" alt="<?php the_title_attribute(); ?> portrait" class="w-full h-auto rounded-lg">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Content Column -->
            <div class="col-span-2 order-2">
                <h1 class="text-4xl md:text-[2.5rem] font-semibold text-[#1B1B1B] mb-4"><?php the_title(); ?></h1>
                
                <?php if ($job_title): ?>
                    <p class="text-lg font-semibold mb-6" style="color: var(--theme-primary);"><?php echo esc_html($job_title); ?></p>
                <?php endif; ?>

                <?php if ($bio): ?>
                    <div class="prose prose-lg max-w-none">
                        <?php echo wp_kses_post($bio); ?>
                    </div>
                <?php else: ?>
                    <div class="prose prose-lg max-w-none">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>

                <?php if ($linkedin): ?>
                    <div class="mt-8">
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center text-base text-[#0a66c2] font-semibold transition-colors">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24" aria-label="LinkedIn Profile">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php 
$blog_args = array(
    'title' => 'Latest News & Insights',
    'post_count' => 3,
);

if ($connected_user_id) {
    $user_posts_query = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'author' => $connected_user_id,
    ));

    $post_ids = array();
    if ($user_posts_query->have_posts()) {
        while ($user_posts_query->have_posts()) {
            $user_posts_query->the_post();
            $post_ids[] = get_the_ID();
        }
        wp_reset_postdata();
    }

    if (count($post_ids) < 3) {
        $others_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3 - count($post_ids),
            'post_status' => 'publish',
            'author__not_in' => array($connected_user_id),
            'post__not_in' => $post_ids,
        ));

        if ($others_query->have_posts()) {
            while ($others_query->have_posts()) {
                $others_query->the_post();
                $post_ids[] = get_the_ID();
            }
            wp_reset_postdata();
        }
    }

    if (!empty($post_ids)) {
        $blog_args['query'] = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'post_status' => 'publish',
            'post__in' => $post_ids,
            'orderby' => 'post__in',
        ));
    }
}

get_template_part('template-parts/sections/blog-default', '', $blog_args);
?>

<?php

get_template_part('template-parts/sections/contact');
?>

<?php get_footer(); ?>
