<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Government <span style="color: var(--theme-primary);">Accessibility</span> Services';
$description = $args['description'] ?? '';
$stats = $args['stats'] ?? [];
$link = $args['link'] ?? [];
$image = $args['image'] ?? [];

?>

<section class="bg-[#F9F9F9] py-8 sm:py-16 my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto">
        <h2 class="text-3xl md:text-[2.5rem] font-semibold text-center capitalize tracking-wide mb-12">
            <?php echo $title; ?>
        </h2>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <?php if ($description) : ?>
                    <div class="prose text-lg text-[#1B1B1B] leading-relaxed mb-8">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($stats)) : ?>
                <p class="text-lg text-[#1B1B1B] mb-4">
                    Since 2014, SilverRide has delivered
                </p>
                
                <ul class="space-y-2 mb-8">
                    <?php foreach ($stats as $stat) : ?>
                        <li class="flex items-center text-base text-[#1B1B1B]">
                            <span class="text-[#1B1B1B] mr-2">•</span>
                            <?php echo esc_html($stat['value'] ?? ''); ?> <?php echo esc_html($stat['label'] ?? ''); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                
                <?php if (!empty($link) && !empty($link['url'])) : ?>
                    <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                        <?php echo esc_html($link['title'] ?? 'Explore Government Services | Request a Briefing'); ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <div class="flex justify-center lg:justify-end items-center space-x-4 lg:space-x-8">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full h-auto">
                <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/media/Government-Landing-Pages-Logo-1-1536x838.png" alt="Ontario VOR Record - Supply Ontario" class="w-full h-auto">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>