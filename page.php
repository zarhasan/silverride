<?php

get_header(); ?>

<div id="content">
	<div id="primary" class="content-area container py-16">
		<?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="entry-content prose !max-w-none">
                    <?php
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amwordpress' ),
                                'after'  => '</div>',
                            )
                        );
                    ?>
                </div><!-- .entry-content -->

            </article><!-- #post-## -->
        <?php endwhile; ?>
	</div><!-- #primary -->
</div><!-- .container -->

<?php
get_footer();
