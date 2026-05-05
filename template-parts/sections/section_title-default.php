<?php
if (!defined('ABSPATH')) {
    exit;
}

$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$tag = $args['tag'] ?? '';
$description = $args['description'] ?? '';
$background_color = $args['background_color'] ?? '';

$margins = [
    'none' => 'mb-0',
    'negative' => '-mb-8 sm:-mb-12',
    'default' => 'mb-8 sm:mb-12',
    'small' => 'mb-4 sm:mb-6',
];

$margin_bottom = $args['margin_bottom'] ?? 'default';
$margin_bottom = $margins[$margin_bottom] ?? $margins['default'];
$heading_level = $args['heading_level'] ?? 'h2';

$template_part_name = explode('.', basename(__FILE__))[0];

$container = [
    'full' => 'container',
    'small' => 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8',
];

$container_class = $container[$args['container'] ?? 'full'] ?? $container['full'];

$alignments = [
    'left'   => 'text-left',
    'center' => 'text-center',
    'right'  => 'text-right',
];
$alignment = $args['alignment'] ?? 'center';
$alignment_class = $alignments[$alignment] ?? $alignments['center'];

$has_background = !empty($background_color);
$section_spacing = $has_background ? 'py-16 sm:py-24' : 'mt-16 sm:mt-24 ' . $margin_bottom;
?>

<section
    class="<?php echo esc_attr($container_class . ' ' . $alignment_class . ' ' . $section_spacing); ?>"
    style="<?php echo $has_background ? 'background-color: ' . esc_attr($background_color) . ';' : ''; ?>"
    data-section-id="<?php echo esc_attr($template_part_name); ?>"
    data-heading-level="<?php echo esc_attr($heading_level); ?>"
    data-alignment="<?php echo esc_attr($alignment); ?>">

    <?php if (!empty($subtitle)) : ?>
        <p class="text-lg font-semibold mb-3" style="color: var(--theme-primary);">
            <?php echo esc_html($subtitle); ?>
        </p>
    <?php endif; ?>

    <?php if(!empty($title)) : ?>
        <?php if ($heading_level === 'h1') : ?>
            <h1 class="text-4xl md:text-6xl font-semibold capitalize tracking-wide !leading-snug mb-6">
                <?php echo wp_kses_post($title); ?>
            </h1>
        <?php elseif ($heading_level === 'h2') : ?>
            <h2 class="text-3xl md:text-[2.5rem] font-semibold capitalize tracking-wide !leading-snug mb-6">
                <?php echo wp_kses_post($title); ?>
            </h2>
        <?php elseif ($heading_level === 'h3') : ?>
            <h3 class="text-2xl md:text-4xl font-semibold capitalize tracking-wide !leading-snug mb-6">
                <?php echo wp_kses_post($title); ?>
            </h3>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (!empty($tag)) : ?>
        <span class="inline-block px-4 py-1 rounded-full text-sm font-medium mb-6 border" style="color: var(--theme-primary); border-color: var(--theme-primary); background-color: #FFF1F2;">
            <?php echo esc_html($tag); ?>
        </span>
    <?php endif; ?>

    <?php if ($description) : ?>
        <div class="prose text-lg leading-relaxed">
            <?php echo wp_kses_post($description); ?>
        </div>
    <?php endif; ?>
</section>