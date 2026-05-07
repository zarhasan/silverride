<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$subtitle = $args['subtitle'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? [];
$links = $args['links'] ?? [];
?>

<section class="relative flex items-center" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <!-- Background Image -->
    <?php if (!empty($image) && !empty($image['url'])) : ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">
    <?php endif; ?>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-primary to-transparent" aria-hidden="true"></div>

    <!-- Content -->
    <div class="container relative z-10 py-20 md:py-28">
        <div class="max-w-2xl mt-28">
            <?php if (!empty($subtitle)) : ?>
                <span class="block text-base lg:text-xl font-bold text-white uppercase tracking-wide mb-4">
                    <?php echo esc_html($subtitle); ?>
                </span>
            <?php endif; ?>

            <?php if (!empty($title)) : ?>
                <h1 class="text-4xl lg:text-[2.875rem] font-bold text-white leading-tight mb-6">
                    <?php echo wp_kses_post($title); ?>
                </h1>
            <?php endif; ?>

            <?php if (!empty($description)) : ?>
                <div class="text-lg md:text-xl text-blue-100 leading-relaxed mb-10">
                    <?php echo wp_kses_post($description); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($links)) : ?>
                <div class="flex flex-wrap gap-4">
                    <?php foreach ($links as $link_item) :
                        $link = $link_item['link'] ?? [];
                        if (empty($link)) continue;
                    ?>
                        <a href="<?php echo esc_url($link['url'] ?? '#'); ?>" class="inline-flex items-center justify-center px-8 py-3 md:px-10 md:py-4 text-base md:text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
                            <?php echo esc_html($link['title'] ?? 'Learn More'); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
