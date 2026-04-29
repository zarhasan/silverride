<?php
/**
 * The main template file
 *
 * @package AccessibleMinds
 */

get_header(); ?>

<main id="primary" class="site-main pb-16 sm:pb-24">
    <?php
        $archive_title = 'Archive';

        if (is_category()) {
            $archive_title = get_the_archive_title();
        } elseif (is_tag()) {
            $archive_title = get_the_archive_title();
        } elseif (is_author()) {
            $archive_title = get_the_archive_title();
        } elseif (is_date()) {
            $archive_title = get_the_archive_title();
        } elseif (is_post_type_archive()) {
            $archive_title = post_type_archive_title('', false);
        } elseif (is_tax()) {
            $archive_title = single_term_title('', false);
        } else if(is_home()) {
            $archive_title = __('Latest Blogs', 'RedOxbird');
        } else if(is_search()) {
            $archive_title = sprintf(esc_html__('Search Results for: %s', 'RedOxbird'), get_search_query());
        } else {
            $archive_title = 'Archive';
        }
    ?>

    <?php 
        get_template_part( 'template-parts/sections/hero-page', null, array( 
            'subtitle' => $archive_title,
        )); 
    ?>


    <?php if (have_posts()): ?>
        <div class="container grid lg:grid-cols-3 gap-8 mt-16">
            <?php 
                global $wp_query;

                while (have_posts()): the_post();

                get_template_part('template-parts/post-card');

                endwhile;
            ?>
        </div>

    <?php else: ?>
        <?php get_template_part('template-parts/content/none'); ?>
    <?php endif; ?>

    <?php 
        if($wp_query->max_num_pages > 1) {
            get_template_part('template-parts/pagination'); 
        }
    ?>
</main>

<?php
get_footer();
