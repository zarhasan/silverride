<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title          = $args['title'] ?? '';
$subtitle       = $args['subtitle'] ?? '';
$description    = $args['description'] ?? '';
$link           = $args['link'] ?? [];
$secondary_link = $args['secondary_link'] ?? [];
$image          = $args['image'] ?? [];
$image_position = $args['image_position'] ?? 'right';
$background_color = $args['background_color'] ?? '';
$hide_on        = $args['hide_on'] ?? [];

$hide_classes = [];
if (in_array('mobile', $hide_on))  $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on))  $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);

$is_image_left = $image_position === 'left';
$text_order  = $is_image_left ? 'order-2' : 'order-1';
$image_order = $is_image_left ? 'order-1' : 'order-2';

$bg_style = '';
if (!empty($background_color)) {
    $bg_style = 'background-color: ' . esc_attr($background_color) . ';';
}

?>

<section class="information-tint bg-[#F0F5FF] py-16 lg:py-24 <?php echo esc_attr($hide_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>" style="<?php echo $bg_style; ?>">
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Text Content -->
            <div class="<?php echo esc_attr($text_order); ?>">
                <?php if ($subtitle) : ?>
                    <p class="text-lg font-semibold text-primary mb-3">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="text-3xl lg:text-4xl xl:text-[2.875rem] font-bold text-primary !leading-tight mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-primary leading-relaxed mb-8">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>

                <div class="flex flex-wrap gap-4">
                    <?php if (!empty($link['title']) && !empty($link['url'])) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo !empty($link['target']) ? esc_attr($link['target']) : '_self'; ?>" class="btn btn-outline">
                            <?php echo esc_html($link['title']); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($secondary_link['title']) && !empty($secondary_link['url'])) : ?>
                        <a href="<?php echo esc_url($secondary_link['url']); ?>" target="<?php echo !empty($secondary_link['target']) ? esc_attr($secondary_link['target']) : '_self'; ?>" class="btn btn-primary">
                            <?php echo esc_html($secondary_link['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Image -->
            <?php if (!empty($image) && !empty($image['url'])) : ?>
                <div class="flex justify-center <?php echo esc_attr($image_order); ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full max-w-lg h-auto object-contain">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
