<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? [];
?>

<section class="bg-white mt-12 mb-8 md:mt-16 md:mb-12" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container text-center">
        <?php if (!empty($title)) : ?>
            <h1 class="text-4xl lg:text-[2.875rem] font-bold text-gray-900 mb-4 md:mb-6">
                <?php echo wp_kses_post($title); ?>
            </h1>
        <?php endif; ?>

        <?php if (!empty($description)) : ?>
            <div class="prose text-lg text-gray-700 mb-8 md:mb-12">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($image) && !empty($image['url'])) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full h-[30rem] object-cover">
        <?php endif; ?>
    </div>
</section>
