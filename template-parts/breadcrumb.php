<?php
/**
 * Template part for displaying breadcrumbs
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

// Don't show breadcrumbs on the front page
if (is_front_page()) {
    return;
}

$separator = '<svg class="w-4 h-4 mx-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
</svg>';

$breadcrumb_items = [];

// Always add Home
$breadcrumb_items[] = [
    'url'   => home_url('/'),
    'title' => 'Home',
    'is_current' => false,
];

// Build ancestor chain for pages
if (is_page()) {
    $ancestors = get_post_ancestors(get_the_ID());
    
    // get_post_ancestors returns IDs from immediate parent to oldest ancestor,
    // so we reverse to go from oldest to immediate parent
    $ancestors = array_reverse($ancestors);
    
    foreach ($ancestors as $ancestor_id) {
        $breadcrumb_items[] = [
            'url'        => get_permalink($ancestor_id),
            'title'      => get_the_title($ancestor_id),
            'is_current' => false,
        ];
    }
    
    // Add current page
    $breadcrumb_items[] = [
        'url'        => '',
        'title'      => get_the_title(),
        'is_current' => true,
    ];
} elseif (is_single()) {
    // For single posts, optionally link to blog home or a custom post type archive
    $post_type = get_post_type();
    
    if ($post_type === 'post') {
        $posts_page_id = get_option('page_for_posts');
        if ($posts_page_id) {
            $breadcrumb_items[] = [
                'url'        => get_permalink($posts_page_id),
                'title'      => get_the_title($posts_page_id),
                'is_current' => false,
            ];
        } else {
            $breadcrumb_items[] = [
                'url'        => home_url('/'),
                'title'      => 'Blog',
                'is_current' => false,
            ];
        }
    } else {
        $post_type_object = get_post_type_object($post_type);
        if ($post_type_object && $post_type_object->has_archive) {
            $breadcrumb_items[] = [
                'url'        => get_post_type_archive_link($post_type),
                'title'      => $post_type_object->labels->name,
                'is_current' => false,
            ];
        }
    }
    
    $breadcrumb_items[] = [
        'url'        => '',
        'title'      => get_the_title(),
        'is_current' => true,
    ];
} elseif (is_category() || is_tag() || is_tax()) {
    $term = get_queried_object();
    
    if ($term && !is_wp_error($term)) {
        $taxonomy = get_taxonomy($term->taxonomy);
        if ($taxonomy && $taxonomy->object_type) {
            $post_type = $taxonomy->object_type[0];
            $post_type_object = get_post_type_object($post_type);
            if ($post_type_object && $post_type_object->has_archive) {
                $breadcrumb_items[] = [
                    'url'        => get_post_type_archive_link($post_type),
                    'title'      => $post_type_object->labels->name,
                    'is_current' => false,
                ];
            }
        }
        
        $breadcrumb_items[] = [
            'url'        => '',
            'title'      => $term->name,
            'is_current' => true,
        ];
    }
} elseif (is_archive()) {
    $title = get_the_archive_title();
    // Strip default prefixes like "Category: ", "Tag: "
    $title = preg_replace('/^\w+:\s*/', '', $title);
    
    $breadcrumb_items[] = [
        'url'        => '',
        'title'      => $title,
        'is_current' => true,
    ];
} elseif (is_search()) {
    $breadcrumb_items[] = [
        'url'        => '',
        'title'      => 'Search Results',
        'is_current' => true,
    ];
} elseif (is_404()) {
    $breadcrumb_items[] = [
        'url'        => '',
        'title'      => 'Page Not Found',
        'is_current' => true,
    ];
}

// Allow filtering of breadcrumb items
$breadcrumb_items = apply_filters('accessibility_partners_breadcrumb_items', $breadcrumb_items);

if (empty($breadcrumb_items) || count($breadcrumb_items) < 2) {
    return;
}
?>

<nav aria-label="Breadcrumb" class="mb-6">
    <ol class="flex flex-wrap items-center text-sm text-gray-500">
        <?php foreach ($breadcrumb_items as $index => $item) : ?>
            <li class="flex items-center <?php echo $item['is_current'] ? '' : ''; ?>">
                <?php if ($item['is_current']) : ?>
                    <span class="font-medium text-[#1B1B1B]" aria-current="page">
                        <?php echo esc_html($item['title']); ?>
                    </span>
                <?php else : ?>
                    <a href="<?php echo esc_url($item['url']); ?>" class="hover:underline hover:text-[#1B1B1B] transition-colors">
                        <?php echo esc_html($item['title']); ?>
                    </a>
                    <?php echo $separator; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>
