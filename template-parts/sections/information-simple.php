<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$label = $args['subtitle'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? [];
$hide_on = $args['hide_on'] ?? [];
$hide_classes = [];
if (in_array('mobile', $hide_on)) $hide_classes[] = 'hidden !sm:block';
if (in_array('tablet', $hide_on)) $hide_classes[] = 'md:hidden';
if (in_array('desktop', $hide_on)) $hide_classes[] = 'lg:hidden';
$hide_class = implode(' ', $hide_classes);
?>

<section class="bg-primary py-16 lg:py-24 overflow-hidden <?php echo esc_attr($hide_class); ?>" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Left Content -->
            <div>
                <span class="text-[1.375rem] font-bold text-white uppercase tracking-wide mb-4 block">
                    <?php echo esc_html($label); ?>
                </span>

                <h2 class="text-3xl lg:text-[1.625rem] font-bold text-white leading-tight mb-8">
                    <?php echo esc_html($title); ?>
                </h2>

                <?php if ($description) : ?>
                    <div class="prose text-lg text-blue-100 leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php else : ?>
                    <div class="text-lg text-blue-100 leading-relaxed">
                        Rides with SilverRide can be scheduled online, by phone, or through your local transit agency or PACE care team. Every ride comes with door-to-door (for paratransit riders) or door-through-door assistance (for PACE participants), an experienced and credentialed driver, and a pace that respects each rider's needs and comfort. Help, safety information, and incident reporting all live one click away, anytime you need them.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Right Illustration -->
            <div class="flex justify-center">
                <?php if (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? 'Illustration of an accessible vehicle'); ?>" class="w-full max-w-md h-auto object-contain">
                <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/media/information-3.png'); ?>" alt="" class="w-full max-w-md h-auto object-contain">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
