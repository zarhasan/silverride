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
                        <div class="lg:col-span-1 bg-alternate-bg rounded-lg p-6">
                            
                        </div>
                    </div>
                </div>

            </article><!-- #post-## -->
        <?php endwhile; ?>
    </div>
</div><!-- #primary -->


<?php

get_footer();
