<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];


$title = $args['title'] ?? 'Our Process';
$subtitle = $args['subtitle'] ?? 'Accessibility Consulting And Planning';
$image = $args['image'] ?? [];
$mobile_image = $args['mobile_image'] ?? [];
?>

<div class="container my-20" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <h2 class="text-3xl md:text-[2.5rem] font-semibold text-center text-[#1B1B1B] mb-6">
        <?php echo esc_html($title); ?>
    </h2>
    <?php if ($subtitle) : ?>
    <h3 class="text-2xl md:text-3xl font-semibold text-center text-[#1B1B1B] mb-12">
        <?php echo esc_html($subtitle); ?>
    </h3>
    <?php endif; ?>
    
    <div class="relative">
        <?php if (!empty($image) && !empty($image['url'])) : ?>
            <?php if (!empty($mobile_image) && !empty($mobile_image['url'])) : ?>
                <picture>
                    <source media="(min-width: 768px)" srcset="<?php echo esc_url($image['url']); ?>">
                    <source media="(max-width: 767px)" srcset="<?php echo esc_url($mobile_image['url']); ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Our Process Flow'); ?>" class="w-full h-auto mx-auto">
                </picture>
            <?php else : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Our Process Flow'); ?>" class="w-full h-auto mx-auto">
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>