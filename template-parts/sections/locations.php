<?php
/**
 * Template part for displaying the Offices section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Our Offices';
$map_embed = $args['map_embed'] ?? '';
$map_link = $args['map_link'] ?? 'https://maps.google.com';
$locations = $args['locations'] ?? [];

$default_locations = [
    [
        'name' => 'Vancouver',
        'address' => "600 - 1285 W\nBroadway,\nVancouver, British\nColumbia, V6H 3X8"
    ],
    [
        'name' => 'Edmonton',
        'address' => "10060 Jasper Avenue,\nTower 1, Suite 2020\nEdmonton, Alberta,\nT5J 3R8"
    ],
    [
        'name' => 'Toronto',
        'address' => "100 King Street West,\nSuite 5700 Toronto,\nOntario,\nM5X 1C7"
    ],
];

$display_locations = !empty($locations) ? $locations : $default_locations;
?>

<section class="py-16 md:py-16 bg-[#F9F9F9]" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-[2.5rem] font-semibold text-[#1B1B1B] mb-4"><?php echo esc_html($title); ?></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
            <?php if(!empty($map_embed) || !empty($map_link)) : ?>
                <!-- Map Column -->
                <div class="relative col-span-1">
                    <div class="border-2 rounded-lg overflow-hidden" style="border-color: var(--theme-primary);">
                        <?php if ($map_embed) : ?>
                            <iframe
                                src="<?php echo esc_url($map_embed); ?>"
                                width="100%"
                                height="300"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        <?php else : ?>
                            <div class="w-full h-[300px] bg-gray-100 flex items-center justify-center">
                                <p class="text-gray-500">Map not configured</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo esc_url($map_link); ?>" target="_blank" class="absolute top-4 left-4 bg-white text-primary px-3 py-1 rounded text-sm font-semibold flex items-center gap-1 shadow-md hover:shadow-lg transition-shadow">
                        <span>Open in Maps</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>

            <!-- Locations Column -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 self-center <?php echo !empty($map_embed) || !empty($map_link) ? 'col-span-2' : 'col-span-full'; ?>">
                <?php foreach ($display_locations as $location) : 
                    $location_name = $location['name'] ?? '';
                    $location_address = $location['address'] ?? '';
                ?>
                <div>
                    <h3 class="text-2xl font-semibold text-[#1B1B1B] mb-4"><?php echo esc_html($location_name); ?></h3>
                    <address class="prose not-italic text-[#1B1B1B] text-lg leading-relaxed">
                        <?php echo wp_kses_post($location_address); ?>
                    </address>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
