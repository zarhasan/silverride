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

<section class="bg-orange-400 py-20 lg:py-28" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 text-center">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
            <?php echo esc_html($title); ?>
        </h2>

        <p class="text-lg md:text-xl text-white/90 mb-10">
            <?php echo wp_kses_post($description); ?>
        </p>

        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="inline-flex items-center justify-center px-10 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-orange-400 transition-colors duration-200">
            <?php echo esc_html($link_title); ?>
        </a>
    </div>
</section>
