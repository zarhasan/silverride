<article class="bg-white border-2 p-2 rounded-lg overflow-hidden" style="border-color: var(--theme-primary);">
    <?php if (has_post_thumbnail()) : ?>
    <div class="aspect-video overflow-hidden">
        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover rounded-lg">
    </div>
    <?php endif; ?>
    <div class="pt-4 p-2">
        <time class="text-sm font-medium" style="color: var(--theme-primary);"><?php echo get_the_date('F j, Y'); ?></time>
        <!-- h2 for blog page, and h2 for other pages -->

        <?php if (is_page_template('page-templates/blog.php')) : ?>
            <h2 class="text-xl font-semibold text-[#1B1B1B] mt-2 mb-3 leading-tight">
                <a href="<?php echo esc_url(get_permalink()); ?>" class="hover:underline">
                    <?php echo esc_html(get_the_title()); ?>
                </a>
            </h2>
        <?php else : ?>
            <h3 class="text-xl font-semibold text-[#1B1B1B] mt-2 mb-3 leading-tight">
                <a href="<?php echo esc_url(get_permalink()); ?>" class="hover:underline">
                    <?php echo esc_html(get_the_title()); ?>
                </a>
            </h3>
        <?php endif; ?>

        <p class="text-sm text-[#1B1B1B] mb-4 leading-relaxed">
            <?php echo esc_html(get_the_excerpt()); ?>
        </p>
        <a 
            href="<?php echo esc_url(get_permalink()); ?>" 
            class="inline-block text-base underline" 
            style="color: var(--theme-primary);"
            aria-label="Read more about <?php echo esc_attr(get_the_title()); ?>">
            Read More
        </a>
    </div>
</article>
