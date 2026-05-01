<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? 'Trusted By The Organizations That Move America.';
$description = $args['description'] ?? 'Transit agencies, PACE organizations, and healthcare systems across the country partner with SilverRide to deliver the assisted transportation their communities deserve.';
$logos = $args['logos'] ?? [];

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

        <div>
            <img src="<?php echo get_template_directory_uri(); ?>/media/logos-1.png" alt="Partner Logo">
            <img class="lg:max-w-5xl w-auto h-auto mx-auto" src="<?php echo get_template_directory_uri(); ?>/media/logos-2.png" alt="Partner Logo">
        </div>
    </div>
</section>
