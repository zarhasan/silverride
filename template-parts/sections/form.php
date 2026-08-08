<?php

if (!defined('ABSPATH')) {
    exit;
}

$shortcode = $args['shortcode'] ?? '';
$template_part_name = explode('.', basename(__FILE__))[0];

?>

<section id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>" class="container my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="max-w-5xl mx-auto pt-10 pb-4 px-8 border border-zinc-300 bg-zinc-100">
        <?php if (!empty($args['title'])) : ?>
            <h2 class="text-2xl sm:text-[1.625rem] font-bold text-zinc-800 mb-8 text-center"><?php echo esc_html($args['title'] ?? ''); ?></h2>
        <?php endif; ?>

        <?php if (!empty($args['description'])) : ?>
            <div class="prose text-center text-zinc-700 mb-8">
                <?php echo wp_kses_post($args['description']); ?>
            </div>
        <?php endif; ?>

        
        <?php if (!empty($shortcode)) : ?>
            <div>Fields marked with * are required.</div>
            <?php echo do_shortcode($shortcode); ?>
        <?php endif; ?>
    </div>
</section>