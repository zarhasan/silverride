<?php
/**
 * 404 Template - Page Not Found
 * Fully accessible with semantic HTML and native WordPress functions
 */
get_header();

$alternate_bg = function_exists('silverride_alternate_bg_color') ? silverride_alternate_bg_color() : '#FCF3F5';
?>

<main id="main-content" class="error-404 not-found bg-[#F9F9F9] min-h-screen flex flex-col" role="main" aria-label="<?php esc_attr_e('Page not found', 'silverride'); ?>">
    
    <section class="error-hero py-16 md:py-24 flex-grow flex items-center">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                
                <div class="error-code mb-6" aria-hidden="true">
                    <span class="inline-block text-[120px] md:text-[180px] font-semibold text-primary leading-none">404</span>
                </div>

                <header class="page-header mb-8">
                    <h1 class="text-4xl md:text-[2.5rem] lg:text-6xl font-semibold text-[#1B1B1B] mb-4" id="error-title">
                        <?php esc_html_e('Page Not Found', 'silverride'); ?>
                    </h1>
                    <p class="text-lg md:text-xl text-[#1B1B1B] max-w-xl mx-auto">
                        <?php 
                        $requested = esc_html( $_SERVER['REQUEST_URI'] ?? '' );
                        printf(
                            esc_html__( 'Sorry, we couldn\'t find the page you were looking for: %s', 'silverride' ),
                            '<code class="bg-gray-100 px-2 py-1 rounded text-sm">' . esc_html( $requested ) . '</code>'
                        );
                        ?>
                    </p>
                </header>

                <div class="error-actions mb-10">
                    <div class="flex flex-col sm:flex-row sm:justify-center gap-4">
                        <a href="<?php echo esc_url( home_url('/') ); ?>" 
                           class="button--primary inline-flex justify-center items-center px-8 py-3 rounded-full font-semibold text-center"
                           aria-label="<?php esc_attr_e('Return to homepage', 'silverride'); ?>">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <?php esc_html_e('Return to Home', 'silverride'); ?>
                        </a>

                        <a href="<?php echo esc_url( home_url('/contact-us') ); ?>"
                           class="button--primary-outline inline-flex justify-center items-center px-8 py-3 rounded-full font-semibold border-2 border-primary text-primary transition-colors text-center"
                           data-hover-bg="<?php echo esc_attr($alternate_bg); ?>"
                           aria-label="<?php esc_attr_e('Contact us for help', 'silverride'); ?>">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <?php esc_html_e('Contact Us', 'silverride'); ?>
                        </a>
                    </div>
                </div>

                <aside class="error-search" aria-labelledby="search-heading">
                    <h2 id="search-heading" class="sr-only"><?php esc_html_e('Search this website', 'silverride'); ?></h2>
                    
                    <div class="max-w-md mx-auto">
                        <form role="search" method="get" action="<?php echo esc_url( home_url('/') ); ?>" class="flex gap-2">
                            <label for="error-search-input" class="sr-only"><?php esc_html_e('Search for pages or content', 'silverride'); ?></label>
                            <input 
                                type="search" 
                                id="error-search-input" 
                                name="s" 
                                placeholder="<?php esc_attr_e('Search the site...', 'silverride'); ?>"
                                class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary outline-none"
                                aria-describedby="search-desc"
                            />
                            <button 
                                type="submit"
                                class="button--primary px-6 py-3 rounded-lg font-semibold"
                                aria-label="<?php esc_attr_e('Submit search', 'silverride'); ?>">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </form>
                        <p id="search-desc" class="sr-only"><?php esc_html_e('Enter keywords to search for related pages or content on this website.', 'silverride'); ?></p>
                    </div>
                </aside>

            </div>
        </div>
    </section>

    <section class="error-sitemap py-12 md:py-16 bg-white border-t border-gray-200">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-semibold text-[#1B1B1B] mb-8 text-center">
                    <?php esc_html_e('Explore Our Services', 'silverride'); ?>
                </h2>

                <nav class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" aria-label="<?php esc_attr_e('Main website sections', 'silverride'); ?>">
                    
                    <?php 
                    $sitemap_items = array(
                        array(
                            'url' => home_url('/'),
                            'title' => __('Home', 'silverride'),
                            'desc' => __('Return to our homepage', 'silverride'),
                            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'
                        ),
                        array(
                            'url' => home_url('/who-we-are'),
                            'title' => __('About Us', 'silverride'),
                            'desc' => __('Learn more about our mission', 'silverride'),
                            'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'
                        ),
                        array(
                            'url' => home_url('/our-services'),
                            'title' => __('Services', 'silverride'),
                            'desc' => __('View our accessibility services', 'silverride'),
                            'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M13 16A6 6 0 1113 8a6 6 0 010 8zm0 0v1a2 2 0 100 4 2 2 0 000-4z'
                        ),
                        array(
                            'url' => home_url('/contact'),
                            'title' => __('Contact', 'silverride'),
                            'desc' => __('Get in touch with us', 'silverride'),
                            'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                        ),
                    );

                    foreach ( $sitemap_items as $item ) :
                    ?>
                        <a href="<?php echo esc_url( $item['url'] ); ?>" 
                           class="block p-6 border border-gray-200 rounded-lg hover:border-primary hover:shadow-md transition-all group"
                           aria-label="<?php echo esc_attr( $item['title'] . ': ' . $item['desc'] ); ?>">
                            <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center mb-4 group-hover:scale-110 transition-transform" aria-hidden="true">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo esc_attr( $item['icon'] ); ?>" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-[#1B1B1B] mb-1 group-hover:text-primary transition-colors">
                                <?php echo esc_html( $item['title'] ); ?>
                            </h3>
                            <p class="text-sm text-[#1B1B1B]">
                                <?php echo esc_html( $item['desc'] ); ?>
                            </p>
                        </a>
                    <?php endforeach; ?>

                </nav>

                <div class="mt-10 pt-8 border-t border-gray-200">
                    <?php 
                    $blog_page = get_option( 'page_for_posts' );
                    if ( $blog_page ) :
                        $blog_url = get_permalink( $blog_page );
                    ?>
                        <p class="text-center text-[#1B1B1B] mb-4">
                            <?php esc_html_e('Looking for our latest news and articles?', 'silverride'); ?>
                        </p>
                        <div class="text-center">
                            <a href="<?php echo esc_url( $blog_url ); ?>"
                               class="button--secondary inline-flex items-center px-6 py-2 rounded-full font-semibold border-2 border-primary text-primary transition-colors"
                               data-hover-bg="<?php echo esc_attr($alternate_bg); ?>">
                                <?php esc_html_e('Visit Our Blog', 'silverride'); ?>
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>