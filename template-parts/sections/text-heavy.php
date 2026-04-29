<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$args = wp_parse_args($args, array(
    'id' => '',
    'title' => '',
    'description' => '',
    'container' => 'full',
    'disable_top_margin' => 0,
    'disable_bottom_margin' => 0,
));

$title = $args['title'];
$description = $args['description'];
$section_id = $args['id'] ? 'id="' . esc_attr($args['id']) . '"' : '';

$margin_top = $args['disable_top_margin'] ? '' : 'mt-16 sm:mt-24';
$margin_bottom = $args['disable_bottom_margin'] ? '' : 'mb-12';

$container = [
    'full' => 'container',
    'small' => 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8',
];

$container_class = $container[$args['container'] ?? 'full'] ?? $container['full'];
?>

<div <?php echo $section_id; ?> class="<?php echo esc_attr($container_class); ?> <?php echo esc_attr($margin_top); ?> <?php echo esc_attr($margin_bottom); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <?php if(!empty($title)) : ?>
        <h2 class="text-3xl md:text-[2.5rem] font-semibold capitalize tracking-wide !leading-snug mb-6">
            <?php echo wp_kses_post($title); ?>
        </h2>
    <?php endif; ?>

    <?php if ($description) : ?>
        <div class="prose text-lg leading-relaxed">
            <?php echo wp_kses_post($description); ?>
        </div>
    <?php endif; ?>
</div>