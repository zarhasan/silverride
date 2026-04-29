<?php
/**
 * Template part for displaying the Grid Alt section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$link = $args['link'] ?? [];
$background_color = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta = $args['cta'] ?? [];

$grid_size = intval($args['grid_size'] ?? 3);
$item_count = count($items);

$rows = ceil($item_count / $grid_size);
$last_row_items = $item_count % $grid_size ?: $grid_size;
$has_partial_last_row = ($item_count % $grid_size !== 0);

$total_cols = $has_partial_last_row ? ($grid_size * $last_row_items) : $grid_size;

$bg_style = $background_color ? 'background-color: ' . esc_attr($background_color) . ';' : '';
$bg_class = $background_color ? 'py-8 sm:py-16' : 'bg-white';
?>

<section class="my-16 lg:my-24 <?php echo $bg_class; ?>" <?php echo $background_color ? 'style="' . $bg_style . '"' : ''; ?> data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="text-center mx-auto mb-12">
            <?php if ($title) : ?>
            <h2 class="text-3xl md:text-[2.5rem] font-semibold capitalize tracking-wide !leading-tight mb-6">
                <?php echo wp_kses_post($title); ?>
            </h2>
            <?php endif; ?>
            
            <?php if ($description) : ?>
            <div class="text-lg leading-relaxed">
                <?php echo wp_kses_post($description); ?>
            </div>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($items)) : ?>
        <div class="flex flex-col lg:grid gap-6 lg:gap-8" style="grid-template-columns: repeat(<?php echo $total_cols; ?>, minmax(0, 1fr));">
            <?php foreach ($items as $index => $item) : 
                $image = $item['image'] ?? [];
                $item_title = $item['title'] ?? '';
                $item_description = $item['description'] ?? [];
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
            <div class="border-2 rounded-lg p-6 border-primary" style="grid-column: span <?php echo $span; ?>;">
                <div class="flex items-start">
                    <?php if (!empty($image['url'])) : ?>
                    <div class="w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 mr-4" style="background-color: var(--theme-primary);">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $item_title); ?>" class="w-full h-auto object-contain">
                    </div>
                    <?php endif; ?>
                    <?php if ($item_title) : ?>
                        <?php if ($has_link) : ?>
                            <?php if(empty($item_description)) : ?>
                                <p class="text-2xl font-semibold text-[#1B1B1B] pt-2 mb-2">
                                    <a href="<?php echo esc_url($item_link['url']); ?>" class="hover:underline">
                                        <?php echo esc_html($item_title); ?>
                                    </a>
                                </p>
                            <?php else : ?>
                                <h3 class="text-2xl font-semibold text-[#1B1B1B] pt-2">
                                    <a href="<?php echo esc_url($item_link['url']); ?>" class="hover:underline">
                                        <?php echo esc_html($item_title); ?>
                                    </a>
                                </h3>
                            <?php endif; ?>
                        <?php else : ?>
                            <?php if(empty($item_description)) : ?>
                                <p class="text-2xl font-semibold text-[#1B1B1B] pt-2 mb-2"><?php echo esc_html($item_title); ?></p>
                            <?php else : ?>
                                <h3 class="text-2xl font-semibold text-[#1B1B1B] pt-2"><?php echo esc_html($item_title); ?></h3>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <?php if (!empty($item_description)) : ?>
                    <div class="prose text-lg leading-relaxed mt-4">
                        <?php echo wp_kses_post($item_description); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
        <?php if (!empty($link) && !empty($link['url'])) : ?>
        <div class="text-center">
            <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                <?php echo esc_html($link['title'] ?? 'Learn More'); ?>
            </a>
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
