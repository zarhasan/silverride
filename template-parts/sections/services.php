<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];


$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$features = $args['features'] ?? [];
$link = $args['link'] ?? [];
$image = $args['image'] ?? [];

$default_features = [
    'Quick Strike Gap Analysis',
    'Accessibility Assessment Report (AAR)',
    'Blueprint Accessibility Plan',
    'Policies, Procedures, Tools and Training',
    'Compliance Implementation',
    'Continuous Improvement and Reporting'
];

$display_features = !empty($features) ? array_column($features, 'feature') : $default_features;
?>

<section class="bg-[#F9F9F9] my-16 lg:my-24 py-8 lg:py-16" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="relative">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full mx-auto h-auto">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/media/Frame-1000008071-_1_.webp" alt="Accessibility Before and After - Laws and Regulations" class="w-full mx-auto h-auto">
                <?php endif; ?>
            </div>
            
            <div>
                <?php if ($title) : ?>
                    <h2 class="text-3xl md:text-[2.5rem] font-semibold text-[#1B1B1B] mb-6 leading-tight">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php endif; ?>
                
                <?php if ($description) : ?>
                    <p class="text-lg text-[#1B1B1B] mb-8 leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </p>
                <?php endif; ?>
                
                <ul class="space-y-4 my-8">
                    <?php foreach ($display_features as $feature) : ?>
                    <li class="flex items-center text-base text-gray-700">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" style="color: var(--theme-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke-width="2"></circle>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l2 2 4-4"></path>
                        </svg>
                        <?php echo esc_html($feature); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <?php if (!empty($link) && !empty($link['url'])) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                        <?php echo esc_html($link['title'] ?? 'Discover More Services'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>