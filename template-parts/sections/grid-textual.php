<?php
/**
 * Template part for displaying the Grid Textual section
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
$grid_size          = intval($args['grid_size'] ?? 3);
$items              = $args['items'] ?? [];
$background_color   = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta                = $args['cta'] ?? [];

$bg_style = $background_color ? 'background-color: ' . esc_attr($background_color) . ';' : '';
$bg_class = $background_color ? '' : 'bg-white';

$grid_size_classes = [
    2 => 'md:grid-cols-2',
    3 => 'md:grid-cols-3',
    4 => 'md:grid-cols-4',
    5 => 'md:grid-cols-5',
];
$grid_class = $grid_size_classes[$grid_size] ?? $grid_size_classes[3];
?>

<section
    id="<?php echo !empty($args['id']) ? $args['id'] : ''; ?>"
    class="grid-textual my-16 md:my-24 <?php echo esc_attr($bg_class); ?>"
    <?php echo $bg_style ? 'style="' . $bg_style . '"' : ''; ?>
    data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">

        <?php if ($title || $subtitle || $description) : ?>
            <div class="text-center mb-8 md:mb-12 max-w-4xl mx-auto">
                <?php if ($title) : ?>
                    <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-[#1B1B1B] mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($subtitle) : ?>
                    <p class="text-xl md:text-2xl font-semibold text-[#1B1B1B]">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-[#1B1B1B] leading-relaxed mt-4">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
            <div class="grid grid-cols-1 <?php echo esc_attr($grid_class); ?> gap-6 lg:gap-8">
                <?php foreach ($items as $item) :
                    $item_image       = $item['image'] ?? [];
                    $item_title       = $item['title'] ?? '';
                    $item_subtitle    = $item['subtitle'] ?? '';
                    $item_description = $item['description'] ?? '';
                    $item_link        = $item['link'] ?? [];
                    $has_link         = !empty($item_link['url']);
                ?>
                    <?php if ($has_link) : ?>
                        <a href="<?php echo esc_url($item_link['url']); ?>"
                           target="<?php echo !empty($item_link['target']) ? esc_attr($item_link['target']) : '_self'; ?>"
                           class="grid-textual__card group block text-center bg-[#98D1E6] rounded-2xl p-8 flex flex-col justify-center items-center min-h-[200px] transition-transform duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <?php else : ?>
                        <div class="grid-textual__card text-center bg-[#98D1E6] rounded-2xl p-8 flex flex-col justify-center items-center min-h-[200px]">
                    <?php endif; ?>

                        <?php if (!empty($item_image) && !empty($item_image['url'])) : ?>
                            <img
                                src="<?php echo esc_url($item_image['url']); ?>"
                                alt="<?php echo esc_attr($item_image['alt'] ?? ''); ?>"
                                class="w-16 h-16 object-contain mb-4"
                            >
                        <?php endif; ?>

                        <?php if ($item_title) : ?>
                            <h3 class="text-xl font-semibold text-[#1B1B1B] leading-snug">
                                <?php echo esc_html($item_title); ?>
                                <?php if ($item_description) : ?>
                                    <span class="font-normal"> – <?php echo esc_html(strip_tags($item_description)); ?></span>
                                <?php endif; ?>
                            </h3>
                        <?php elseif ($item_description) : ?>
                            <div class="text-xl text-[#1B1B1B] leading-snug">
                                <?php echo wp_kses_post($item_description); ?>
                            </div>
                        <?php endif; ?>

                    <?php if ($has_link) : ?>
                        </a>
                    <?php else : ?>
                        </div>
                    <?php endif; ?>
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
