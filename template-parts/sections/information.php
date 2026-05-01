<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Who We Are';
$subtitle = $args['subtitle'] ?? 'More Than A Ride. A Lifeline.';
$description = $args['description'] ?? '';
$link = $args['link'] ?? [];
$image = $args['image'] ?? [];
?>

<section class="bg-white py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Left Content -->
            <div>
                <h2 class="text-3xl lg:text-[2.875rem] font-bold text-gray-900 mb-4">
                    <?php echo esc_html($title); ?>
                </h2>

                <h3 class="text-[1.625rem] md:text-2xl font-bold text-gray-900 mb-6">
                    <?php echo esc_html($subtitle); ?>
                </h3>

                <?php if ($description) : ?>
                    <div class="text-[1.25rem] text-gray-700 leading-relaxed space-y-6 mb-10">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php else : ?>
                    <div class="text-[1.25rem] text-gray-700 leading-relaxed space-y-6 mb-10">
                        <p>
                            For millions of older adults and people with disabilities, a reliable ride is the difference between staying connected and being left behind. Rideshare apps often cannot accommodate a wheelchair. Traditional non-emergency medical services only cover medical trips. Public transit can be out of reach. SilverRide was built to close that gap, every day, at scale.
                        </p>
                        <p>
                            We are a licensed Transportation Network Company delivering ADA-compliant assisted transportation, powered by a purpose-built technology platform and an experienced, credentialed driver network. We work three ways: paratransit partnerships with transit agencies, contract services for PACE and healthcare organizations, and direct booking for riders and their families. One platform. Three audiences. The same standard of care on every ride.
                        </p>
                        <p>
                            The result: greater independence, greater dignity, more joy. For the people who need it most.
                        </p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($link) && !empty($link['url'])) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="btn btn-primary">
                        <?php echo esc_html($link['title'] ?? 'Learn More About SilverRide'); ?>
                    </a>
                <?php else : ?>
                    <a href="#" class="btn btn-primary">
                        Learn More About SilverRide
                    </a>
                <?php endif; ?>
            </div>

            <!-- Right Illustration -->
            <div class="flex justify-center lg:justify-end">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Illustration of people walking together'); ?>" class="w-full max-w-md h-auto object-contain">
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/media/information.png'); ?>" alt="Illustration of two people walking together, one with a cane" class="w-full max-w-md h-auto object-contain">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
