<?php
/**
 * Template part for displaying an accessible Embla Carousel section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$slides = $args['slides'] ?? [];

$carousel_id = uniqid('carousel-');
$total_slides = count($slides);
?>

<section class="my-16 md:my-24" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <?php if ($title) : ?>
            <h2 class="text-3xl md:text-[2.5rem] font-semibold mb-8 md:mb-12 text-center" style="color: var(--theme-primary);">
                <?php echo esc_html($title); ?>
            </h2>
        <?php endif; ?>

        <style>
            #<?php echo esc_attr($carousel_id); ?> .carousel-btn {
                background-color: var(--theme-primary);
            }
            #<?php echo esc_attr($carousel_id); ?> .carousel-btn:hover,
            #<?php echo esc_attr($carousel_id); ?> .carousel-btn:focus {
                background-color: var(--theme-primary-dark, #991B1B);
            }
            #<?php echo esc_attr($carousel_id); ?> .carousel-control {
                border-color: var(--theme-primary);
                color: var(--theme-primary);
            }
            #<?php echo esc_attr($carousel_id); ?> .carousel-control:hover,
            #<?php echo esc_attr($carousel_id); ?> .carousel-control:focus {
                background-color: var(--theme-primary-light, #FFF1F2);
            }
            #<?php echo esc_attr($carousel_id); ?> .carousel-dot[aria-current="true"] {
                background-color: var(--theme-primary) !important;
            }
        </style>

        <div
            class="embla relative"
            id="<?php echo esc_attr($carousel_id); ?>"
            role="region"
            aria-roledescription="carousel"
            aria-label="<?php echo esc_attr($title); ?>"
            data-carousel
        >
            <!-- Live region for screen reader announcements -->
            <div class="sr-only" aria-live="polite" aria-atomic="false" data-carousel-live-region>
                Slide 1 of <?php echo intval($total_slides); ?>
            </div>

            <div class="embla__viewport overflow-hidden bg-gray-50 border border-gray-200">
                <div class="embla__container flex">
                    <?php foreach ($slides as $index => $slide) : ?>
                        <div
                            class="embla__slide flex-[0_0_100%] min-w-0 text-center"
                            role="group"
                            aria-roledescription="slide"
                            aria-label="<?php echo sprintf(esc_attr__('%1$d of %2$d', 'silverride'), $index + 1, $total_slides); ?>"
                            data-carousel-slide
                            tabindex="-1"
                        >
                            <div class="p-8 md:p-16 gap-8 items-center">
                                <div>
                                    <h2 class="text-2xl md:text-3xl font-semibold mb-4 text-primary">
                                        <?php echo esc_html($slide['heading'] ?? 'Slide ' . ($index + 1)); ?>
                                    </h2>
                                    <div class="text-base md:text-lg leading-relaxed font-medium mt-4">
                                       <?php echo wp_kses_post($slide['content'] ?? ''); ?>
                                    </div>
                                    <?php
                                    $cta_url    = '';
                                    $cta_text   = '';
                                    $cta_target = '';

                                    if ( ! empty( $slide['link'] ) && is_array( $slide['link'] ) ) {
                                        $cta_url    = $slide['link']['url'] ?? '';
                                        $cta_text   = $slide['link']['title'] ?? 'Learn More';
                                        $cta_target = ! empty( $slide['link']['target'] ) ? ' target="' . esc_attr( $slide['link']['target'] ) . '"' : '';
                                    } elseif ( ! empty( $slide['cta_url'] ) ) {
                                        $cta_url  = $slide['cta_url'];
                                        $cta_text = $slide['cta_text'] ?? 'Learn More';
                                    }

                                    if ( $cta_url ) :
                                    ?>
                                        <a href="<?php echo esc_url( $cta_url ); ?>" class="carousel-btn inline-block mt-6 px-6 py-3 rounded text-white font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B91C3C]"<?php echo $cta_target; ?>>
                                            <?php echo esc_html( $cta_text ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Controls -->
            <div class="flex items-center justify-center gap-4 mt-8 flex-wrap">
                <button
                    type="button"
                    class="carousel-control embla__prev inline-flex items-center justify-center w-12 h-12 rounded-full border-2 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B91C3C]"
                    aria-controls="<?php echo esc_attr($carousel_id); ?>"
                    aria-label="<?php esc_attr_e('Previous slide', 'silverride'); ?>"
                    data-carousel-prev
                >
                    <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <!-- Pagination dots -->
                <div class="flex items-center gap-2" role="tablist" aria-label="<?php esc_attr_e('Slide pages', 'silverride'); ?>">
                    <?php for ($i = 0; $i < $total_slides; $i++) : ?>
                        <button
                            type="button"
                            class="carousel-dot embla__dot w-3 h-3 rounded-full bg-gray-300 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B91C3C]"
                            aria-label="<?php printf(esc_attr__('Go to slide %d', 'silverride'), $i + 1); ?>"
                            aria-controls="<?php echo esc_attr($carousel_id); ?>"
                            data-carousel-dot
                            data-index="<?php echo intval($i); ?>"
                            <?php echo $i === 0 ? 'aria-current="true"' : ''; ?>
                        ></button>
                    <?php endfor; ?>
                </div>

                <button
                    type="button"
                    class="carousel-control embla__next inline-flex items-center justify-center w-12 h-12 rounded-full border-2 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B91C3C]"
                    aria-controls="<?php echo esc_attr($carousel_id); ?>"
                    aria-label="<?php esc_attr_e('Next slide', 'silverride'); ?>"
                    data-carousel-next
                >
                    <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>

                <!-- Play/Pause -->
                <button
                    type="button"
                    class="carousel-control embla__play-pause inline-flex items-center justify-center w-12 h-12 rounded-full border-2 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B91C3C] ml-2"
                    aria-controls="<?php echo esc_attr($carousel_id); ?>"
                    aria-label="<?php esc_attr_e('Pause carousel', 'silverride'); ?>"
                    data-carousel-play-pause
                >
                    <svg class="embla__play-icon hidden" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="5 3 19 12 5 21 5 3"></polygon>
                    </svg>
                    <svg class="embla__pause-icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <rect x="6" y="4" width="4" height="16"></rect>
                        <rect x="14" y="4" width="4" height="16"></rect>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
