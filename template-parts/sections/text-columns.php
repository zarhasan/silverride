<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$container = $args['container'] ?? 'small';
$disable_top_margin = !empty($args['disable_top_margin']);
$disable_bottom_margin = !empty($args['disable_bottom_margin']);

$container_class = $container === 'full' ? 'container' : 'max-w-5xl mx-auto px-4 md:px-6 lg:px-8';
$section_class = 'py-16 md:py-24';
if ($disable_top_margin) {
    $section_class = str_replace('py-', 'pb-', $section_class);
}
if ($disable_bottom_margin) {
    $section_class = str_replace('py-', 'pt-', $section_class);
}
if ($disable_top_margin && $disable_bottom_margin) {
    $section_class = '';
}
?>

<section class="bg-white <?php echo esc_attr($section_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="<?php echo esc_attr($container_class); ?>">
        <?php if ($title) : ?>
        <h2 class="text-3xl md:text-[2.5rem] font-semibold !leading-tight text-[#1B1B1B] mb-12 md:mb-16">
            <?php echo wp_kses_post($title); ?>
        </h2>
        <?php endif; ?>

        <?php if ($description) : ?>
        <div class="prose prose-lg max-w-none text-[#1B1B1B] leading-relaxed columns-1 md:columns-2 gap-10 md:gap-16">
            <?php echo wp_kses_post($description); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
