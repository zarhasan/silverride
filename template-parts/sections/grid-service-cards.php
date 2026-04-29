<?php
/**
 * Template part for displaying the Grid Basic section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$grid_size = intval($args['grid_size'] ?? 3);
$items = $args['items'] ?? [];
$background_color = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta = $args['cta'] ?? [];

$item_count = count($items);

// Calculate LCM-based grid for dynamic layouts
$rows = ceil($item_count / $grid_size);
$last_row_items = $item_count % $grid_size ?: $grid_size;
$has_partial_last_row = ($item_count % $grid_size !== 0);

// Use grid_size * last_row_items as total columns for flexible distribution
$total_cols = $has_partial_last_row ? ($grid_size * $last_row_items) : $grid_size;

$bg_style = $background_color ? 'background-color: ' . esc_attr($background_color) . ';' : '';
$bg_class = $background_color ? 'py-8 sm:py-16' : 'bg-white';

$container = [
    'full' => 'container',
    'small' => 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8',
];
$container_class = $container[$args['container'] ?? 'full'] ?? $container['full'];
?>

<section class="my-16 md:my-24 <?php echo $bg_class; ?>" <?php echo $background_color ? 'style="' . $bg_style . '"' : ''; ?> data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="<?php echo esc_attr($container_class); ?>">
        <?php if ($title || $description) : ?>
        <div class="w-full text-center mb-12 md:mb-16">
            <?php if ($title) : ?>
                <h2 class="text-3xl md:text-[2.5rem] font-semibold !leading-tight text-[#1B1B1B] mb-4"><?php echo wp_kses_post($title); ?></h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="prose text-lg text-[#1B1B1B] mx-auto leading-relaxed mt-8">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
        <div class="flex flex-col lg:grid gap-12 md:gap-16" style="grid-template-columns: repeat(<?php echo $total_cols; ?>, minmax(0, 1fr));">
            <?php foreach ($items as $index => $item) : 
                $item_image = $item['image'] ?? [];
                $item_title = $item['title'] ?? '';
                $item_description = $item['description'] ?? '';
                $item_link = $item['link'] ?? [];
                $has_link = !empty($item_link) && !empty($item_link['url']);
                
                $current_row = floor($index / $grid_size) + 1;
                $is_last_row = ($current_row == $rows);
                
                if ($is_last_row && $has_partial_last_row) {
                    $span = $total_cols / $last_row_items;
                } else {
                    $span = $total_cols / $grid_size;
                }
            ?>
            <div class="text-left bg-transparent" style="grid-column: span <?php echo $span; ?>;">
                <div class="flex justify-start items-center mb-6 gap-6">
                    <?php if (!empty($item_image) && !empty($item_image['url'])) : ?>
                        <div class="w-16 h-16 shrink-0 rounded-full flex items-center justify-center" style="background-color: var(--theme-primary);">
                            <img src="<?php echo esc_url($item_image['url']); ?>" alt="" class="w-full h-auto">
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($item_title) : ?>
                        <?php if ($has_link) : ?>
                            <h3 class="text-2xl font-semibold text-[#1B1B1B]">
                                <a href="<?php echo esc_url($item_link['url']); ?>" class="hover:underline">
                                    <?php echo esc_html($item_title); ?>
                                </a>
                            </h3>
                        <?php else : ?>
                            <h3 class="text-2xl font-semibold text-[#1B1B1B]"><?php echo esc_html($item_title); ?></h3>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                
                <?php if ($item_description) : ?>
                    <div class="prose text-lg leading-relaxed">
                        <?php echo wp_kses_post($item_description); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($item_link['title'])) : ?>
                    <a href="<?php echo esc_url($item_link['url']); ?>" class="text-lg inline-flex items-center justify-center px-6 py-2 mt-6 text-white rounded-full transition-colors duration-200 border-2 border-primary bg-primary hover:bg-transparent hover:text-primary">
                        <?php echo esc_html($item_link['title'] ?? 'Learn More'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($footer_description)) : ?>
        <div class="w-full text-center mx-auto mt-12">
            <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                <?php echo wp_kses_post($footer_description); ?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
        <div class="text-center mt-8">
            <a href="<?php echo esc_url($cta['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>