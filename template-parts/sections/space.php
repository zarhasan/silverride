<?php
/**
 * Template part for displaying the Empty Space / Divider section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$args = wp_parse_args($args, array(
    'space_type' => 'invisible',
    'size' => 'medium',
    'custom_size' => '',
    'apply_to' => 'both',
    'method' => 'margin',
    'divider_style' => 'solid',
    'divider_color' => '#e5e7eb',
    'divider_width' => 100,
    'full_width' => false,
));

$space_type = $args['space_type'];
$size = $args['size'];
$custom_size = $args['custom_size'];
$apply_to = $args['apply_to'];
$method = $args['method'];
$divider_style = $args['divider_style'];
$divider_color = $args['divider_color'];
$divider_width = $args['divider_width'];
$full_width = $args['full_width'];

$size_values = array(
    'small' => 24,
    'medium' => 48,
    'large' => 72,
    'xlarge' => 96,
);

$space_value = $size === 'custom' ? intval($custom_size) : ($size_values[$size] ?? 48);

$style = '';

if ($space_type === 'invisible') {
    $properties = array();
    if ($apply_to === 'both' || $apply_to === 'top') {
        $properties[] = "{$method}-top: {$space_value}px";
    }
    if ($apply_to === 'both' || $apply_to === 'bottom') {
        $properties[] = "{$method}-bottom: {$space_value}px";
    }
    $style = implode('; ', $properties);
} else {
    $container_classes = $full_width ? 'w-full' : 'w-full max-w-5xl mx-auto px-4 md:px-6 lg:px-8';
    $divider_style_attr = "border-top: 1px {$divider_style} {$divider_color}; width: {$divider_width}%;";
    
    if ($full_width) {
        $divider_style_attr = "border-top: 1px {$divider_style} {$divider_color};";
    }
}

if ($space_type === 'invisible') :
    if ($style) : ?>
        <div class="empty-space" style="<?php echo esc_attr($style); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>"></div>
    <?php endif; ?>

<?php elseif ($space_type === 'divider') : ?>
    <div class="<?php echo esc_attr($container_classes); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
        <hr style="<?php echo esc_attr($divider_style_attr); ?>" />
    </div>
<?php endif;