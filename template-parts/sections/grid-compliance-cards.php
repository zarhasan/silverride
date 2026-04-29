<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$template_part_name = explode('.', basename(__FILE__))[0];

$query_args = [
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'tax_query'      => [
        [
            'taxonomy' => 'page-type',   // your taxonomy name
            'field'    => 'slug',        // can also be 'term_id' or 'name'
            'terms'    => 'compliance',     // the term you want
        ],
    ],
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
];

$service_query = new WP_Query($query_args);
$service_pages = $service_query->have_posts() ? $service_query->posts : [];

$categories = [
    [
        'slug' => 'all',
        'name' => 'All',
    ],
];

$existing_slugs = array_column($categories, 'slug');

foreach ($service_pages as $page) {
    $terms = get_the_terms($page->ID, 'page-type'); // fetch taxonomy terms

    if (empty($terms) || is_wp_error($terms)) {
        continue;
    }

    foreach ($terms as $term) {
        // skip the main "service" term
        if ($term->slug === 'service') {
            continue;
        }

        if (!in_array($term->slug, $existing_slugs, true)) {
            $categories[] = [
                'slug' => $term->slug,
                'name' => $term->name,
            ];
            $existing_slugs[] = $term->slug;
        }
    }
}

// free query
wp_reset_postdata();

?>

<section
    id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" 
    class="my-16 sm:my-24"
    data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container flex justify-between items-start lg:items-center flex-col gap-4 lg:gap-0 lg:flex-row">
        <div class="max-w-2xl">
            <?php if(!empty($args['subtitle'])): ?>
                <p class="text-lg uppercase text-primary font-semibold mt-4">
                    <?php echo $args['subtitle']; ?>
                </p>
            <?php endif; ?>
            
            <?php if(!empty($args['title'])): ?>
                <h2 class="sr-only"><?php echo wp_kses_post(strip_tags($args['title'])); ?></h2>
                <h2 aria-hidden="true" class="text-4xl lg:text-[2.5rem] font-semibold">
                    <?php echo $args['title']; ?>
                </h2>
            <?php endif; ?>

            <?php if(!empty($args['description'])): ?>
                <p class="mt-4">
                    <?php echo $args['description']; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="container mt-16">
        <div class="flex flex-col lg:grid lg:grid-cols-3 gap-8">
            <?php foreach ($service_pages as $index => $page): ?>
                <?php
                    $service = [
                        'ID' => $page->ID,
                        'title' => get_the_title($page->ID),
                        'description' => wp_trim_words( get_post_field('post_content', $page->ID), 20, '...' ),
                        'image' => [
                            'url' => get_the_post_thumbnail_url($page->ID, 'large') ? get_the_post_thumbnail_url($page->ID, 'large') : '',
                        ],
                        'link' => get_permalink($page->ID),
                    ];
                ?>
                <?php get_template_part('template-parts/service-card', null, array('service' => $service, 'index' => $index)); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>