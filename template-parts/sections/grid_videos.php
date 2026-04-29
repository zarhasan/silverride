<?php
/**
 * Template part for displaying the Videos Grid section
 *
 * @package Accessibility_Partners
 */

if (!defined('ABSPATH')) {
    exit;
}

$template_part_name = explode('.', basename(__FILE__))[0];
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$videos = $args['videos'] ?? [];
$columns = $args['columns'] ?? 3;

$grid_cols = $columns == 2 ? 'grid-cols-1 md:grid-cols-2' : 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3';

function get_video_embed_url($url) {
    if (empty($url)) return '';
    
    if (preg_match('/youtube\.com\/watch\?v=([^\&]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1] . '?enablejsapi=1';
    }
    if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1] . '?enablejsapi=1';
    }
    if (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
        return 'https://player.vimeo.com/video/' . $matches[1] . '?api=1';
    }
    return '';
}

function get_video_thumbnail_url($url) {
    if (empty($url)) return '';
    
    if (preg_match('/youtube\.com\/watch\?v=([^\&]+)/', $url, $matches)) {
        return 'https://img.youtube.com/vi/' . $matches[1] . '/maxresdefault.jpg';
    }
    if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
        return 'https://img.youtube.com/vi/' . $matches[1] . '/maxresdefault.jpg';
    }
    return '';
}
?>

<section class="my-16 md:my-24 bg-white videos-grid-section" data-section-id="<?php echo esc_attr($template_part_name); ?>">
    <div class="container">
        <?php if ($title) : ?>
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-semibold text-[#1B1B1B] mb-4"><?php echo esc_html($title); ?></h2>
            <?php if ($description) : ?>
            <p class="text-lg text-[#1B1B1B]"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="grid <?php echo $grid_cols; ?> gap-6">
            <?php foreach ($videos as $index => $video) : ?>
            <?php 
                $video_type = $video['video_type'] ?? 'embed';
                $video_id = 'video-' . $index . '-' . uniqid();
            ?>
            <div class="border-2 rounded-lg overflow-hidden bg-white video-card" style="border-color: var(--theme-primary);" data-video-type="<?php echo esc_attr($video_type); ?>">
                <?php if ($video_type === 'embed') : ?>
                    <?php 
                        $embed_url = get_video_embed_url($video['embed_url'] ?? '');
                        $thumbnail_url = '';
                        
                        if (!empty($video['thumbnail']) && !empty($video['thumbnail']['url'])) {
                            $thumbnail_url = $video['thumbnail']['url'];
                        } else {
                            $thumbnail_url = get_video_thumbnail_url($video['embed_url'] ?? '');
                        }
                        
                        $fallback_thumb = get_template_directory_uri() . '/src/images/video-thumbnail-keyboard.png';
                    ?>
                    <div class="video-embed-wrapper relative aspect-video bg-gray-100 cursor-pointer group" data-embed-url="<?php echo esc_attr($embed_url); ?>" data-video-id="<?php echo esc_attr($video_id); ?>">
                        <?php if ($thumbnail_url) : ?>
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($video['thumbnail']['alt'] ?? $video['title'] ?? 'Video thumbnail'); ?>" class="video-thumbnail w-full h-full object-cover" onerror="this.src='<?php echo esc_url($fallback_thumb); ?>'">
                        <?php else : ?>
                            <img src="<?php echo esc_url($fallback_thumb); ?>" alt="" class="video-thumbnail w-full h-full object-cover">
                        <?php endif; ?>
                        
                        <div class="absolute inset-0 flex items-center justify-center play-button-overlay bg-gradient-to-t from-black/20 to-transparent">
                            <button class="bg-white rounded-full p-1 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 96 96" fill="none" ><path fill-rule="evenodd" class="fill-primary" clip-rule="evenodd" d="M44.3 30.0321C38.984 26.8961 33 31.1641 33 36.8521V59.1481C33 64.8361 38.984 69.1041 44.3 65.9681L63.18 54.8201C68.272 51.8121 68.272 44.1881 63.18 41.1801L44.3 30.0321ZM39 36.8521C39 36.0601 39.384 35.5041 39.84 35.2201C40.0476 35.081 40.2911 35.005 40.541 35.0014C40.7909 34.9979 41.0365 35.0669 41.248 35.2001L60.128 46.3481C60.4061 46.5221 60.6333 46.7666 60.7864 47.0567C60.9396 47.3468 61.0133 47.6723 61 48.0001C61.0133 48.3279 60.9396 48.6534 60.7864 48.9435C60.6333 49.2337 60.4061 49.4781 60.128 49.6521L41.248 60.8001C41.0361 60.9342 40.7897 61.0036 40.539 61.0001C40.2883 60.9965 40.044 60.9201 39.836 60.7801C39.5681 60.6029 39.3504 60.3596 39.204 60.0738C39.0575 59.7879 38.9873 59.4691 39 59.1481V36.8521Z"></path><path class="fill-primary" fill-rule="evenodd" clip-rule="evenodd" d="M48 5C24.252 5 5 24.252 5 48C5 71.748 24.252 91 48 91C71.748 91 91 71.748 91 48C91 24.252 71.748 5 48 5ZM11 48C11 38.187 14.8982 28.7759 21.837 21.837C28.7759 14.8982 38.187 11 48 11C57.813 11 67.2241 14.8982 74.1629 21.837C81.1018 28.7759 85 38.187 85 48C85 57.813 81.1018 67.2241 74.1629 74.1629C67.2241 81.1018 57.813 85 48 85C38.187 85 28.7759 81.1018 21.837 74.1629C14.8982 67.2241 11 57.813 11 48Z"></path></svg>
                            </button>
                        </div>
                        <iframe 
                            class="video-iframe absolute inset-0 w-full h-full hidden" 
                            id="<?php echo esc_attr($video_id); ?>"
                            src="" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                <?php else : ?>
                    <?php 
                        $video_file = $video['video'] ?? [];
                        $video_src = !empty($video_file['url']) ? $video_file['url'] : '';
                        $thumbnail_url = '';
                        
                        if (!empty($video['thumbnail']) && !empty($video['thumbnail']['url'])) {
                            $thumbnail_url = $video['thumbnail']['url'];
                        }
                        
                        $fallback_thumb = get_template_directory_uri() . '/src/images/video-thumbnail-keyboard.png';
                    ?>
                    <div class="video-upload-wrapper relative aspect-video bg-gray-100 cursor-pointer group" data-video-src="<?php echo esc_attr($video_src); ?>">
                        <?php if ($thumbnail_url) : ?>
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($video['thumbnail']['alt'] ?? $video['title'] ?? 'Video thumbnail'); ?>" class="video-thumbnail w-full h-full object-cover">
                        <?php else : ?>
                        <img src="<?php echo esc_url($fallback_thumb); ?>" alt="Video thumbnail" class="video-thumbnail w-full h-full object-cover">
                        <?php endif; ?>
                        <div class="absolute inset-0 flex items-center justify-center play-button-overlay">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center border-2 transition-colors" style="background-color: var(--theme-primary); border-color: var(--theme-primary); opacity: 0.9;" class="group-hover:opacity-100">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                        <video 
                            class="video-element absolute inset-0 w-full h-full hidden" 
                            controls 
                            playsinline>
                            <source src="<?php echo esc_url($video_src); ?>" type="<?php echo esc_attr($video_file['mime_type'] ?? 'video/mp4'); ?>">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php endif; ?>
                <div class="p-4">
                    <p class="text-2xl font-semibold text-[#1B1B1B]"><?php echo esc_html($video['title'] ?? ''); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
