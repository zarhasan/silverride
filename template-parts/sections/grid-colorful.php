<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$items = $args['items'] ?? [];
$section_bg = $args['background_color'] ?? '';
$footer_description = $args['footer_description'] ?? '';
$cta = $args['cta'] ?? [];
$disable_margins = !empty($args['disable_margins']);

$colors = [
    '#98D1E6',
    '#FFF1A5',
    '#FCC4D1',
    '#C4E8C2',
    '#E0D4FC',
    '#FED7AA',
];

$section_class = $disable_margins ? '' : 'my-16 lg:my-24';
$bg_style = $section_bg ? ' style="background-color: ' . esc_attr($section_bg) . ';"' : '';
?>

<section class="<?php echo esc_attr($section_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>"<?php echo $bg_style; ?>>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <?php if ($title) : ?>
        <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-gray-900 text-center mb-12 lg:mb-16">
            <?php echo esc_html($title); ?>
        </h2>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <?php if (!empty($items)) : ?>
                <?php foreach ($items as $index => $item) :
                    $card_subtitle = $item['subtitle'] ?? '';
                    $card_title = $item['title'] ?? '';
                    $card_description = $item['description'] ?? '';
                    $card_items = $item['items'] ?? [];
                    $color_index = $index % count($colors);
                    $card_bg = $colors[$color_index];
                ?>
                <div class="rounded-2xl p-8 lg:p-12" style="background-color: <?php echo esc_attr($card_bg); ?>;">
                    <?php if ($card_subtitle) : ?>
                    <span class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4 block">
                        <?php echo esc_html($card_subtitle); ?>
                    </span>
                    <?php endif; ?>

                    <?php if ($card_title) : ?>
                    <h3 class="text-[1.625rem] font-bold text-gray-900 leading-tight mb-6">
                        <?php echo esc_html($card_title); ?>
                    </h3>
                    <?php endif; ?>

                    <?php if ($card_description) : ?>
                        <div class="prose text-lg text-gray-800 leading-relaxed mb-8">
                            <?php echo wp_kses_post($card_description); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($footer_description)) : ?>
        <div class="mt-12 text-center">
            <div class="prose text-lg text-gray-700 leading-relaxed mx-auto">
                <?php echo wp_kses_post($footer_description); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($cta) && !empty($cta['url'])) : ?>
        <div class="mt-8 text-center">
            <a href="<?php echo esc_url($cta['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                <?php echo esc_html($cta['title'] ?? 'Learn More'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
