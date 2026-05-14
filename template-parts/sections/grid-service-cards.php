<?php
/**
 * Template part for displaying the Grid Service Cards section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title              = $args['title'] ?? '';
$subtitle           = $args['subtitle'] ?? '';
$description        = $args['description'] ?? '';
$grid_size          = intval($args['grid_size'] ?? 2);
$items              = $args['items'] ?? [];
$background_color   = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta                = $args['cta'] ?? [];
$container          = $args['container'] ?? 'full';

$bg_style = $background_color ? 'background-color: ' . esc_attr($background_color) . ';' : '';
$bg_class = $background_color ? 'py-16 md:py-24' : 'bg-white';

$container_classes = [
    'full'  => 'container mx-auto px-4 md:px-6 lg:px-8',
    'small' => 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8',
];
$container_class = $container_classes[$container] ?? $container_classes['full'];

$grid_size_classes = [
    2 => 'lg:grid-cols-2',
    3 => 'lg:grid-cols-3',
    4 => 'lg:grid-cols-4',
    5 => 'lg:grid-cols-5',
];
$grid_class = $grid_size_classes[$grid_size] ?? $grid_size_classes[2];
?>

<section
    id="<?php echo !empty($args['id']) ? $args['id'] : ''; ?>"
    class="grid-service-cards my-16 md:my-24 <?php echo esc_attr($bg_class); ?>"
    <?php echo $bg_style ? 'style="' . $bg_style . '"' : ''; ?>
    data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="<?php echo esc_attr($container_class); ?>">

        <?php if ($title || $subtitle || $description) : ?>
            <div class="text-center mb-12 md:mb-16 max-w-4xl mx-auto">
                <?php if ($title) : ?>
                    <h2 class="text-3xl md:text-4xl font-bold text-[#1B1B1B] mb-4">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($subtitle) : ?>
                    <p class="text-xl md:text-2xl font-semibold text-[#1B1B1B] mb-4">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-gray-700 leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
            <div class="grid grid-cols-1 <?php echo esc_attr($grid_class); ?> gap-12 lg:gap-16">
                <?php foreach ($items as $item) :
                    $item_image       = $item['image'] ?? [];
                    $item_title       = $item['title'] ?? '';
                    $item_description = $item['description'] ?? '';
                    $item_link        = $item['link'] ?? [];
                    $has_link         = !empty($item_link['url']);
                ?>
                    <div class="grid-service-cards__item flex gap-6">
                        <?php if (!empty($item_image) && !empty($item_image['url'])) : ?>
                            <div class="shrink-0 w-24 h-24 md:w-40 md:h-40">
                                <img
                                    src="<?php echo esc_url($item_image['url']); ?>"
                                    alt="<?php echo esc_attr($item_image['alt'] ?? ''); ?>"
                                    class="w-full h-full object-contain"
                                >
                            </div>
                        <?php endif; ?>

                        <div class="flex-1 min-w-0">
                            <?php if ($item_title) : ?>
                                <h3 class="text-xl md:text-2xl font-bold text-[#1B1B1B] mb-3">
                                    <?php echo esc_html($item_title); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if ($item_description) : ?>
                                <div class="prose text-base text-gray-700 leading-relaxed mb-5">
                                    <?php echo wp_kses_post($item_description); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($has_link) : ?>
                                <a
                                    href="<?php echo esc_url($item_link['url']); ?>"
                                    target="<?php echo !empty($item_link['target']) ? esc_attr($item_link['target']) : '_self'; ?>"
                                    class="inline-flex items-center justify-center px-6 py-3 text-base font-semibold text-primary border-2 border-primary rounded-full transition-colors duration-200 hover:bg-primary hover:text-white"
                                >
                                    <?php echo esc_html($item_link['title'] ?? 'Learn More'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($footer_description)) : ?>
            <div class="text-center mx-auto mt-12 max-w-3xl">
                <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                    <?php echo wp_kses_post($footer_description); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
            <div class="text-center mt-8">
                <a href="<?php echo esc_url($cta['url']); ?>" target="<?php echo !empty($cta['target']) ? esc_attr($cta['target']) : '_self'; ?>" class="btn btn--primary">
                    <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
