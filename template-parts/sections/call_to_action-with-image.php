<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? [];
$links = $args['links'] ?? [];
?>

<section class="bg-blue-900 py-20 md:py-28" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 text-center">
        <?php if (!empty($image) && !empty($image['url'])) : ?>
            <div class="mb-10 md:mb-12">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full max-w-xs mx-auto h-auto object-contain">
            </div>
        <?php endif; ?>

        <?php if (!empty($title)) : ?>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-8">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($description)) : ?>
            <p class="text-lg md:text-xl text-blue-100 leading-relaxed max-w-3xl mx-auto mb-10">
                <?php echo wp_kses_post($description); ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($links) && isset($links[0]['link'])) :
            $link = $links[0]['link'];
        ?>
            <a href="<?php echo esc_url($link['url'] ?? '/'); ?>" class="inline-flex items-center justify-center px-10 py-4 text-lg font-semibold text-blue-900 bg-white rounded-full hover:bg-blue-50 transition-colors duration-200">
                <?php echo esc_html($link['title'] ?? 'Go Home'); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
