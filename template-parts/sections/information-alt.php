<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$label = $args['label'] ?? 'FOR DRIVERS';
$title = $args['title'] ?? 'Transportation Your Members Can Count On.';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$image = $args['image'] ?? [];
?>

<section class="bg-[#98D1E6] py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Left Illustration -->
            <div class="flex justify-center">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Illustration of people walking with assistance'); ?>" class="w-full max-w-md h-auto object-contain">
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/media/information-2.png'); ?>" alt="Illustration of people walking with assistance" class="w-full max-w-md h-auto object-contain">
                <?php endif; ?>
            </div>

            <!-- Right Content -->
            <div>
                <span class="text-[1.375rem] font-bold text-gray-900 uppercase tracking-wide mb-3 block">
                    <?php echo esc_html($label); ?>
                </span>

                <h2 class="text-3xl lg:text-[1.625rem] font-bold text-gray-900 leading-tight mb-6">
                    <?php echo esc_html($title); ?>
                </h2>

                <?php if ($description) : ?>
                    <p class="text-lg text-gray-800 leading-relaxed mb-8">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php else : ?>
                    <p class="text-lg text-gray-800 leading-relaxed mb-8">
                        SilverRide supports PACE programs and a growing roster of health plans and healthcare systems. We deliver door-through-door assisted transportation built for clinical complexity: escorts from the living room to the waiting room, scheduling coordinated around appointments, and the compassion your members expect from their care team. One partner for the full trip, from pickup to discharge and home again.
                    </p>
                <?php endif; ?>

                <ul class="space-y-2">
                    <?php if (!empty($items)) : ?>
                        <?php foreach ($items as $item) : ?>
                            <li class="flex items-start gap-3 text-lg text-gray-800">
                                <span class="text-gray-900">&bull;</span>
                                <span><?php echo wp_kses_post($item['item'] ?? $item); ?></span>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li class="flex items-start gap-3 text-lg text-gray-800">
                            <span class="text-gray-900">&bull;</span>
                            <span>Credentialed drivers experienced with medically complex riders</span>
                        </li>
                        <li class="flex items-start gap-3 text-lg text-gray-800">
                            <span class="text-gray-900">&bull;</span>
                            <span>Integrated booking, live tracking, and compliance-ready reporting</span>
                        </li>
                        <li class="flex items-start gap-3 text-lg text-gray-800">
                            <span class="text-gray-900">&bull;</span>
                            <span>Door-through-door service as the baseline, not an upgrade</span>
                        </li>
                        <li class="flex items-start gap-3 text-lg text-gray-800">
                            <span class="text-gray-900">&bull;</span>
                            <span>ADA-compliant service across 35+ major metros in 15 states</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
