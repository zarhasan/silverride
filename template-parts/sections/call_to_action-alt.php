<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$link = $args['link'] ?? [];
$secondary_link = $args['secondary_link'] ?? [];
?>

<section class="bg-primary py-20 lg:py-28" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 text-center">
        <?php if ($title) : ?>
        <h2 class="text-3xl lg:text-[2.875rem] font-bold text-white leading-tight mb-6">
            <?php echo esc_html($title); ?>
        </h2>
        <?php endif; ?>

        <?php if ($description) : ?>
        <div class="text-lg md:text-xl text-blue-100 mb-10 max-w-3xl mx-auto">
            <?php echo wp_kses_post($description); ?>
        </div>
        <?php endif; ?>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
            <?php if (!empty($link) && !empty($link['url'])) : ?>
                <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
                    <?php echo esc_html($link['title'] ?? ''); ?>
                </a>
            <?php endif; ?>
            <?php if (!empty($secondary_link) && !empty($secondary_link['url'])) : ?>
                <a href="<?php echo esc_url($secondary_link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
                    <?php echo esc_html($secondary_link['title'] ?? ''); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
