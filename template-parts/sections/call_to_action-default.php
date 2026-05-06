<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Still have questions?';
$description = $args['description'] ?? 'Get in touch with us';
$link = $args['link'] ?? [];

$link_url = !empty($link['url']) ? $link['url'] : '/contact-us';
$link_title = !empty($link['title']) ? $link['title'] : 'Contact now';
$link_target = !empty($link['target']) ? $link['target'] : '_self';
?>

<section class="bg-secondary py-20 lg:py-28" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 text-center">
        <?php if (!empty($title)) : ?>
            <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] !leading-tight font-bold text-white">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($description)) : ?>
            <div class="text-lg md:text-xl text-white/90 mt-8">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($link_url) && !empty($link_title)) : ?>
            <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="inline-flex items-center justify-center px-10 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-secondary transition-colors mt-8 duration-200">
                <?php echo esc_html($link_title); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
