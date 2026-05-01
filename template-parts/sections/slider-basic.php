<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? 'In Their Words.';
$subtitle = $args['subtitle'] ?? 'Real drivers. Real riders. Real reasons they choose SilverRide.';
$slides = $args['slides'] ?? [];

// Default slides if none provided
if (empty($slides)) {
    $slides = [
        [
            'quote' => "I've been driving for SilverRide for just over a year and I like what I do. The company is very focused on making sure its drivers feel like part of the team. Highly recommended.",
            'author' => 'Jackelyn from Orlando',
            'role' => 'Driver Since 2021',
        ],
    ];
}

$total_slides = count($slides);
?>

<section class="bg-white py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <!-- Header -->
        <div class="text-center mb-12 lg:mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                <?php echo esc_html($title); ?>
            </h2>
            <?php if ($subtitle) : ?>
                <p class="text-lg md:text-xl text-gray-700">
                    <?php echo esc_html($subtitle); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Testimonial Slider -->
        <div class="relative max-w-4xl mx-auto" role="region" aria-roledescription="carousel" aria-label="Testimonials">
            <div class="flex items-center justify-between gap-6 md:gap-10">
                <!-- Prev Button -->
                <button type="button" class="flex-shrink-0 w-12 h-12 flex items-center justify-center text-gray-900 hover:text-blue-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 rounded-full" aria-label="Previous testimonial">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <!-- Slides -->
                <div class="flex-1 text-center">
                    <?php foreach ($slides as $index => $slide) :
                        $is_active = $index === 0;
                    ?>
                        <div class="<?php echo $is_active ? 'block' : 'hidden'; ?>" role="group" aria-roledescription="slide" aria-label="<?php echo sprintf(esc_attr__('%1$d of %2$d', 'silverride'), $index + 1, $total_slides); ?>">
                            <blockquote class="text-lg md:text-xl lg:text-2xl text-gray-800 leading-relaxed mb-8">
                                &ldquo;<?php echo esc_html($slide['quote'] ?? ''); ?>&rdquo;
                            </blockquote>

                            <footer>
                                <cite class="not-italic">
                                    <span class="block text-base font-bold text-gray-900 mb-1"><?php echo esc_html($slide['author'] ?? ''); ?></span>
                                    <span class="block text-sm text-gray-600"><?php echo esc_html($slide['role'] ?? ''); ?></span>
                                </cite>
                            </footer>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Next Button -->
                <button type="button" class="flex-shrink-0 w-12 h-12 flex items-center justify-center text-gray-900 hover:text-blue-800 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:ring-offset-2 rounded-full" aria-label="Next testimonial">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
