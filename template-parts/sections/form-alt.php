<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$shortcode = $args['shortcode'] ?? '';

?>

<section id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" class="bg-primary py-16 md:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="max-w-5xl mx-auto bg-white shadow-xl p-8 lg:p-12 rounded-lg">
        <?php if (!empty($shortcode)) : ?>
            <?php if (!empty($title)) : ?>
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-6">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($description)) : ?>
                <div class="prose text-lg leading-relaxed text-center max-w-5xl mx-auto mb-10">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>

            <p class="text-sm text-gray-500 mb-6">
                Fields marked with asterisk (<span class="text-primary">*</span>) are mandatory.
            </p>

            <?php echo do_shortcode($shortcode); ?>
        <?php endif; ?>
    </div>
</section>
