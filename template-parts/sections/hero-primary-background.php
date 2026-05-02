<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$links = $args['links'] ?? [];
?>

<section class="bg-primary py-20 md:py-28" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container !max-w-5xl text-center">
        <?php if (!empty($subtitle)) : ?>
            <span class="block text-sm font-bold text-white uppercase tracking-wide mb-4">
                <?php echo wp_kses_post($subtitle); ?>
            </span>
        <?php endif; ?>

        <?php if (!empty($title)) : ?>
            <h1 class="text-3xl font-bold leading-tight text-white lg:text-[2.875rem]">
                <?php echo wp_kses_post($title); ?>
            </h1>
        <?php endif; ?>

        <?php if (!empty($description)) : ?>
            <div class="mt-8 md:mt-10 text-base font-normal leading-relaxed text-blue-100 md:text-lg">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($links) && isset($links[0]['link'])) :
            $link = $links[0]['link'];
        ?>
            <div class="mt-10">
                <a href="<?php echo esc_url($link['url'] ?? '#'); ?>" class="inline-block text-white px-8 py-3 rounded-full transition-colors text-lg border-2 border-white hover:bg-white hover:text-primary font-semibold">
                    <?php echo esc_html($link['title'] ?? 'Contact Us'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
