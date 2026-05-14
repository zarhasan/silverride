<?php

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title            = $args['title'] ?? '';
$links            = $args['links'] ?? [];
$background_color = $args['background_color'] ?? '#F8952D';
$margin           = $args['margin'] ?? 'default';
$custom_margin    = $args['custom_margin'] ?? '';

if (empty($title) && empty($links)) {
    return;
}

$section_classes = 'links-alt';
$style = '';

if ($margin === 'custom' && !empty($custom_margin)) {
    $style .= 'margin: ' . esc_attr($custom_margin) . ';';
} else {
    $section_classes .= ' my-16 md:my-24';
    if ($margin === 'none') {
        $section_classes .= ' !my-0';
    } elseif ($margin === 'small') {
        $section_classes = str_replace(['my-16', 'md:my-24'], ['my-8', 'md:my-12'], $section_classes);
    } elseif ($margin === 'medium') {
        $section_classes = str_replace(['my-16', 'md:my-24'], ['my-12', 'md:my-16'], $section_classes);
    } elseif ($margin === 'large') {
        $section_classes = str_replace(['my-16', 'md:my-24'], ['my-20', 'md:my-32'], $section_classes);
    }
}

if (!empty($background_color)) {
    $style .= ($style ? ' ' : '') . 'background-color: ' . esc_attr($background_color) . ';';
}

?>

<section
    id="<?php echo !empty($args['id']) ? $args['id'] : null; ?>"
    class="<?php echo esc_attr($section_classes); ?>"
    data-section-id="<?php echo esc_attr($template_part_name); ?>"
    <?php if ($style) : ?>style="<?php echo esc_attr($style); ?>"<?php endif; ?>>
    <div class="py-16 md:py-24">
        <div class="container">

            <?php if (!empty($title)) : ?>
                <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-white text-center mb-10 md:mb-14">
                    <?php echo wp_kses_post($title); ?>
                </h2>
            <?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                <?php foreach ($links as $link_item) :
                    $label = $link_item['label'] ?? '';
                    $link_data = is_array($link_item) && isset($link_item['link']) ? $link_item['link'] : $link_item;
                    $link_title = is_array($link_data) ? ($link_data['title'] ?? '') : $link_data;
                    $link_url   = is_array($link_data) ? ($link_data['url'] ?? '#') : '#';
                    $link_target = is_array($link_data) ? ($link_data['target'] ?? '') : '';
                ?>
                    <div class="links-alt__card bg-white rounded-xl p-10 text-center">
                        <?php if (!empty($label)) : ?>
                            <p class="text-base md:text-xl text-[#1B1B1B] mb-4">
                                <?php echo esc_html($label); ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($link_url)) : ?>
                            <a
                                href="<?php echo esc_url($link_url); ?>"
                                <?php if (!empty($link_target)) : ?>target="<?php echo esc_attr($link_target); ?>"<?php endif; ?>
                                class="text-xl md:text-2xl font-medium text-primary no-underline hover:underline transition-all"
                            >
                                <?php echo esc_html($link_title ?: $link_url); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>
