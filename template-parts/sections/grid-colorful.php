<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Who We Serve';
$cards = $args['cards'] ?? [];
?>

<section class="bg-white py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 text-center mb-12 lg:mb-16">
            <?php echo esc_html($title); ?>
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php if (!empty($cards)) : ?>
                <?php foreach ($cards as $card) :
                    $card_label = $card['label'] ?? '';
                    $card_title = $card['title'] ?? '';
                    $card_description = $card['description'] ?? '';
                    $card_items = $card['items'] ?? [];
                    $card_bg = $card['background_color'] ?? 'bg-sky-200';
                ?>
                <div class="<?php echo esc_attr($card_bg); ?> rounded-2xl p-8 lg:p-12">
                    <span class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4 block">
                        <?php echo esc_html($card_label); ?>
                    </span>

                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-6">
                        <?php echo esc_html($card_title); ?>
                    </h3>

                    <?php if ($card_description) : ?>
                        <p class="text-base text-gray-800 leading-relaxed mb-8">
                            <?php echo wp_kses_post($card_description); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (!empty($card_items)) : ?>
                        <ul class="space-y-3">
                            <?php foreach ($card_items as $item) : ?>
                                <li class="flex items-start gap-3 text-base text-gray-800">
                                    <span class="text-gray-900 mt-1.5">&bull;</span>
                                    <span><?php echo wp_kses_post($item['item'] ?? $item); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- For Transit Agencies -->
                <div class="bg-sky-200 rounded-2xl p-8 lg:p-12">
                    <span class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4 block">FOR TRANSIT AGENCIES</span>

                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-6">
                        Paratransit That Performs.
                    </h3>

                    <p class="text-base text-gray-800 leading-relaxed mb-8">
                        SilverRide is the partner of choice for transit agencies that need ADA-compliant paratransit at scale. Our platform delivers a credentialed driver network, the vehicle mix your riders actually need (sedans, SUVs, and wheelchair-accessible vehicles), and the operational flexibility traditional providers cannot match. Complementary paratransit, overflow service, premium tiers, and same-day trips: we help agencies exceed service standards and control costs.
                    </p>

                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>ADA-compliant service across 35+ major metros in 15 states</span>
                        </li>
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>95% on-time performance backed by agency-grade reporting</span>
                        </li>
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>Sedan, SUV, and wheelchair-accessible vehicles on demand</span>
                        </li>
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>Door-to-door and door-through-door service, standard</span>
                        </li>
                    </ul>
                </div>

                <!-- For PACE and Healthcare -->
                <div class="bg-yellow-100 rounded-2xl p-8 lg:p-12">
                    <span class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-4 block">FOR PACE AND HEALTHCARE</span>

                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight mb-6">
                        Transportation PACE Members Can Count On.
                    </h3>

                    <p class="text-base text-gray-800 leading-relaxed mb-8">
                        SilverRide supports PACE programs and a growing roster of health plans and healthcare systems. We deliver door-through-door assisted transportation built for clinical complexity: escorts from the living room to the waiting room, scheduling coordinated around appointments, and the compassion your members expect from their care team. One partner for the full trip, from pickup to discharge and home again.
                    </p>

                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>Credentialed drivers experienced with medically complex riders</span>
                        </li>
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>Integrated booking, live tracking, and compliance-ready reporting</span>
                        </li>
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>Door-through-door service as the baseline, not an upgrade</span>
                        </li>
                        <li class="flex items-start gap-3 text-base text-gray-800">
                            <span class="text-gray-900 mt-1.5">&bull;</span>
                            <span>ADA-compliant service across 35+ major metros in 15 states</span>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
