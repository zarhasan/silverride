<?php
/**
 * Search results template
 *
 * @package SilverRide
 */

get_header(); ?>

<main id="primary" class="site-main pb-16 sm:pb-24">
    <?php
        global $wp_query;
        $search_query = get_search_query();
        $result_count = (int) $wp_query->found_posts;
        $archive_title = sprintf(
            /* translators: %s: search query */
            esc_html__('Search Results for: %s', 'silverride'),
            $search_query !== '' ? $search_query : '&nbsp;'
        );
    ?>

    <?php
        get_template_part('template-parts/sections/hero-page', null, array(
            'subtitle' => $archive_title,
        ));
    ?>

    <?php if (!empty($search_query)) : ?>
        <!-- Inline Search Bar -->
        <section class="bg-white" aria-label="<?php esc_attr_e('Refine search', 'silverride'); ?>">
            <div class="container mt-8 lg:mt-12">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 lg:gap-4 max-w-3xl">
                    <div class="relative flex-1">
                        <label for="search-page-input" class="sr-only"><?php esc_html_e('Search', 'silverride'); ?></label>
                        <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input
                            id="search-page-input"
                            type="search"
                            name="s"
                            value="<?php echo esc_attr($search_query); ?>"
                            placeholder="<?php esc_attr_e('Search...', 'silverride'); ?>"
                            class="w-full pl-14 pr-5 py-4 text-base sm:text-lg text-gray-900 bg-white border border-gray-300 rounded-full placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-shadow duration-200"
                            aria-label="<?php esc_attr_e('Search query', 'silverride'); ?>"
                        >
                    </div>
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-6 py-3 sm:py-4 text-base font-semibold text-white bg-primary rounded-full hover:opacity-90 transition-opacity duration-200"
                    >
                        <?php esc_html_e('Search', 'silverride'); ?>
                    </button>
                </form>
            </div>
        </section>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <section class="bg-white mt-10 lg:mt-14" aria-label="<?php esc_attr_e('Search results', 'silverride'); ?>">
            <div class="container">
                <p class="text-sm text-gray-600 mb-6" role="status" aria-live="polite">
                    <?php
                        printf(
                            /* translators: %s: number of results */
                            esc_html(_n('%s result found', '%s results found', $result_count, 'silverride')),
                            esc_html(number_format_i18n($result_count))
                        );
                    ?>
                </p>

                <ul class="divide-y divide-gray-200 border-t border-b border-gray-200" role="list">
                    <?php while (have_posts()) : the_post();
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? esc_html($categories[0]->name) : esc_html__('Blog Post', 'silverride');
                        $post_date = get_the_date('M j, Y');
                        $post_title = get_the_title();
                        $post_excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(wp_strip_all_tags(get_the_content()), 30, '…');
                    ?>
                        <li class="py-6 lg:py-8">
                            <article class="flex flex-col md:flex-row md:items-start gap-6">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="block md:w-56 lg:w-64 flex-shrink-0" tabindex="-1" aria-hidden="true">
                                        <div class="aspect-[4/3] overflow-hidden">
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="" class="w-full h-full object-cover">
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center gap-3 mb-3 text-sm">
                                        <span class="text-primary font-medium tracking-wide"><?php echo $category_name; ?></span>
                                        <span class="text-gray-400" aria-hidden="true">&middot;</span>
                                        <time class="text-gray-500" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html($post_date); ?></time>
                                    </div>

                                    <h2 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3 leading-snug">
                                        <a href="<?php echo esc_url(get_permalink()); ?>" class="hover:text-primary transition-colors duration-200">
                                            <?php echo esc_html($post_title); ?>
                                        </a>
                                    </h2>

                                    <p class="text-base leading-relaxed text-gray-700">
                                        <?php echo esc_html($post_excerpt); ?>
                                    </p>

                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="inline-flex items-center mt-4 text-base font-semibold text-primary hover:underline transition-colors duration-200" aria-label="<?php echo esc_attr(sprintf(__('Read more about %s', 'silverride'), $post_title)); ?>">
                                        <?php esc_html_e('Read more', 'silverride'); ?>
                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </section>

    <?php else : ?>
        <?php get_template_part('template-parts/content-none'); ?>
    <?php endif; ?>

    <?php
        if ($wp_query->max_num_pages > 1) {
            echo '<div class="container mt-12">';
            get_template_part('template-parts/pagination');
            echo '</div>';
        }
    ?>
</main>

<?php
get_footer();
