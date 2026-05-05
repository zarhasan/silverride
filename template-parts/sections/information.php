<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Who We Are';
$subtitle = $args['subtitle'] ?? 'More Than A Ride. A Lifeline.';
$description = $args['description'] ?? '';
$link = $args['link'] ?? [];
$image = $args['image'] ?? [];
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Left Content -->
            <div>
                <?php if ($title) : ?>
                    <h2 class="text-3xl lg:text-[2.875rem] !leading-tight font-bold text-gray-900 mb-4">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($subtitle) : ?>
                    <h3 class="text-[1.625rem] md:text-2xl font-bold text-gray-900 mb-6">
                        <?php echo esc_html($subtitle); ?>
                    </h3>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="text-[1.25rem] text-gray-700 leading-relaxed space-y-6 mb-10">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($link['title']) && !empty($link['url'])) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="btn btn-primary">
                        <?php echo esc_html($link['title'] ?? ''); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Right Illustration -->
            <div class="flex justify-center">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full max-w-md h-auto object-contain">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
