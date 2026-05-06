<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? [];
$link = $args['link'] ?? [];
?>

<section class="bg-primary pt-10 md:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 text-center">
        <?php if (!empty($image) && !empty($image['url'])) : ?>
            <div class="mb-3 md:mb-6">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full max-w-md mx-auto h-auto object-contain">
            </div>
        <?php endif; ?>

        <?php if (!empty($title)) : ?>
            <h2 class="text-4xl lg:text-[2.875rem] font-bold text-white !leading-tight mb-8">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($description)) : ?>
            <div class="text-lg md:text-xl text-blue-100 leading-relaxed max-w-3xl mx-auto mb-10">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($link) && !empty($link['url'])) : ?>
            <a href="<?php echo esc_url($link['url'] ?? '/'); ?>" class="inline-flex items-center justify-center px-10 py-4 text-lg font-semibold text-primary bg-white rounded-full hover:bg-blue-50 transition-colors duration-200">
                <?php echo esc_html($link['title'] ?? 'Go Home'); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
