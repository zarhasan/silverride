<?php
/**
 * Template part for displaying the Grid Textual section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title       = $args['title'] ?? '';
$subtitle    = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$grid_size   = intval($args['grid_size'] ?? 3);
$items       = $args['items'] ?? [];
$background_color  = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta         = $args['cta'] ?? [];

$bg_style = $background_color ? 'background-color: ' . esc_attr($background_color) . ';' : '';
$bg_class = $background_color ? '' : 'bg-white';

$grid_size_classes = [
    2 => 'md:grid-cols-2',
    3 => 'md:grid-cols-3',
    4 => 'md:grid-cols-4',
    5 => 'md:grid-cols-5',
];
$grid_class = $grid_size_classes[$grid_size] ?? $grid_size_classes[3];
?>

<section
    id="<?php echo !empty($args['id']) ? $args['id'] : ''; ?>"
    class="my-16 md:my-24 <?php echo esc_attr($bg_class); ?>"
    <?php echo $bg_style ? 'style="' . $bg_style . '"' : ''; ?>
    data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">

        <?php if ($subtitle || $title || $description) : ?>
            <div class="text-center mb-12 md:mb-16 max-w-4xl mx-auto">
                <?php if ($subtitle) : ?>
                    <p class="text-sm font-semibold uppercase tracking-wider mb-3" style="color: var(--theme-primary);">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <?php if ($title) : ?>
                    <h2 class="text-3xl md:text-[2.5rem] font-semibold !leading-tight text-[#1B1B1B] mb-4">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($items)) : ?>
            <div class="grid grid-cols-1 <?php echo esc_attr($grid_class); ?> gap-6 lg:gap-8">
                <?php foreach ($items as $item) :
                    $item_image = $item['image'] ?? [];
                    $item_title = $item['title'] ?? '';
                    $item_description = $item['description'] ?? '';
                    $item_link = $item['link'] ?? [];
                    $has_link = !empty($item_link['url']);
                ?>
                    <article class="bg-white border-2 border-primary rounded-2xl p-8 flex flex-col hover:border-rose-700 transition-colors">
                        <?php if (!empty($item_image) && !empty($item_image['url'])) : ?>
                            <img
                                src="<?php echo esc_url($item_image['url']); ?>"
                                alt="<?php echo esc_attr($item_image['alt'] ?? ''); ?>"
                                class="w-full h-48 object-cover rounded-xl mb-6"
                            >
                        <?php endif; ?>

                        <?php if ($item_title) : ?>
                            <h3 class="text-xl font-semibold text-[#1B1B1B] mb-3 leading-snug">
                                <?php if ($has_link) : ?>
                                    <a href="<?php echo esc_url($item_link['url']); ?>" class="hover:underline focus:outline-none focus:ring-2 focus:ring-offset-2 rounded" style="color: inherit; --tw-ring-color: var(--theme-primary);">
                                        <?php echo esc_html($item_title); ?>
                                    </a>
                                <?php else : ?>
                                    <?php echo esc_html($item_title); ?>
                                <?php endif; ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($item_description) : ?>
                            <div class="prose text-base text-[#1B1B1B] leading-relaxed mb-6 flex-grow">
                                <?php echo wp_kses_post($item_description); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($has_link) : ?>
                            <a href="<?php echo esc_url($item_link['url']); ?>" class="inline-flex items-center font-semibold transition-colors hover:opacity-80" style="color: var(--theme-primary);" <?php echo !empty($item_link['target']) ? 'target="' . esc_attr($item_link['target']) . '"' : ''; ?>>
                                <?php echo esc_html($item_link['title'] ?: 'Learn More'); ?>
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($footer_description)) : ?>
            <div class="text-center mx-auto mt-12 max-w-3xl">
                <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                    <?php echo wp_kses_post($footer_description); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
            <div class="text-center mt-8">
                <a href="<?php echo esc_url($cta['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200 hover:opacity-90" style="background-color: var(--theme-primary);">
                    <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>
