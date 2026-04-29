<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$link = $args['link'] ?? [];
$media_type = $args['media_type'] ?? 'image';
$image = $args['image'] ?? [];
$video = $args['video'] ?? [];

$link_url = !empty($link['url']) ? $link['url'] : '#';
$link_title = !empty($link['title']) ? $link['title'] : '';
$link_target = !empty($link['target']) ? $link['target'] : '_self';
?>

<!-- CTA Banner -->
<div class="container my-16 md:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="rounded-2xl p-8 lg:p-12" style="background-color: var(--theme-primary);">
        <div class="flex flex-col lg:flex-row lg:items-center justify-start lg:justify-between gap-6">
            <div class="text-white">
                <h2 class="text-2xl md:text-[2rem] font-semibold text-white">
                    <?php echo esc_html($title); ?>
                </h2>
                <div class="prose text-lg text-white/90 mt-4">
                    <?php echo wp_kses_post($description); ?>
                </div>
            </div>
          
            <?php if (!empty($link['url'])) : ?>
                <a href="<?php echo esc_url($link_url); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg font-normal rounded-full transition-colors duration-200 bg-white flex-shrink-0" style="color: var(--theme-primary);" target="<?php echo esc_attr($link_target); ?>">
                    <?php echo esc_html($link_title); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
