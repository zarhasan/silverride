<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';

$link = $args['link'] ?? [];

$link_url = !empty($link['url']) ? $link['url'] : '/contact-us';
$link_title = !empty($link['title']) ? $link['title'] : 'Contact now';
$link_target = !empty($link['target']) ? $link['target'] : '_self';
?>

<section class="bg-secondary py-16 md:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="flex flex-col !lg:flex-row lg:items-center lg:justify-between gap-8 lg:gap-12">
            <!-- Text Content -->
            <div class="lg:max-w-4xl">
                <?php if (!empty($title)) : ?>
                    <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-white !leading-tight mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($description)) : ?>
                    <div class="text-lg md:text-[1.25rem] prose text-white leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CTA Button -->
            <?php if (!empty($link_url)) : ?>
                <div class="grow flex justify-start lg:justify-center items-center">
                    <a href="<?php echo esc_url($link_url); ?>" class="inline-flex items-center justify-center px-8 py-3 md:px-10 md:py-4 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-secondary transition-colors duration-200">
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
