<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$login_shortcode = $args['login_shortcode'] ?? '[learn_press_login_form redirect="/lp-profile"]';
$register_shortcode = $args['register_shortcode'] ?? '[learn_press_register_form redirect="/thanks"]';
$activation_message = $args['activation_message'] ?? '[ap_activation_message]';

?>

<section class="my-16 lg:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <?php if ($title) : ?>
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-[2.5rem] font-semibold mb-6" style="color: var(--theme-primary);">
                <?php echo esc_html($title); ?>
            </h2>
        </div>
        <?php endif; ?>

        <div class="grid sm:grid-cols-2 gap-8">
            <div>
                <?php echo do_shortcode($activation_message); ?>
                <?php echo do_shortcode($login_shortcode); ?>
            </div>

            <div>
                <?php echo do_shortcode($register_shortcode); ?>
            </div>
        </div>
    </div>
</section>
