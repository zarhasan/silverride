<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? 'Trusted By The Organizations That Move America.';
$description = $args['description'] ?? 'Transit agencies, PACE organizations, and healthcare systems across the country partner with SilverRide to deliver the assisted transportation their communities deserve.';
$logos = $args['logos'] ?? [];

// Default logos if none provided
if (empty($logos)) {
    $logos = [
        ['url' => 'logo-institute-on-aging.png', 'alt' => 'Institute on Aging'],
        ['url' => 'logo-mv.png', 'alt' => 'MV Transportation'],
        ['url' => 'logo-ucsf.png', 'alt' => 'UCSF'],
        ['url' => 'logo-valley-metro.png', 'alt' => 'Valley Metro'],
        ['url' => 'logo-choice-in-aging.png', 'alt' => 'Choice in Aging'],
        ['url' => 'logo-contra-costa.png', 'alt' => 'Contra Costa Transportation Authority'],
        ['url' => 'logo-transdev.png', 'alt' => 'Transdev'],
        ['url' => 'logo-center-for-elders.png', 'alt' => 'Center for Elders Independence'],
        ['url' => 'logo-access.png', 'alt' => 'Access'],
        ['url' => 'logo-lynx.png', 'alt' => 'LYNX'],
        ['url' => 'logo-sutter-health.png', 'alt' => 'Sutter Health'],
        ['url' => 'logo-dart.png', 'alt' => 'DART'],
        ['url' => 'logo-tarc.png', 'alt' => 'TARC'],
        ['url' => 'logo-ridekc.png', 'alt' => 'RideKC'],
    ];
}
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <!-- Header -->
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-gray-900 mb-4">
                <?php echo esc_html($title); ?>
            </h2>

            <?php if ($description) : ?>
                <p class="text-lg md:text-[1.5rem] text-gray-700 leading-relaxed mx-auto mt-8">
                    <?php echo esc_html($description); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Logo Grid -->
        <?php if (!empty($logos)) : ?>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8 md:gap-10 items-center">
                <?php foreach ($logos as $logo) : ?>
                    <?php if (!empty($logo['url'])) : ?>
                        <div class="flex items-center justify-center p-4">
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?? 'Partner logo'); ?>" class="max-h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all duration-300">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
