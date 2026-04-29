<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Accessibility Plans & Policies';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$link = $args['link'] ?? [];
$image = $args['image'] ?? [];
$background_color = $args['background_color'] ?? '';

$display_items = !empty($items) ? array_column($items, 'item') : [];

$content_bg_style = $background_color ? 'background-color: ' . esc_attr($background_color) . '; border-radius: 1rem;' : '';
$content_class = $background_color ? 'p-8' : '';
?>

<section class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
            <div class="order-2 !md:order-2">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full h-auto rounded-lg">
                <?php endif; ?>
            </div>

            <div class="order-1 !md:order-1">
                <div <?php echo $content_class ? 'class="' . esc_attr($content_class) . '"' : ''; ?> <?php echo $content_bg_style ? 'style="' . $content_bg_style . '"' : ''; ?>>
                    <h2 class="text-3xl md:text-[2.5rem] !leading-tight font-semibold text-[#1B1B1B] mb-6"><?php echo esc_html($title); ?></h2>
                    
                    <?php if ($description) : ?>
                        <div class="prose text-lg mb-8 leading-relaxed">
                            <?php echo wp_kses_post($description); ?>
                        </div>
                    <?php endif; ?>

                    <ul class="space-y-4 mb-8">
                        <?php foreach ($display_items as $item) : ?>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 w-6 h-6 rounded-full border-2 flex items-center justify-center mt-0.5 mr-3" style="border-color: var(--theme-primary);">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="color: var(--theme-primary);">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-lg"><?php echo wp_kses_post($item); ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <?php if (!empty($link) && !empty($link['url'])) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="inline-block text-white px-8 py-3 rounded-full font-normal transition-colors text-lg" style="background-color: var(--theme-primary);">
                        <?php echo esc_html($link['title'] ?? 'Learn More About Accessibility Plans & Policies'); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
