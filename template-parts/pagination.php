<?php

if (!defined('ABSPATH')) {
    exit;
}

$custom_query = $args['query'] ?? null;

if ($custom_query instanceof WP_Query) {
    $total_pages = $custom_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));
} else {
    global $wp_query;
    $total_pages = $wp_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));
}

if ($total_pages <= 1) {
    return;
}

$big = 999999999;

$prev_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>';
$next_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>';

$paginate_args = [
    'base'         => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format'       => '?paged=%#%',
    'total'        => $total_pages,
    'current'      => $current_page,
    'show_all'     => false,
    'end_size'     => 1,
    'mid_size'     => 2,
    'prev_next'    => true,
    'prev_text'    => $prev_svg . '<span class="sr-only">' . __('Previous', 'silverride') . '</span>',
    'next_text'    => '<span class="sr-only">' . __('Next', 'silverride') . '</span>' . $next_svg,
    'type'         => 'list',
    'add_args'     => false,
    'aria_current' => 'page',
];

?>

<nav aria-label="Pagination" class="amwordpress_pagination">
    <?php echo paginate_links($paginate_args); ?>
</nav>