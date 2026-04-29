<?php
/**
 * Template part for displaying the "Why Your Organization Needs Accessibility Training" section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$cta_text = $args['cta_text'] ?? '';
$cta_link = $args['cta_link'] ?? [];
?>

<?php if (!empty($items)) : ?>
<section class="my-16 md:my-24 bg-white" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="max-w-5xl mx-auto px-4 md:px-6 lg:px-8">
        <!-- Section Title -->
        <h2 class="text-3xl md:text-[2.5rem] font-semibold text-[#1B1B1B] text-center leading-tight">
            <?php echo esc_html($title); ?>
        </h2>
        
        <!-- Description -->
        <?php if (!empty($description)) : ?>
        <div class="prose text-center md:text-lg mt-8">
            <?php echo wp_kses_post($description); ?>
        </div>
        <?php endif; ?>
        
        <!-- Points List -->
        <ul class="space-y-4 my-8">
            <?php foreach ($items as $point) : 
                $point_title = $point['title'] ?? '';
                $point_description = $point['description'] ?? '';
            ?>
            <?php if (!empty($point_title) || !empty($point_description)) : ?>
                <li class="flex items-start gap-4">
                    <div class="flex-shrink-0 mt-1">
                        <div class="w-6 h-6 rounded-full border-2 border-primary flex items-center justify-center">
                            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-base md:text-lg text-[#1B1B1B] leading-relaxed">
                            <?php if (!empty($point_title)) : ?>
                                <span class="font-semibold"><?php echo esc_html($point_title); ?>:</span> 
                            <?php endif; ?>

                            <?php if (!empty($point_description)) : ?>
                                <span class="text-[#1B1B1B]"><?php echo esc_html($point_description); ?></span>
                            <?php endif; ?>
                        </p>
                    </div>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        
        <!-- CTA Text -->
        <?php if (!empty($cta_text)) : ?>
        <p class="text-lg text-[#1B1B1B] text-center mb-8 leading-relaxed">
            <?php echo esc_html($cta_text); ?>
        </p>
        <?php endif; ?>
        
        <!-- CTA Button -->
        <?php if (!empty($cta_link['url'])) : ?>
        <div class="text-center">
            <a href="<?php echo esc_url($cta_link['url']); ?>" class="inline-block bg-primary text-white px-10 py-4 rounded-full text-lg hover:bg-red-800 transition-colors duration-200">
                <?php echo esc_html($cta_link['title'] ?? 'Contact Us for More Details'); ?>
            </a>
        </div>
        <?php endif; ?>
        
    </div>
</section>
<?php endif; ?>