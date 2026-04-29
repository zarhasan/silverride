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
<div class="container text-center my-16 md:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <h2 class="text-3xl md:text-[2.5rem] font-semibold capitalize tracking-wide !leading-snug mb-6">
        <?php echo esc_html($title); ?>
    </h2>

    <?php if ($description) : ?>
        <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
            <?php echo wp_kses_post($description); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($link_title) && !empty($link_url)) : ?>
        <div class="text-center mt-8">
            <a href="<?php echo esc_url($link_url); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                <?php echo esc_html($link_title); ?>
            </a>
        </div>
    <?php endif; ?>
</div>
