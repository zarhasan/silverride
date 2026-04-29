<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'Accessibility Consultant Canada!';
$subtitle = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$links = $args['links'] ?? [];
$image = $args['image'] ?? [];
$service_links = $args['service_links'] ?? [];
$default_service_links = [];

?>

<section class="relative bg-white overflow-hidden <?php echo empty($service_links) ? 'border-b-2 border-solid border-gray-700' : ''; ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto py-6 lg:py-8">
        <?php get_template_part('template-parts/breadcrumb'); ?>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Left Content -->
            <div class="max-w-2xl">
                <?php if ($subtitle) : ?>
                    <h1 class="text-[2.5rem] sm:text-7xl font-semibold mb-3 !leading-tight" style="color: var(--theme-primary);">
                        <?php echo wp_kses_post($subtitle); ?>
                    </h1>
                <?php endif; ?>
                
                <?php if(!empty($title)) : ?>
                    <h2 class="text-[2rem] font-semibold text-[#1B1B1B] !leading-tight mb-6">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>
                
                <?php if ($description) : ?>
                    <div class="prose text-lg text-[#1B1B1B] leading-relaxed mb-8 max-w-xl">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
                
                <div class="flex flex-wrap gap-4 mb-8">
                    <?php if (!empty($links)) : ?>
                        <?php foreach ($links as $index => $link_item) : 
                            $link = $link_item['link'] ?? [];
                            if (empty($link) || empty($link['url'])) continue;
                        ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg rounded-full transition-colors duration-200 border-2 border-primary <?php echo $index === 0 ? 'bg-primary text-white' : 'bg-white text-primary'; ?>">
                                <?php echo esc_html($link['title'] ?? 'Button'); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Right Illustration -->
            <div class="relative flex justify-center lg:justify-end">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full max-w-lg lg:max-w-xl xl:max-w-2xl h-auto object-contain" />
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/media/Hero-Section-Illustration-AP-New.svg" alt="SilverRide Canada - Center of Excellence" class="w-full max-w-lg lg:max-w-xl xl:max-w-2xl h-auto object-contain" />
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Bottom Service Links Section -->
    <?php 
    $display_service_links = !empty($service_links) ? $service_links : $default_service_links;
    ?>
    <?php if (!empty($display_service_links)) : ?>
    <div class="container">
        <div class="py-6 lg:py-8 rounded-lg" style="background-color: var(--theme-primary);">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-0 lg:divide-x lg:divide-white/30">
                <?php foreach ($display_service_links as $service_link) : 
                    $link_title = is_array($service_link) ? ($service_link['title'] ?? $service_link) : $service_link;
                    $link_url = is_array($service_link) ? ($service_link['link']['url'] ?? '#') : '#';
                ?>
                <a href="<?php echo esc_url($link_url); ?>" class="flex items-center justify-center text-white text-base lg:text-lg underline underline-offset-4 hover:no-underline transition-all duration-200 py-2 lg:py-0 px-4 text-center">
                    <?php echo esc_html($link_title); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>