<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$count = $args['count'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? [];
$image_position = $args['image_position'] ?? 'right';
$background_color = $args['background_color'] ?? '';
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);
$is_image_left = $image_position === 'left';
$text_order = $is_image_left ? 'order-2' : 'order-1';
$image_order = $is_image_left ? 'order-1' : 'order-2';
$bg_style = '';
if (!empty($background_color)) {
    $bg_style = 'background-color: ' . esc_attr($background_color) . ';';
}
$bg_class = !empty($background_color) ? 'py-16 lg:py-24 my-16 md:my-24' : 'bg-white my-16 md:my-24';
?>

<section class="<?php echo esc_attr($bg_class); ?> <?php echo esc_attr($hide_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>" style="<?php echo $bg_style; ?>">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="<?php echo esc_attr($text_order); ?>">
                <?php if ($count) : ?>
                    <span class="block text-[40px] font-bold text-[#F8952D] leading-none mb-5">
                        <?php echo esc_html($count); ?>
                    </span>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="text-[40px] font-bold text-[#254196] leading-snug mb-6">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-[#404040] leading-relaxed space-y-4">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($image) && !empty($image['url'])) : ?>
                <div class="<?php echo esc_attr($image_order); ?>">
                    <div class="bg-[#F8F8F8] pt-3.5">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $title); ?>" class="aspect-[392/321] w-full object-cover">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
