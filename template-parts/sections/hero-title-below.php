<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$image = $args['image'] ?? [];
?>

<section class="bg-white mt-12 mb-8 md:mt-16 md:mb-12" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <?php if (!empty($image) && !empty($image['url'])) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full h-[30rem] object-cover">
        <?php endif; ?>

        <?php if (!empty($title)) : ?>
            <h1 class="text-4xl lg:text-[2.875rem] font-bold text-gray-900 mt-8 md:mt-12 !leading-tight">
                <?php echo wp_kses_post($title); ?>
            </h1>
        <?php endif; ?>
    </div>
</section>
