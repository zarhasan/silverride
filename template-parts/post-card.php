<?php
if (!defined('ABSPATH')) {
    exit;
}

$categories = get_the_category();
$category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Blog Post';
?>

<article class="bg-white overflow-hidden flex flex-col">
    <?php if (has_post_thumbnail()) : ?>
    <div class="aspect-[4/3] overflow-hidden mb-4">
        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover">
    </div>
    <?php endif; ?>

    <div class="flex flex-col flex-grow">
        <div class="flex items-center gap-3 text-xs mb-3">
            <span class="text-blue-700 font-medium uppercase tracking-wide"><?php echo $category_name; ?></span>
            <span class="text-gray-400">&middot;</span>
            <time class="text-gray-500"><?php echo get_the_date('M j, Y'); ?></time>
        </div>

        <h2 class="text-xl font-bold text-gray-900 mb-3 leading-snug">
            <a href="<?php echo esc_url(get_permalink()); ?>" class="hover:text-blue-800 transition-colors duration-200">
                <?php echo esc_html(get_the_title()); ?>
            </a>
        </h2>

        <p class="text-sm text-gray-600 leading-relaxed flex-grow">
            <?php echo esc_html(get_the_excerpt()); ?>
        </p>
    </div>
</article>
