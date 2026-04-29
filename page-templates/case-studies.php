<?php
/**
 * Template Name: Case Studies
 *
 * Displays the Accessibility Case Studies page with featured and related case study cards.
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- ============================================================
     SECTION 1: Hero
     ============================================================ -->
<section class="bg-white border-b-2 border-solid border-gray-700 py-8 sm:py-12">
    <div class="container">
        <div class="text-center max-w-4xl mx-auto">
            <?php if ($hero_subtitle = get_field('hero_subtitle') ?: 'Case Studies & Client Results') : ?>
                <p class="text-lg font-semibold mb-3" style="color: var(--theme-primary);">
                    <?php echo esc_html($hero_subtitle); ?>
                </p>
            <?php endif; ?>

            <h1 class="text-4xl sm:text-[3rem] font-semibold !leading-tight mb-6 text-[#1B1B1B]">
                <?php echo wp_kses_post(get_field('hero_title') ?: 'Real Results for Real Organizations'); ?>
            </h1>

            <div class="prose text-lg text-[#1B1B1B] leading-relaxed mb-8 max-w-3xl mx-auto">
                <?php echo wp_kses_post(get_field('hero_description') ?: '<p>See how SilverRide has helped organizations across Canada achieve AODA, ACA, and WCAG compliance with measurable outcomes and zero enforcement risk.</p>'); ?>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <?php
                $hero_btn_1 = get_field('hero_button_1') ?: ['url' => '#contact', 'title' => 'Start Your Compliance Journey'];
                $hero_btn_2 = get_field('hero_button_2') ?: ['url' => home_url('/services'), 'title' => 'View Our Services'];
                ?>
                <a href="<?php echo esc_url($hero_btn_1['url']); ?>" class="inline-block text-white px-8 py-3 rounded-full transition-colors text-lg hover:opacity-90" style="background-color: var(--theme-primary);">
                    <?php echo esc_html($hero_btn_1['title']); ?>
                </a>
                <a href="<?php echo esc_url($hero_btn_2['url']); ?>" class="inline-block px-8 py-3 rounded-full transition-colors text-lg border-2 font-semibold hover:bg-rose-50" style="color: var(--theme-primary); border-color: var(--theme-primary);">
                    <?php echo esc_html($hero_btn_2['title']); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 2: Featured Case Study
     ============================================================ -->
<section class="py-16 md:py-24 bg-white">
    <div class="container">
        <div class="max-w-6xl mx-auto">
            <!-- Section Header -->
            <p class="text-sm font-semibold uppercase tracking-wider mb-3" style="color: var(--theme-primary);">
                <?php echo esc_html(get_field('featured_overline') ?: 'All Case Studies'); ?>
            </p>

            <h2 class="text-3xl md:text-[2.5rem] font-semibold !leading-tight mb-4 text-[#1B1B1B] max-w-4xl">
                <?php echo wp_kses_post(get_field('featured_title') ?: 'How an Ontario Retailer Achieved Full AODA Compliance Without Penalties'); ?>
            </h2>

            <span class="inline-block px-4 py-1 rounded-full text-sm font-medium mb-12 border" style="color: var(--theme-primary); border-color: var(--theme-primary); background-color: #FFF1F2;">
                <?php echo esc_html(get_field('featured_tag') ?: 'Ontario — Private Sector'); ?>
            </span>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">

                <!-- Left Column: Main Narrative -->
                <div class="lg:col-span-2 space-y-12">

                    <!-- Client Challenge -->
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-rose-50" style="color: var(--theme-primary);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-[#1B1B1B]">Client Challenge</h3>
                        </div>
                        <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                            <?php echo wp_kses_post(get_field('featured_challenge') ?: '<p>A mid-size Ontario retailer faced an upcoming AODA compliance deadline with significant accessibility gaps across its website and customer-facing documents. These gaps exposed the organization to potential penalties of up to $100,000 per day and increased legal and reputational risk.</p>'); ?>
                        </div>
                    </div>

                    <!-- Our Approach -->
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-rose-50" style="color: var(--theme-primary);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-[#1B1B1B]">Our Approach</h3>
                        </div>
                        <div class="prose text-lg text-[#1B1B1B] leading-relaxed mb-4">
                            <?php echo wp_kses_post(get_field('featured_approach_text') ?: '<p>SilverRide conducted a comprehensive accessibility audit aligned with WCAG 2.2 and IASR requirements. Based on the findings, we developed a structured remediation plan covering:</p>'); ?>
                        </div>
                        <?php
                        $approach_items = get_field('featured_approach_items') ?: [
                            'Website accessibility remediation',
                            'Document remediation (PDFs, forms, customer communications)',
                            'Compliance validation and reporting',
                        ];
                        ?>
                        <ul class="space-y-3 text-lg text-[#1B1B1B]">
                            <?php foreach ($approach_items as $item) : ?>
                                <li class="flex items-start">
                                    <span class="mr-3 mt-2.5 w-1.5 h-1.5 rounded-full flex-shrink-0" style="background-color: var(--theme-primary);"></span>
                                    <span><?php echo wp_kses_post(is_array($item) ? ($item['item'] ?? '') : $item); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Implementation -->
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-rose-50" style="color: var(--theme-primary);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-[#1B1B1B]">Implementation</h3>
                        </div>
                        <div class="prose text-lg text-[#1B1B1B] leading-relaxed">
                            <?php echo wp_kses_post(get_field('featured_implementation') ?: '<p>Our team worked closely with internal stakeholders across departments to implement accessibility improvements across all digital touchpoints. The process was executed within a defined timeline, ensuring minimal disruption to ongoing operations while maintaining compliance accuracy.</p>'); ?>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Project Snapshot -->
                <div class="lg:col-span-1">
                    <div class="lg:sticky lg:top-24 bg-[#F8F9FA] rounded-2xl p-8 border border-gray-100">
                        <h4 class="text-lg font-semibold text-[#1B1B1B] mb-6 pb-4 border-b border-gray-200">Project Snapshot</h4>
                        <div class="space-y-5">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Industry</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html(get_field('featured_industry') ?: 'Retail'); ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Location</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html(get_field('featured_location') ?: 'Ontario, Canada'); ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Compliance Standard</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html(get_field('featured_compliance') ?: 'AODA / WCAG 2.2'); ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Timeline</p>
                                <p class="text-base font-medium text-[#1B1B1B]"><?php echo esc_html(get_field('featured_timeline') ?: '8 Weeks'); ?></p>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500 mb-1">Key Result</p>
                                <p class="text-base font-semibold" style="color: var(--theme-primary);"><?php echo esc_html(get_field('featured_key_result') ?: '100% Compliance, Zero Penalties'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Results Highlight -->
            <div class="mt-16 bg-[#FFF1F2] rounded-2xl p-8 md:p-12 border border-rose-100">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center bg-white" style="color: var(--theme-primary);">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#1B1B1B]">Results</h3>
                </div>
                <?php
                $results_items = get_field('featured_results_items') ?: [
                    'Full AODA compliance achieved before the regulatory deadline',
                    'Zero enforcement actions or financial penalties',
                    'Improved accessibility across all customer-facing platforms',
                    'Reduced legal and compliance risk',
                ];
                ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-5">
                    <?php foreach ($results_items as $item) : ?>
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 flex-shrink-0 mt-0.5" style="color: var(--theme-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-lg text-[#1B1B1B]"><?php echo wp_kses_post(is_array($item) ? ($item['item'] ?? '') : $item); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 3: More Case Studies
     ============================================================ -->
<?php get_template_part('template-parts/sections/section_title-default', null, [
    'title'   => get_field('more_case_studies_title') ?: 'More Accessibility Case Studies',
    'description' => get_field('more_case_studies_description') ?: '<p class="text-lg text-[#1B1B1B] leading-relaxed">Explore how SilverRide has helped other organizations across Canada achieve measurable compliance outcomes.</p>',
    'container' => 'small',
]); ?>

<section class="pb-16 md:pb-24 bg-white">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <?php
            $more_studies = get_field('more_case_studies') ?: [
                [
                    'title'       => 'Remediating Over One Million Pages for a Provincial Government',
                    'description' => '<p>Large-scale document remediation project delivering WCAG 2.2 and PDF/UA compliance across extensive legacy systems.</p>',
                    'link'        => ['url' => '#', 'title' => 'View Case Study'],
                ],
                [
                    'title'       => 'How a SaaS Company Won a Federal Government Contract with a VPAT',
                    'description' => '<p>Delivered a complete VPAT aligned with WCAG 2.2 and EN 301 549, enabling successful federal procurement qualification.</p>',
                    'link'        => ['url' => '#', 'title' => 'View Case Study'],
                ],
                [
                    'title'       => 'Improving Website Accessibility for a National Organization',
                    'description' => '<p>End-to-end accessibility audit and remediation to meet federal compliance standards and enhance user experience.</p>',
                    'link'        => ['url' => '#', 'title' => 'View Case Study'],
                ],
            ];
            ?>
            <?php foreach ($more_studies as $study) : ?>
                <article class="bg-white border border-gray-200 rounded-2xl p-8 flex flex-col hover:border-rose-700 transition-colors">
                    <h3 class="text-xl font-semibold text-[#1B1B1B] mb-3 leading-snug">
                        <?php echo esc_html($study['title'] ?? ''); ?>
                    </h3>
                    <div class="prose text-base text-[#1B1B1B] leading-relaxed mb-6 flex-grow">
                        <?php echo wp_kses_post($study['description'] ?? ''); ?>
                    </div>
                    <?php if (!empty($study['link']['url'])) : ?>
                        <a href="<?php echo esc_url($study['link']['url']); ?>" class="inline-flex items-center font-semibold transition-colors hover:opacity-80" style="color: var(--theme-primary);">
                            <?php echo esc_html($study['link']['title'] ?: 'View Case Study'); ?>
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     SECTION 4: CTA / Contact
     ============================================================ -->
<section id="contact" class="py-16 md:py-24 bg-[#F8F9FA]">
    <div class="container">
        <div class="max-w-5xl mx-auto">
            <p class="text-sm font-semibold uppercase tracking-wider mb-3" style="color: var(--theme-primary);">
                <?php echo esc_html(get_field('cta_overline') ?: 'Start Your Engagement'); ?>
            </p>

            <h2 class="text-3xl md:text-[2.5rem] font-semibold !leading-tight mb-6 text-[#1B1B1B]">
                <?php echo wp_kses_post(get_field('cta_title') ?: 'Ready to Become Our Next Success Story?'); ?>
            </h2>

            <div class="prose text-lg text-[#1B1B1B] leading-relaxed mb-10 max-w-3xl">
                <?php echo wp_kses_post(get_field('cta_description') ?: '<p>Whether you are facing an AODA compliance deadline, preparing for federal accessibility requirements, or improving your organization\'s digital accessibility, our experts will assess your current position and provide a clear, actionable path forward.</p>'); ?>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Contact Info -->
                <div class="space-y-6">
                    <?php
                    $contact_email   = get_field('cta_email') ?: 'info@silverride.ca';
                    $contact_phone   = get_field('cta_phone') ?: '(416) 915-4288';
                    $contact_tollfree = get_field('cta_toll_free') ?: '1-866-245-A11Y';
                    ?>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: var(--theme-primary);">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <a href="mailto:<?php echo esc_attr($contact_email); ?>" class="text-lg text-[#1B1B1B] hover:underline" style="color: var(--theme-primary);">
                            <?php echo esc_html($contact_email); ?>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: var(--theme-primary);">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact_phone)); ?>" class="text-lg text-[#1B1B1B] hover:underline">
                            <?php echo esc_html($contact_phone); ?>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0" style="background-color: var(--theme-primary);">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <span class="text-lg text-[#1B1B1B]">
                            <?php echo esc_html($contact_tollfree); ?>
                        </span>
                    </div>
                </div>

                <!-- Form / CTA -->
                <div class="bg-white rounded-2xl p-8 border border-gray-200">
                    <?php if ($form_shortcode = get_field('cta_form_shortcode')) : ?>
                        <div class="case-study-form">
                            <?php echo do_shortcode($form_shortcode); ?>
                        </div>
                    <?php else : ?>
                        <p class="text-sm text-gray-500 mb-4">Contact form placeholder. Add a form shortcode via ACF field <code>cta_form_shortcode</code>.</p>
                    <?php endif; ?>

                    <?php
                    $cta_btn = get_field('cta_button') ?: ['url' => '#', 'title' => 'Book Your Free Consultation'];
                    ?>
                    <div class="mt-6">
                        <a href="<?php echo esc_url($cta_btn['url']); ?>" class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-3 text-lg text-white rounded-full transition-colors hover:opacity-90" style="background-color: var(--theme-primary);">
                            <?php echo esc_html($cta_btn['title']); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
