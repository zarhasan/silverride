<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$label = $args['subtitle'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$image = $args['image'] ?? [];
?>

<section class="bg-[#98D1E6] py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Left Illustration -->
            <div class="flex justify-center">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Illustration of people walking with assistance'); ?>" class="w-full max-w-md h-auto object-contain">
                <?php endif; ?>
            </div>

            <!-- Right Content -->
            <div>
                <span class="text-[1.375rem] font-bold text-gray-900 uppercase tracking-wide mb-3 block">
                    <?php echo esc_html($label); ?>
                </span>

                <h2 class="text-3xl lg:text-[1.625rem] font-bold text-gray-900 leading-tight mb-6">
                    <?php echo esc_html($title); ?>
                </h2>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-gray-800 leading-relaxed mb-8">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>

                <ul class="space-y-2">
                    <?php if (!empty($items)) : ?>
                        <?php foreach ($items as $item) : ?>
                            <li class="flex items-start gap-3 text-lg text-gray-800">
                                <span class="text-gray-900">&bull;</span>
                                <span><?php echo wp_kses_post($item['item'] ?? $item); ?></span>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
