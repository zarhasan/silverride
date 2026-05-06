<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$stats = $args['stats'] ?? [];
?>

<section class="bg-[#98D1E6] py-16 lg:py-20" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 text-center">
            <?php if (!empty($stats)) : ?>
                <?php foreach ($stats as $stat) : ?>
                    <div>
                        <div class="text-5xl md:text-6xl lg:text-7xl font-bold text-primary mb-3">
                            <?php echo esc_html($stat['number'] ?? ''); ?>
                        </div>
                        <div class="text-base md:text-lg text-primary font-medium">
                            <?php echo esc_html($stat['label'] ?? ''); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
