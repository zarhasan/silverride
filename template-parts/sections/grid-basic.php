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

$title              = $args['title']              ?? '';
$description        = $args['description']        ?? '';
$grid_size          = intval($args['grid_size']   ?? 3);
$items              = $args['items']              ?? [];
$background_color   = $args['background_color']   ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta                = $args['cta']                ?? [];

$bg_style = $background_color ? 'background-color: ' . esc_attr($background_color) . ';' : '';
$bg_class = $background_color ? 'py-8 sm:py-16' : 'bg-white';
?>

<section class="my-16 md:my-24 <?php echo esc_attr($bg_class); ?>" <?php echo $background_color ? 'style="' . esc_attr($bg_style) . '"' : ''; ?> data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="x-container">

        <?php if ($title || $description) : ?>
            <div class="text-center mb-12 md:mb-16">
                <?php if ($title) : ?>
                    <h2 class="text-3xl md:text-[2.875rem] font-bold text-gray-900 !leading-tight">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="mt-4 text-lg text-gray-600 !leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
            <div class="grid grid-cols-1 md:grid-cols-<?php echo esc_attr($grid_size); ?> gap-8 md:gap-10">
                <?php foreach ($items as $item) :
                    $item_image       = $item['image']       ?? [];
                    $item_title       = $item['title']       ?? '';
                    $item_description = $item['description'] ?? '';
                    $item_link        = $item['link']        ?? [];
                    $has_link         = !empty($item_link) && !empty($item_link['url']);
                ?>
                    <div class="flex flex-col items-center text-center">

                        <?php if (!empty($item_image) && !empty($item_image['url'])) : ?>
                            <div class="w-40 h-40 rounded-full bg-yellow-100 flex items-center justify-center mb-6">
                                <img src="<?php echo esc_url($item_image['url']); ?>"
                                     alt="<?php echo esc_attr($item_image['alt'] ?? ''); ?>"
                                     class="w-full h-auto object-contain"
                                     loading="lazy">
                            </div>
                        <?php endif; ?>

                        <?php if ($item_title) : ?>
                            <?php if ($has_link) : ?>
                                <h3 class="text-xl md:text-[1.625rem] !leading-tight font-bold text-gray-900 mb-4">
                                    <a href="<?php echo esc_url($item_link['url']); ?>" class="hover:underline">
                                        <?php echo esc_html($item_title); ?>
                                    </a>
                                </h3>
                            <?php else : ?>
                                <h3 class="text-xl md:text-[1.625rem] !leading-tight font-bold text-gray-900 mb-4">
                                    <?php echo esc_html($item_title); ?>
                                </h3>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if ($item_description) : ?>
                            <div class="prose !text-xl text-gray-600 !leading-relaxed mb-6 max-w-sm">
                                <?php echo wp_kses_post($item_description); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($has_link && !empty($item_link['title'])) : ?>
                            <a href="<?php echo esc_url($item_link['url']); ?>"
                               class="btn btn-primary mt-auto">
                                <?php echo esc_html($item_link['title']); ?>
                            </a>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($footer_description)) : ?>
            <div class="text-center mt-12 md:mt-16 max-w-3xl mx-auto">
                <div class="text-lg text-gray-600 leading-relaxed">
                    <?php echo wp_kses_post($footer_description); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
            <div class="text-center mt-8">
                <a href="<?php echo esc_url($cta['url']); ?>"
                   class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white bg-blue-800 rounded-full hover:bg-blue-900 transition-colors duration-200">
                    <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
