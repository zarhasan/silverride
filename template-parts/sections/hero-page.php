<?php
/**
 * Template part for displaying the Hero Page section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$links = $args['links'] ?? [];
$image = $args['image'] ?? [];
$media_type = $args['media_type'] ?? 'image';
$video = $args['video'] ?? [];
$transcript = $args['transcript'] ?? '';
?>

<section class="bg-white border-b-2 border-solid border-gray-700 py-8 sm:py-12" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 md:gap-12">
            <!-- Content Column -->
            <div class="order-1">
                <?php get_template_part('template-parts/breadcrumb'); ?>

                <?php if (!empty($subtitle)) : ?>
                    <h1 class="text-4xl sm:text-[3rem] font-semibold !leading-tight mb-3" style="color: var(--theme-primary);">
                        <?php echo wp_kses_post($subtitle); ?>
                    </h1>
                <?php endif; ?>
                
                <?php if (!empty($title)) : ?>
                    <h2 class="text-3xl lg:text-[2.5rem] text-[#1B1B1B] font-semibold mb-6 !leading-tight">
                        <?php echo wp_kses_post($title); ?>
                    </h2>
                <?php endif; ?>
                
                <?php if (!empty($description)) : ?>
                    <div class="prose text-lg mb-8 leading-relaxed">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Media Column (Image or Video) -->
            <div class="order-2 self-center">
                <?php if ($media_type === 'video' && !empty($video)) : ?>
                <div class="hero-page-video-wrapper relative">
                    <video 
                        class="hero-page-video w-full h-auto rounded-lg" 
                        preload="metadata"
                        <?php echo !empty($image) && !empty($image['url']) ? 'poster="' . esc_url($image['url']) . '"' : ''; ?>>
                        <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type'] ?? 'video/mp4'); ?>">
                        Your browser does not support the video tag.
                    </video>
                    <?php
                    $play_icon = get_theme_icon_url( 'play' ) ?: get_template_directory_uri() . '/media/play-button.png';
                    $pause_icon = get_theme_icon_url( 'pause' ) ?: get_template_directory_uri() . '/media/pause.png';
                    ?>
                    <button type="button" class="hero-page-play-pause absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 inline-flex items-center justify-center transition-colors rounded-lg" aria-label="Play video">
                        <img class="w-20 h-auto" src="<?php echo esc_url( $play_icon ); ?>" alt="Play video">
                        <img class="w-20 h-auto hidden" src="<?php echo esc_url( $pause_icon ); ?>" alt="Pause video">
                    </button>
                    
                    <?php if ($transcript) : ?>
                    <div class="transcript-wrapper mt-4">
                        <button 
                            type="button"
                            class="transcript-toggle inline-flex items-center justify-center px-6 py-2 text-lg border-2 rounded-full transition-colors duration-200"
                            style="color: var(--theme-primary); border-color: var(--theme-primary);"
                            aria-expanded="false">
                            <span class="transcript-label">Show Transcript</span>
                            <svg class="transcript-chevron-down w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <svg class="transcript-chevron-up w-4 h-4 ml-2 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                        </button>
                        
                        <div class="transcript-content hidden mt-4 p-8 border border-gray-300 bg-[#F9F9F9] rounded-lg">
                            <div class="prose prose-sm max-w-none">
                                <?php echo wp_kses_post($transcript); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php elseif (!empty($image) && !empty($image['url'])) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-auto h-auto max-w-full max-h-[35rem] mx-auto rounded-lg">
                <?php endif; ?>
            </div>
        </div>

        <div class="flex justify-center items-center mt-8">
            <!-- CTA Button -->
            <?php if (!empty($links) && isset($links[0]['link'])) : 
                $link = $links[0]['link'];
            ?>
                <a href="<?php echo esc_url($link['url'] ?? '#'); ?>" class="inline-block text-white px-8 py-3 rounded-full transition-colors text-lg" style="background-color: var(--theme-primary);">
                    <?php echo esc_html($link['title'] ?? 'Contact Us'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>