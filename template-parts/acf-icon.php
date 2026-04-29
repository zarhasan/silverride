<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

$sizes = [
    'sm' => 'max-w-[1.5rem] max-h-6',
    'md' => 'max-w-[2.5rem] max-h-8',
    'lg' => 'max-w-[3rem] max-h-12',
];

$font_icon_sizes = [
    'sm' => 'text-xl',
    'md' => 'text-2xl',
    'lg' => 'text-3xl',
];

$icon_size = !empty($args['size']) ? $args['size'] : 'md';

?>

<?php if (!empty($icon) && 'media_library' === $icon['type'] ):
    $attachment_id = $icon['value']['ID'];
    $size = 'full'; // (thumbnail, medium, large, full, or custom size)

    // temporarily force empty alt via filter for this call only
    $force_empty_alt = function( $attr, $attachment, $size ) {
        $attr['alt'] = '';
        return $attr;
    };
    add_filter( 'wp_get_attachment_image_attributes', $force_empty_alt, 10, 3 );

    $image_html = wp_get_attachment_image( $attachment_id, $size, false, array(
        'class' => 'shrink-0 w-auto h-auto '.$sizes[$icon_size],
    ) );

    // remove the temporary filter so it doesn't affect other image calls
    remove_filter( 'wp_get_attachment_image_attributes', $force_empty_alt, 10 );

    echo wp_kses_post($image_html);
?>

<?php elseif(!empty($icon) && 'url' === $icon['type']): ?>
    <img class="w-auto h-auto shrink-0 <?php echo esc_attr($sizes[$icon_size]); ?>" src="<?php echo esc_attr( $icon['value'] ); ?>" alt="">
<?php else: ?>
    <?php if (!empty($icon) && 'dashicons' === $icon['type']): ?>
        <i class="dashicons inline-flex w-auto h-auto shrink-0 <?php echo esc_attr($font_icon_sizes[$icon_size]); ?> <?php echo esc_attr($icon['value']); ?>"></i>
    <?php endif; ?>
<?php endif; ?>