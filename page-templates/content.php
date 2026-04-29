<?php
/**
 * Template Name: Content
 *
 */

get_header(); 

?>

<section class="container grid grid-cols-2">
    <div class="prose">
        <?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                the_content();
            endwhile;
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>