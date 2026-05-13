<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$link = $args['link'] ?? [];
$secondary_link = $args['secondary_link'] ?? [];
$image = $args['image'] ?? [];
$image_position = $args['image_position'] ?? 'left';
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);
$is_image_left = $image_position === 'left';
$text_order = $is_image_left ? 'order-2' : 'order-1';
$image_order = $is_image_left ? 'order-1' : 'order-2';
?>

<section class="bg-white my-16 lg:my-24 <?php echo esc_attr($hide_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-20 items-start">
            <?php if (!empty($image) && !empty($image['url'])) : ?>
                <div class="flex-1 <?php echo $is_image_left ? 'order-1' : 'order-2'; ?> min-h-[24rem]">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? $title ); ?>" class="h-full w-full object-cover">
				</div>
            <?php endif; ?>

            <div class="<?php echo esc_attr($text_order); ?>">
                <?php if ($title) : ?>
                    <h2 class="text-3xl lg:text-[2.875rem] !leading-tight font-bold text-gray-900 mb-4">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($subtitle) : ?>
                    <h3 class="text-[1.625rem] md:text-2xl font-bold text-gray-900 mb-6">
                        <?php echo esc_html($subtitle); ?>
                    </h3>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-gray-700 leading-relaxed space-y-6 mb-10">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>

                <div class="flex flex-col lg:flex-row justify-center lg:justify-start items-stretch lg:items-center gap-4">
                    <?php if (!empty($link['title']) && !empty($link['url'])) : ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="btn btn-primary">
                            <?php echo esc_html($link['title'] ?? ''); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($secondary_link['title']) && !empty($secondary_link['url'])) : ?>
                        <a href="<?php echo esc_url($secondary_link['url']); ?>" class="btn btn-outline">
                            <?php echo esc_html($secondary_link['title'] ?? ''); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
