<?php
/**
 * Template part for displaying the Client Logos section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$logos = $args['logos'] ?? [];
$columns = $args['columns'] ?? 5;

$grid_cols = 'grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5';
if ($columns == 1) {
    $grid_cols = 'grid-cols-1';
} elseif ($columns == 2) {
    $grid_cols = 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-2';
} elseif ($columns == 3) {
    $grid_cols = 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-3';
} elseif ($columns == 4) {
    $grid_cols = 'grid-cols-2 sm:grid-cols-4 lg:grid-cols-4';
}
?>

<section class="my-16 md:my-24 py-16 bg-[#F9F9F9]" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <?php if ($title) : ?>
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-[2.5rem] font-semibold text-primary mb-4">
                    <?php echo esc_html($title); ?>
                </h2>

                <?php if ($subtitle) : ?>
                    <p class="text-3xl font-semibold text-[#1B1B1B]">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="mt-4 text-lg text-[#1B1B1B] leading-relaxed">
                        <?php echo esc_html($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($logos)) : ?>
            <div class="grid <?php echo $grid_cols; ?> gap-8 md:gap-12 items-center">
                <?php foreach ($logos as $logo) : ?>
                    <?php if (!empty($logo['url'])) : ?>
                        <div class="flex items-center justify-center p-4">
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?? ''); ?>" class="max-h-28 w-auto object-contain transition-all duration-300">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>