<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? "";
$subtitle = $args['subtitle'] ?? "";
$description = $args['description'] ?? '';
$links = $args['links'] ?? [];
$image = $args['image'] ?? [];
?>

<section class="relative bg-primary overflow-hidden" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container py-20 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Left Content -->
            <div>
                <?php if (!empty($subtitle)) : ?>
                    <p class="text-[#F8F12D] text-lg !font-medium sm:text-[1.25rem] mb-4">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($title)) : ?>
                    <h1 class="text-4xl lg:text-[2.875rem] font-bold text-white leading-tight mb-8">
                        <?php echo wp_kses_post($title); ?>
                    </h1>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="text-[1.25rem] text-blue-100 leading-relaxed mb-10">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>

                <div class="flex flex-wrap gap-4">
                    <?php if (!empty($links)) : ?>
                        <?php foreach ($links as $link_item) :
                            $link = $link_item['link'] ?? [];
                            if (empty($link) || empty($link['url'])) continue;
                        ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-primary transition-colors duration-200">
                                <?php echo esc_html($link['title'] ?? ''); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Illustration -->
            <div class="relative flex justify-center lg:justify-end lg:items-end">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Accessible transportation illustration'); ?>" class="w-full max-w-lg lg:max-w-xl h-auto object-contain">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
