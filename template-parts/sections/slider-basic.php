<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$slides = $args['slides'] ?? [];

$carousel_id = 'slider-basic-' . uniqid();
?>

<section class="bg-white py-16 lg:py-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
        <?php if ($title || $subtitle) : ?>
        <div class="text-center mb-12 lg:mb-16">
            <?php if ($title) : ?>
            <h2 class="text-3xl md:text-4xl lg:text-[2.875rem] font-bold text-gray-900 mb-4">
                <?php echo esc_html($title); ?>
            </h2>
            <?php endif; ?>
            <?php if ($subtitle) : ?>
                <p class="text-lg md:text-[1.5rem] text-gray-700">
                    <?php echo esc_html($subtitle); ?>
                </p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($slides)) : ?>
        <div
            id="<?php echo esc_attr($carousel_id); ?>"
            data-carousel
            class="relative max-w-4xl mx-auto"
            role="region"
            aria-roledescription="carousel"
            aria-label="<?php echo esc_attr($title ?: 'Testimonials'); ?>"
        >
            <div class="flex items-center justify-between gap-6 md:gap-10">
                <button
                    type="button"
                    data-carousel-prev
                    aria-controls="<?php echo esc_attr($carousel_id); ?>"
                    aria-label="Previous slide"
                    class="flex-shrink-0 w-12 h-12 flex items-center justify-center text-gray-900 hover:text-primary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 rounded-full"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <div class="embla__viewport flex-1 overflow-hidden">
                    <div class="flex">
                        <?php foreach ($slides as $index => $slide) :
                            $slide_quote = $slide['content'] ?? '';
                            $slide_author = $slide['heading'] ?? '';
                            $slide_role = $slide['location'] ?? '';
                        ?>
                        <div
                            data-carousel-slide
                            tabindex="-1"
                            class="w-full shrink-0"
                            role="group"
                            aria-roledescription="slide"
                        >
                            <div class="text-center px-4">
                                <?php if ($slide_quote) : ?>
                                    <blockquote class="text-lg md:text-xl text-gray-800 leading-relaxed mb-8">
                                        <?php echo wp_kses_post($slide_quote); ?>
                                    </blockquote>
                                <?php endif; ?>

                                <?php if ($slide_author || $slide_role) : ?>
                                <footer>
                                    <cite class="not-italic">
                                        <?php if ($slide_author) : ?>
                                        <span class="block text-base font-semibold text-gray-900 mb-1"><?php echo esc_html($slide_author); ?></span>
                                        <?php endif; ?>
                                        <?php if ($slide_role) : ?>
                                        <span class="block text-sm text-gray-600"><?php echo esc_html($slide_role); ?></span>
                                        <?php endif; ?>
                                    </cite>
                                </footer>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button
                    type="button"
                    data-carousel-next
                    aria-controls="<?php echo esc_attr($carousel_id); ?>"
                    aria-label="Next slide"
                    class="flex-shrink-0 w-12 h-12 flex items-center justify-center text-gray-900 hover:text-primary transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 rounded-full"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>

            <div
                data-carousel-live-region
                aria-live="polite"
                class="sr-only"
            ></div>
        </div>
        <?php endif; ?>
    </div>
</section>
