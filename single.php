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
                <div class="container !max-w-5xl">
                    <!-- Post Header -->
                    <header class="pt-8 md:pt-12 pb-6 md:pb-8">
                        <div>
                            <div class="flex justify-start items-start flex-col lg:flex-row">
                                <!-- Social Share -->
                                <div class="flex items-start justify-start lg:flex-col gap-4 mb-6 lg:w-28 lg:-ml-28">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center text-[#1B1B1B] hover:opacity-70 transition-opacity" aria-label="Share on Facebook">
                                        <svg class="w-auto h-auto max-h-5 max-w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 24" fill="none">
                                            <path d="M8.125 0C6.83207 0 5.59209 0.517206 4.67786 1.43784C3.76362 2.35847 3.25 3.60712 3.25 4.90909V8.72727H0.541667C0.398008 8.72727 0.260233 8.78474 0.158651 8.88703C0.0570684 8.98933 0 9.12806 0 9.27273V13.6364C0 13.781 0.0570684 13.9198 0.158651 14.0221C0.260233 14.1244 0.398008 14.1818 0.541667 14.1818H3.25V23.4545C3.25 23.5992 3.30707 23.7379 3.40865 23.8402C3.51023 23.9425 3.64801 24 3.79167 24H8.125C8.26866 24 8.40644 23.9425 8.50802 23.8402C8.6096 23.7379 8.66667 23.5992 8.66667 23.4545V14.1818H11.375C11.4958 14.1818 11.6132 14.1411 11.7084 14.0662C11.8036 13.9912 11.8712 13.8864 11.9004 13.7684L12.9838 9.40473C13.0037 9.32434 13.0051 9.24044 12.988 9.15939C12.9709 9.07835 12.9357 9.00229 12.8851 8.93699C12.8344 8.87169 12.7697 8.81887 12.6957 8.78253C12.6218 8.74619 12.5406 8.7273 12.4583 8.72727H8.66667V7.09091C8.66667 6.65692 8.83787 6.2407 9.14262 5.93383C9.44736 5.62695 9.86069 5.45455 10.2917 5.45455H12.4583C12.602 5.45455 12.7398 5.39708 12.8414 5.29479C12.9429 5.19249 13 5.05375 13 4.90909V0.545455C13 0.400791 12.9429 0.262052 12.8414 0.15976C12.7398 0.0574673 12.602 0 12.4583 0H8.125Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center text-[#1B1B1B] hover:opacity-70 transition-opacity" aria-label="Share on X">
                                        <svg class="w-auto h-auto max-h-5 max-w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                            <path d="M18.7599 1.36963H22.3681L14.4872 10.3749L23.7583 22.6306H16.5009L10.8126 15.1995L4.31161 22.6306H0.698256L9.126 12.9967L0.238281 1.36963H7.67964L12.816 8.16191L18.7599 1.36963ZM17.4924 20.4739H19.4907L6.59103 3.41396H4.44449L17.4924 20.4739Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="w-8 h-8 flex items-center justify-center text-[#1B1B1B] hover:opacity-70 transition-opacity" aria-label="Share on LinkedIn">
                                        <svg class="w-auto h-auto max-h-5 max-w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 6C4.16304 6 4.79893 5.73661 5.26777 5.26777C5.73661 4.79893 6 4.16304 6 3.5C6 2.83696 5.73661 2.20107 5.26777 1.73223C4.79893 1.26339 4.16304 1 3.5 1C2.83696 1 2.20107 1.26339 1.73223 1.73223C1.26339 2.20107 1 2.83696 1 3.5C1 4.16304 1.26339 4.79893 1.73223 5.26777C2.20107 5.73661 2.83696 6 3.5 6ZM6 23V8H1V23H6ZM8 8H12.5V9.946C13.216 9.005 14.746 8 17.5 8C21.83 8 23 12.32 23 15V23H18V15C18 14 17.5 12 15.5 12C14.08 12 13.08 13.008 12.5 13.951V23H8V8Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </div>

                                <!-- Featured Image -->
                                <div class="mb-6 md:mb-12">
                                    <img class="h-64 w-auto" src="<?php echo get_template_directory_uri(); ?>/media/featured-image.png" alt="">
                                </div>
                            </div>

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
    get_template_part('template-parts/sections/call_to_action', 'default', array(
        'title' => 'Still have questions?',
        'description' => 'Get in touch with us.',
        'link' => array(
            'url' => '/request-demo/',
            'title' => 'Contact now'
        )
    ));
?>

<?php
get_footer();
