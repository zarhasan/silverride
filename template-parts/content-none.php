<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package AccessibleMinds
 */
?>

<section class="no-results not-found bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
    <header class="page-header mb-6">
        <h1 class="page-title text-2xl font-semibold text-[#1B1B1B] mb-4">
            <?php esc_html_e('Nothing here', 'silverride'); ?>
        </h1>
    </header>

    <div class="page-content text-[#1B1B1B]">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p class="mb-6">
                <?php
                printf(
                    wp_kses(
                        /* translators: 1: link to WP admin new post page. */
                        __('Ready to publish your first post? <a href="%1$s" class="text-primary-600 hover:text-primary-700 underline">Get started here</a>.', 'silverride'),
                        array(
                            'a' => array(
                                'href' => array(),
                                'class' => array(),
                            ),
                        )
                    ),
                    esc_url(admin_url('post-new.php'))
                );
                ?>
            </p>
        <?php else : ?>
            <p class="mb-6">
                <?php esc_html_e('It seems we can\'t find what you\'re looking for.', 'silverride'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>
