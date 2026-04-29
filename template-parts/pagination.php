<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

if(!$wp_query) {
    global $wp_query;
}

?>

<nav aria-label="Pagination" class="amwordpress_pagination">
    <?php
        $args = [
            'base'		=> str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'		=> $wp_query->max_num_pages,
            'current'	=> max(1, get_query_var('paged')),
            'format'	=> '?paged=%#%',
            'show_all'	=> false,
            'type'		=> 'list',
            'end_size'	=> 0,
            'mid_size'	=> 2,
            'prev_next' => true,
            'prev_text'	=> '<i class="fa-solid fa-chevron-left"></i><span class="sr-only">'.__('Previous', 'amwordpress').'</span>',
            'next_text'	=> '<span class="sr-only">'.__('Next', 'amwordpress').'</span><i class="fa-solid fa-chevron-right"></i>',
            'add_args'	=> false,
            'add_fragment' => '',
            'aria_current' => "page",
        ];

        echo paginate_links($args);
    ?>
</nav>