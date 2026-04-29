<?php

if (!defined('ABSPATH')) {
    exit;
}

$shortcode = $args['shortcode'] ?? '';
$template_part_name = explode('.', basename(__FILE__))[0];

?>

<section class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="max-w-5xl mx-auto px-4 md:px-6 lg:px-8">
        <?php if (!empty($shortcode)) : ?>
            <?php echo do_shortcode($shortcode); ?>
        <?php endif; ?>
    </div>
</section>