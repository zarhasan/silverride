<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

?>

<?php 
    $links = $args['links'] ?? [];
    $grid_size = intval($args['grid_size'] ?? 4);
    
    $item_count = count($links);
    
    $rows = ceil($item_count / $grid_size);
    $last_row_items = $item_count % $grid_size ?: $grid_size;
    $has_partial_last_row = ($item_count % $grid_size !== 0);
    
    $total_cols = $has_partial_last_row ? ($grid_size * $last_row_items) : $grid_size;
?>

<?php if (!empty($links)) : ?>
    <div class="container -my-8 lg:-my-12" data-section-id="<?php echo esc_attr($template_part_name); ?>">
        <div class="py-6 lg:py-8 rounded-lg" style="background-color: var(--theme-primary);">
            <div class="flex flex-col lg:grid gap-4 lg:gap-0 lg:divide-x lg:divide-white/30" style="grid-template-columns: repeat(<?php echo $total_cols; ?>, minmax(0, 1fr));">
                <?php foreach ($links as $index => $link_item) : 
                    $link_data = is_array($link_item) && isset($link_item['link']) ? $link_item['link'] : $link_item;
                    $link_title = is_array($link_data) ? ($link_data['title'] ?? '') : $link_data;
                    $link_url = is_array($link_data) ? ($link_data['url'] ?? '#') : '#';
                    
                    $current_row = floor($index / $grid_size) + 1;
                    $is_last_row = ($current_row == $rows);
                    
                    if ($is_last_row && $has_partial_last_row) {
                        $span = $total_cols / $last_row_items;
                    } else {
                        $span = $total_cols / $grid_size;
                    }
                ?>
                <a href="<?php echo esc_url($link_url); ?>" class="flex items-center justify-center text-white text-base lg:text-lg underline underline-offset-4 hover:no-underline transition-all duration-200 py-2 lg:py-0 px-4 text-center" style="grid-column: span <?php echo $span; ?>;">
                    <?php echo esc_html($link_title); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>