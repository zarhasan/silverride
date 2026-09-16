<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';

$link = $args['link'] ?? [];
$secondary_link = $args['secondary_link'] ?? [];

$link_url = !empty($link['url']) ? $link['url'] : '/contact-us';
$link_title = !empty($link['title']) ? $link['title'] : 'Contact now';
$link_target = !empty($link['target']) ? $link['target'] : '_self';
$secondary_url = $secondary_link['url'] ?? '';
$secondary_title = $secondary_link['title'] ?? '';
$secondary_target = !empty($secondary_link['target']) ? $secondary_link['target'] : '_self';
?>

<section class="bg-[#FFF1A5] py-16 md:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="flex flex-col !lg:flex-row lg:items-center lg:justify-between gap-8 lg:gap-12">
            <!-- Text Content -->
            <div class="lg:max-w-4xl">
                <?php if (!empty($title)) : ?>
                    <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-primary !leading-tight mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($description)) : ?>
                    <div class="text-lg md:text-[1.25rem] prose text-primary leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CTA Buttons -->
            <?php if (!empty($link_url) || !empty($secondary_url)) : ?>
                <div class="grow whitespace-nowrap flex flex-wrap sm:flex-nowrap justify-start lg:justify-center items-center gap-4">
                    <?php if (!empty($link_url)) : ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="inline-flex items-center justify-center px-8 py-3 md:px-10 md:py-4 text-lg font-semibold text-primary border-2 border-primary rounded-full hover:bg-primary hover:text-white transition-colors duration-200">
                        <?php echo esc_html($link_title); ?>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($secondary_url) && !empty($secondary_title)) : ?>
                    <a href="<?php echo esc_url($secondary_url); ?>" target="<?php echo esc_attr($secondary_target); ?>" class="inline-flex items-center justify-center px-8 py-3 md:px-10 md:py-4 text-lg font-semibold text-primary border-2 border-primary rounded-full hover:bg-primary hover:text-white transition-colors duration-200">
                        <?php echo esc_html($secondary_title); ?>
                    </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
