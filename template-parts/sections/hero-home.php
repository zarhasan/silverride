<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? "The Nation's Leading Assisted Transportation Platform";
$description = $args['description'] ?? '';
$links = $args['links'] ?? [];
$image = $args['image'] ?? [];
?>

<section class="relative bg-blue-900 overflow-hidden" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container py-20 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <!-- Left Content -->
            <div>
                <h1 class="text-4xl lg:text-[2.875rem] font-bold text-white leading-tight mb-8">
                    <?php echo wp_kses_post($title); ?>
                </h1>

                <?php if ($description) : ?>
                    <p class="text-[1.25rem] text-blue-100 leading-relaxed mb-10">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php else : ?>
                    <p class="text-[1.25rem] text-blue-100 leading-relaxed mb-10">
                        SilverRide moves older adults and people with disabilities to the places that matter. Dialysis and the nail salon. The grocery store and grandchildren's birthdays. More than one million rides a year, across 35+ major metro areas in 15 states. Because independence is not a luxury. It is a right.
                    </p>
                <?php endif; ?>

                <div class="flex flex-wrap gap-4">
                    <?php if (!empty($links)) : ?>
                        <?php foreach ($links as $link_item) :
                            $link = $link_item['link'] ?? [];
                            if (empty($link) || empty($link['url'])) continue;
                        ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-blue-900 transition-colors duration-200">
                                <?php echo esc_html($link['title'] ?? 'Button'); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-blue-900 transition-colors duration-200">
                            For Drivers
                        </a>
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 text-lg font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-blue-900 transition-colors duration-200">
                            For Riders
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Illustration -->
            <div class="relative flex justify-center lg:justify-end lg:items-end">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Accessible transportation illustration'); ?>" class="w-full max-w-lg lg:max-w-xl h-auto object-contain">
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/media/hero-home-pattern.png'); ?>" alt="" class="w-full max-w-lg lg:max-w-xl h-auto object-contain">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
