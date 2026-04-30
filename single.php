<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Accessibility_Partners
 */

get_header(); ?>

<!-- Post Content Section -->
<div id="content">
    <div id="primary">
        <?php while (have_posts()): the_post(); ?>
            <!-- Post Hero Section -->
            <section class="mb-8 md:mb-16 py-8 md:py-16 bg-[#f9f6fe]">
                <div class="container">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
                        <!-- Content Column -->
                        <div class="order-2 md:order-1">
                            <!-- Date -->
                            <div class="mb-4">
                                <span class="inline-flex items-center text-sm text-[#1B1B1B]">
                                    <svg class="w-4 h-4 mr-2" style="color: var(--theme-primary);" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    <?php echo get_the_date('F j, Y'); ?>
                                </span>
                            </div>

                            <!-- Title -->
                            <h1 class="text-3xl sm:text-4xl lg:text-[2.5rem] font-semibold mb-4 leading-tight" style="color: var(--theme-primary);">
                                <?php the_title(); ?>
                            </h1>

                            <!-- Author -->
                            <div class="text-[#1B1B1B] italic">
                                By <?php the_author(); ?>
                            </div>
                        </div>

                        <!-- Featured Image Column -->
                        <div class="order-1 md:order-2">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="rounded-2xl overflow-hidden shadow-lg">
                                    <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                                </div>
                            <?php else: ?>
                                <div class="rounded-2xl overflow-hidden shadow-lg">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/src/images/blog-hero-accessible-forms.png' ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="container">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                        <!-- Main Content Column -->
                        <div class="lg:col-span-2">
                            <!-- Table of Contents (On this page) -->
                            <div class="border border-gray-900 mb-8">
                                <button type="button" class="toc-toggle w-full border-b border-gray-900 p-4 flex items-center justify-between text-left" aria-expanded="true">
                                    <h2 class="text-3xl font-semibold text-[#1B1B1B]">On this page</h2>
                                    <svg class="toc-icon w-5 h-5 text-[#1B1B1B] transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <nav class="toc-content transition-all p-4" aria-label="Table of contents">
                                    <?php
                                    $content = get_the_content();
                                    $content = apply_filters('the_content', $content);
                                    $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');

                                    $dom = new DOMDocument();
                                    $dom->encoding = 'UTF-8';
                                    libxml_use_internal_errors(true);
                                    @$dom->loadHTML('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                                    libxml_clear_errors();

                                    $xpath = new DOMXPath($dom);
                                    $headings = $xpath->query('//h2');

                                    $toc_items = array();
                                    $index = 1;

                                    foreach ($headings as $heading) {
                                        $text = $heading->textContent;
                                        $text = trim($text);

                                        if (!empty($text)) {
                                            $id = $heading->getAttribute('id');

                                            if (empty($id)) {
                                                $id = 'section-' . $index;
                                                $heading->setAttribute('id', $id);
                                            }

                                            $toc_items[] = array(
                                                'id' => $id,
                                                'text' => $text
                                            );
                                            $index++;
                                        }
                                    }

                                    if (!empty($toc_items)) {
                                        echo '<ul class="space-y-2 list-disc ml-4" role="list">';
                                        foreach ($toc_items as $item) {
                                            echo '<li role="listitem">';
                                            echo '<a href="#' . esc_attr($item['id']) . '" class="block text-lg underline" style="color: var(--theme-primary);">';
                                            echo esc_html($item['text']);
                                            echo '</a>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        echo '<p class="text-sm text-gray-500" role="status">No section headings found.</p>';
                                    }
                                    ?>
                                </nav>
                            </div>

                            <!-- Entry Content -->
                            <div class="entry-content prose prose-lg max-w-none">
                                <?php
                                    $content = get_the_content();
                                    $content = apply_filters('the_content', $content);
                                    $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');

                                    $dom = new DOMDocument();
                                    $dom->encoding = 'UTF-8';
                                    libxml_use_internal_errors(true);
                                    @$dom->loadHTML('<?xml encoding="UTF-8">' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                                    libxml_clear_errors();

                                    $xpath = new DOMXPath($dom);
                                    $headings = $xpath->query('//h2');

                                    $toc_items = array();
                                    $index = 1;

                                    foreach ($headings as $heading) {
                                        $text = $heading->textContent;
                                        $text = trim($text);

                                        if (!empty($text)) {
                                            $id = $heading->getAttribute('id');

                                            if (empty($id)) {
                                                $id = 'section-' . $index;
                                                $heading->setAttribute('id', $id);
                                            }

                                            $toc_items[] = array(
                                                'id' => $id,
                                                'text' => $text
                                            );
                                            $index++;
                                        }
                                    }

                                    $modified_content = $dom->saveHTML();

                                    echo $modified_content;

                                    wp_link_pages(
                                        array(
                                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'accessibility-partners'),
                                            'after'  => '</div>',
                                        )
                                    );
                                ?>
                            </div><!-- .entry-content -->

                            <!-- FAQ Section -->
                            <?php
								$faq_items = get_field('faq_items');
								if (!empty($faq_items)) :
                            ?>
                            <div class="mt-12 my-8">
                                <h2 class="text-3xl font-semibold mb-6" style="color: var(--theme-primary);">Frequently Asked Questions</h2>
                                <div class="space-y-4">
                                    <?php foreach ($faq_items as $faq) : ?>
                                    <div class="border border-gray-200 overflow-hidden">
                                        <button type="button" class="faq-toggle text-lg text-primary w-full text-left p-4 flex items-center justify-between bg-white" aria-expanded="false">
                                            <span class="font-semibold"><?php echo esc_html($faq['question']); ?></span>
                                            <svg class="faq-icon w-5 h-5 transform rotate-0 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div class="faq-content hidden p-4 bg-[#F9F9F9]">
                                            <p class="text-[#1B1B1B]"><?php echo wp_kses_post($faq['answer']); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- Sidebar Column -->
                        <div class="lg:col-span-1 bg-[#f9f6fe] rounded-lg p-6">
                            <!-- Share Section -->
                            <div class="mb-8">
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="text-sm text-[#1B1B1B]">Share:</span>
                                    <div class="flex gap-2">
                                        <a href="#" class="share-button w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white hover:bg-primary transition-colors" data-share="facebook" aria-label="Share on Facebook">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="share-button w-8 h-8 rounded-full bg-sky-500 flex items-center justify-center text-white hover:bg-sky-600 transition-colors" data-share="twitter" aria-label="Share on Twitter">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="share-button w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white hover:bg-primary transition-colors" data-share="linkedin" aria-label="Share on LinkedIn">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="share-button w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white hover:bg-gray-700 transition-colors" data-share="email" aria-label="Share via Email">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Popular Blogs Section -->
                            <div class="">
                                <h3 class="text-3xl font-semibold text-[#1B1B1B] mb-6">Our Popular Blogs</h3>

                                <div class="space-y-4">
                                    <?php
                                    $popular_posts = new WP_Query(array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 4,
                                        'post_status' => 'publish',
                                        'orderby' => 'comment_count',
                                        'order' => 'DESC',
                                        'post__not_in' => array(get_the_ID()),
                                    ));

                                    if ($popular_posts->have_posts()) :
                                        while ($popular_posts->have_posts()) : $popular_posts->the_post();
                                    ?>
									<article class="bg-white border-2 p-2 rounded-lg overflow-hidden" style="border-color: var(--theme-primary);">
										<?php if (has_post_thumbnail()) : ?>
										<div class="aspect-video overflow-hidden">
											<img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover rounded-lg">
										</div>
										<?php endif; ?>
										<div class="p-5">
											<time class="text-sm font-medium" style="color: var(--theme-primary);"><?php echo get_the_date('F j, Y'); ?></time>
											<h3 class="text-lg font-semibold text-[#1B1B1B] mt-2 mb-3 leading-tight">
												<?php echo esc_html(get_the_title()); ?>
											</h3>
											<p class="text-base text-[#1B1B1B] mb-4 leading-relaxed">
												<?php echo esc_html(get_the_excerpt()); ?>
											</p>
											<a href="<?php echo esc_url(get_permalink()); ?>" class="inline-block text-base underline" style="color: var(--theme-primary);">
												Read More
											</a>
										</div>
									</article>

                                    <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    else :
                                    ?>
                                    <p class="text-gray-500 text-sm">No popular posts found.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </article><!-- #post-## -->
        <?php endwhile; ?>
    </div>
</div><!-- #primary -->


<?php

get_footer();
