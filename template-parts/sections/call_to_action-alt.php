<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$label = $args['label'] ?? 'FOR DRIVERS';
$title = $args['title'] ?? 'We Are Already Where You Are Going.';
$description = $args['description'] ?? '35+ metro areas. 15 states. Growing every day. If SilverRide isn\'t in your market, we are likely on the way.';
$links = $args['links'] ?? [];
?>

<section class="bg-primary py-20 lg:py-28" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12 text-center">
        <span class="text-[1.375rem] font-bold text-white uppercase tracking-wide mb-4 block">
            <?php echo esc_html($label); ?>
        </span>

        <h2 class="text-3xl lg:text-[2.875rem] font-bold text-white leading-tight mb-6">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="text-lg md:text-xl text-blue-100 mb-10 max-w-3xl mx-auto">
            <?php echo wp_kses_post($description); ?>
        </div>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6">
            <?php if (!empty($links)) : ?>
                <?php foreach ($links as $link_item) :
                    $link = $link_item['link'] ?? [];
                    if (empty($link) || empty($link['url'])) continue;
                ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
                        <?php echo esc_html($link['title'] ?? 'Button'); ?>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
                    View Service Area Map
                </a>
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
                    Request Service In My City
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
