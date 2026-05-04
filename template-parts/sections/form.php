<?php

if (!defined('ABSPATH')) {
    exit;
}

$shortcode = $args['shortcode'] ?? '';
$template_part_name = explode('.', basename(__FILE__))[0];

?>

<section class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto py-10 px-8 border border-zinc-300 bg-zinc-100">
        <?php if (!empty($args['title'])) : ?>
            <h2 class="text-2xl sm:text-[1.625rem] font-bold text-zinc-800 mb-8 text-center"><?php echo esc_html($args['title'] ?? ''); ?></h2>
        <?php endif; ?>

        <?php if (!empty($shortcode)) : ?>
            <?php echo do_shortcode($shortcode); ?>
        <?php endif; ?>
    </div>
</section>