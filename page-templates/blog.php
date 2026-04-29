<?php
/**
 * Template Name: Blog
 *
 */

get_header();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$page_title = get_the_title();
$page_description = get_field('blog_description') ?: '';

$blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'paged' => $paged,
);

$blog_query = new WP_Query($blog_args);
?>

<section class="bg-white my-16 lg:my-24">
    <div class="container">
        <h1 class="text-3xl lg:text-[3rem] font-semibold text-center text-[#1B1B1B] mt-40 mb-12">
            <?php echo esc_html($page_title); ?>
        </h1>

        <?php if ($page_description) : ?>
            <p class="text-center text-lg text-[#1B1B1B] mb-8 max-w-3xl mx-auto">
                <?php echo wp_kses_post($page_description); ?>
            </p>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <?php if ($blog_query->have_posts()) : ?>
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <?php get_template_part('template-parts/post-card'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="text-center col-span-3 text-[#1B1B1B]">No posts found.</p>
            <?php endif; ?>
        </div>

        <?php
        if ($blog_query->max_num_pages > 1) :
            $current = max(1, (int) $blog_query->get('paged'));
            $total = $blog_query->max_num_pages;
            $base = get_permalink() . 'page/%#%';
            ?>
            <nav class="flex justify-center items-center gap-2 mt-10" aria-label="Blog pagination">
                <?php if ($current > 1) : ?>
                    <a href="<?php echo esc_url(str_replace('%#%', $current - 1, $base)); ?>" class="inline-flex items-center justify-center min-w-[44px] h-10 px-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-[#F9F9F9] transition-colors">
                        &laquo; Previous
                    </a>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $total; $i++) : ?>
                    <?php if ($i == $current) : ?>
                        <span class="inline-flex items-center justify-center min-w-[44px] h-10 px-3 text-base font-medium text-white rounded-lg" style="background-color: var(--theme-primary);">
                            <?php echo esc_html($i); ?>
                        </span>
                    <?php else : ?>
                        <a href="<?php echo esc_url(str_replace('%#%', $i, $base)); ?>" class="inline-flex items-center justify-center min-w-[44px] h-10 px-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-[#F9F9F9] transition-colors">
                            <?php echo esc_html($i); ?>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
                
                <?php if ($current < $total) : ?>
                    <a href="<?php echo esc_url(str_replace('%#%', $current + 1, $base)); ?>" class="inline-flex items-center justify-center min-w-[44px] h-10 px-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-[#F9F9F9] transition-colors">
                        Next &raquo;
                    </a>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    </div>
</section>

<?php get_footer();