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
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="container">
                    <!-- Post Header -->
                    <header class="pt-8 md:pt-12 pb-6 md:pb-8">
                        <div class="">
                            <!-- Social Share -->
                            <div class="flex items-center gap-3 mb-6">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center text-[#1B1B1B] hover:opacity-70 transition-opacity" aria-label="Share on Facebook">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center text-[#1B1B1B] hover:opacity-70 transition-opacity" aria-label="Share on X">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center text-[#1B1B1B] hover:opacity-70 transition-opacity" aria-label="Share on LinkedIn">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                </a>
                            </div>

                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()): ?>
                                <div class="mb-6 md:mb-8">
                                    <?php the_post_thumbnail('large', array('class' => 'w-full max-w-md h-auto')); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Title -->
                            <h1 class="text-[2rem] sm:text-[2.5rem] lg:text-[2.875rem] font-bold mb-4 leading-[1.15] text-[#1B1B1B]">
                                <?php the_title(); ?>
                            </h1>

                            <!-- Date -->
                            <div class="flex items-center gap-2 text-sm text-[#1B1B1B] mb-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <?php echo get_the_date('F j, Y'); ?>
                            </div>

                            <!-- Author -->
                            <div class="text-[#1B1B1B] text-sm">
                                By <?php the_author(); ?>
                            </div>
                        </div>
                    </header>

                    <!-- Main Content -->
                    <div class="pb-12 md:pb-20">
                        <div class="entry-content prose text-lg max-w-none">
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

                                foreach ($headings as $index => $heading) {
                                    $text = $heading->textContent;
                                    $text = trim($text);

                                    if (!empty($text)) {
                                        $id = $heading->getAttribute('id');

                                        if (empty($id)) {
                                            $id = 'section-' . ($index + 1);
                                            $heading->setAttribute('id', $id);
                                        }
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
                        <div class="mt-12 md:mt-16">
                            <h2 class="text-2xl md:text-[1.75rem] font-bold mb-6 text-[#1B1B1B]">Frequently Asked Questions</h2>
                            <div class="space-y-4">
                                <?php foreach ($faq_items as $faq) : ?>
                                <div class="border border-gray-200 overflow-hidden">
                                    <button type="button" class="faq-toggle text-lg w-full text-left p-4 flex items-center justify-between bg-white" aria-expanded="false">
                                        <span class="font-semibold text-[#1B1B1B]"><?php echo esc_html($faq['question']); ?></span>
                                        <svg class="faq-icon w-5 h-5 transform rotate-0 transition-transform text-[#1B1B1B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div class="faq-content hidden p-4 bg-[#F9F9F9]">
                                        <div class="text-[#1B1B1B] prose prose-sm"><?php echo wp_kses_post($faq['answer']); ?></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article><!-- #post-## -->
        <?php endwhile; ?>
    </div>
</div><!-- #primary -->

<?php
get_footer();
