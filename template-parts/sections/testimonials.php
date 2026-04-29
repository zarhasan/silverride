<?php
/**
 * Template part for displaying the Testimonials section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? [];
$quote = $args['quote'] ?? '';
$company = $args['company'] ?? '';
$position = $args['position'] ?? '';

$default_quote = 'SilverRide allowed us to maintain a leadership position in providing our valued clients with fully transparent and consistent communications, within the proper regulatory Accessibility frameworks and conformance standards. They have been responsible for making all public communications fully accessible since 2016.';
$default_company = 'Financial Services Regulatory Authority of Ontario';
$default_position = 'Senior Manager, Strategic Communications Branch';
?>

<section class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <?php if ($title) : ?>
        <div class="mb-12">
            <h2 class="text-3xl md:text-[2.5rem] font-semibold mb-2" style="color: var(--theme-primary);"><?php echo esc_html($title); ?></h2>
            <?php if ($description) : ?>
            <h3 class="text-xl md:text-3xl font-semibold text-[#1B1B1B]"><?php echo esc_html($description); ?></h3>
            <?php endif; ?>
        </div>
        <?php else : ?>
        <div class="mb-12">
            <h2 class="text-3xl md:text-[2.5rem] font-semibold mb-2" style="color: var(--theme-primary);">What Our Clients Have To Say</h2>
            <h3 class="text-xl md:text-3xl font-semibold text-[#1B1B1B]">Client Success Stories</h3>
        </div>
        <?php endif; ?>

        <div class="rounded-lg p-6 md:p-8 bg-[#F9F9F9]" >
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="border-2 rounded-lg p-6 flex items-center justify-center" style="border-color: var(--theme-primary);">
                    <?php if (!empty($image) && !empty($image['url'])) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $company); ?>" class="w-full max-w-xs h-auto object-contain">
                    <?php endif; ?>
                </div>

                <div>
                    <h4 class="text-xl md:text-3xl font-semibold text-[#1B1B1B] mb-4">
                        <?php echo esc_html($company ?: $default_company); ?>
                    </h4>

                    <blockquote class="text-[#1B1B1B] text-base leading-relaxed mb-6 italic">
                        "<?php echo esc_html($quote ?: $default_quote); ?>"
                    </blockquote>

                    <div class="mt-6">
                        <p class="font-semibold text-[#1B1B1B]"><?php echo esc_html($company ?: $default_company); ?></p>
                        <p class="text-gray-500"><?php echo esc_html($position ?: $default_position); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
