<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? 'OUR MISSION';
$quote = $args['quote'] ?? '"Help enhance your organization\'s overall accessibility."';
$description = $args['description'] ?? '';
$services = $args['services'] ?? [];
$link = $args['link'] ?? [];
$display_services = !empty($services) ? $services : [];
?>

<section class="bg-white my-16 lg:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="text-center max-w-4xl mx-auto mb-12">
            <h2 class="text-3xl md:text-[2.5rem] font-semibold uppercase tracking-wide mb-6" style="color: var(--theme-primary);">
                <?php echo esc_html($title); ?>
            </h2>
            
            <blockquote class="text-2xl md:text-3xl font-semibold text-[#1B1B1B] mb-6">
                <?php echo esc_html($quote); ?>
            </blockquote>
            
            <?php if ($description) : ?>
            <p class="text-lg text-[#1B1B1B] leading-relaxed">
                <?php echo wp_kses_post($description); ?>
            </p>
            <?php endif; ?>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 mb-12">
            <?php foreach ($display_services as $service) : 
                $icon = $service['icon'] ?? 'document';
                $image = $service['image'] ?? [];
                $service_title = $service['title'] ?? '';
                $service_desc = $service['description'] ?? '';
                $service_link = $service['link'] ?? [];
            ?>
            <div class="border-2 border-primary rounded-lg p-6">
                <div class="flex items-start mb-4">
                    <?php if (!empty($image['url'])) : ?>
                        <div class="w-16 h-16 rounded-full flex items-center justify-center flex-shrink-0 mr-4" style="background-color: var(--theme-primary);">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? $service_title); ?>" class="w-full h-auto object-contain p-2">
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($service_link['url'])) : ?>
                    <h3 class="text-2xl font-semibold text-[#1B1B1B] pt-2">
                        <a href="<?php echo esc_url($service_link['url']); ?>" class="hover:underline">
                            <?php echo esc_html($service_title); ?>
                        </a>
                    </h3>
                    <?php else : ?>
                    <h3 class="text-2xl font-semibold text-[#1B1B1B] pt-2"><?php echo esc_html($service_title); ?></h3>
                    <?php endif; ?>
                </div>
                <p class="prose text-lg text-[#1B1B1B] leading-relaxed">
                    <?php echo esc_html($service_desc); ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
        
        <?php if (!empty($link) && !empty($link['url'])) : ?>
        <div class="text-center">
            <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                <?php echo esc_html($link['title'] ?? 'Learn More'); ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>