<?php
if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];

$title = $args['title'] ?? 'Compliance Management';
$description = $args['description'] ?? '';
$items = $args['items'] ?? [];
$score = (int) $args['score'] ?? 100;
$link = $args['link'] ?? [];
$image = $args['image'] ?? [];
$transcript = $args['transcript'] ?? '';

$default_items = [
    'Information and Communications Standards',
    'Employment Standards',
    'Built-Environment',
    'Transportation Standards',
    'Customer Service Standards',
    'Procurement of Goods, Services and Facilities'
];

$display_items = !empty($items) ? array_column($items, 'item') : $default_items;
?>

<section class="bg-white my-16 lg:my-24 compliance-section" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 lg:gap-16 items-start">
            <div class="rounded-lg lg:col-span-2">
                <div class="relative flex justify-center mb-6">
                    <video 
                        class="compliance-video w-full h-auto rounded-lg" 
                        preload="metadata"
                        poster="<?php echo get_template_directory_uri(); ?>/media/videoframe_2879.png">
                        <source src="<?php echo get_template_directory_uri(); ?>/media/compliance-score-meter.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <?php
                    $play_icon = get_theme_icon_url( 'play' ) ?: get_template_directory_uri() . '/media/play-button.png';
                    $pause_icon = get_theme_icon_url( 'pause' ) ?: get_template_directory_uri() . '/media/pause.png';
                    ?>
                    <button type="button" class="compliance-play-pause absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 inline-flex items-center justify-center transition-colors rounded-lg" aria-label="Play video">
                        <img class="w-20 h-auto" src="<?php echo esc_url( $play_icon ); ?>" alt="Play video">
                        <img class="w-20 h-auto hidden" src="<?php echo esc_url( $pause_icon ); ?>" alt="Pause video">
                    </button>
                </div>

                <?php if ($transcript) : ?>
                <div class="transcript-wrapper">
                    <button 
                        type="button"
                        class="transcript-toggle inline-flex items-center justify-center px-6 py-2 text-base font-medium border-2 rounded-full transition-colors duration-200"
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
            
            <div class="lg:col-span-3">
                <h2 class="text-3xl md:text-[2.5rem] font-semibold text-[#1B1B1B] mb-6">
                    <?php echo esc_html($title); ?>
                </h2>
                
                <?php if ($description) : ?>
                <div class="prose text-lg text-[#1B1B1B] mb-6 leading-relaxed">
                    <?php echo wp_kses_post($description); ?>
                </div>
                <?php endif; ?>
                
                <ul class="space-y-3 mb-8">
                    <?php foreach ($display_items as $item) : ?>
                    <li class="flex items-center text-base text-gray-700">
                        <svg class="text-primary mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
                        <?php echo esc_html($item); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <?php if (!empty($link) && !empty($link['url'])) : ?>
                <a href="<?php echo esc_url($link['url']); ?>" class="inline-flex items-center justify-center px-8 py-3 text-lg text-white rounded-full transition-colors duration-200" style="background-color: var(--theme-primary);">
                    <?php echo esc_html($link['title'] ?? 'Learn More About Compliance Management'); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
